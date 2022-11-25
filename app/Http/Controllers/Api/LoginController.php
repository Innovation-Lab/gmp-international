<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Kreait\Firebase\Contract\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;

use App\Models\User;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Http\Common\UtilClass;
use Illuminate\Support\Carbon;


class LoginController extends Controller
{
    private $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function login(Request $request)
    {
        // 返ってきたUUIDがこっちにあればaccessToken発行、なかったらDBに保存してToken発行
        if ( empty($request->idToken) ) {
            return response()->json(
                UtilCLass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'idTokenは必須です。'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        // jsonのバックスラッシュ避けがうまくできない
        //$uid = json_decode(str_replace('\\', $this->getUidByToken($request->idToken)), true);
        $uid = $this->getUidByToken($request->idToken);

        // uid取れなかったとき
        if ( is_array($uid) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    '不正なidTokenです',
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        try {
            DB::beginTransaction();
            $user = User::where('firebase_uid', $uid)->first();
            if ( empty($user) ) {
                //　存在しなかったらUserを新規作成
                $user = new User;
                $user->fill([
                    'firebase_uid' => $uid,
                    'frozen' => User::FROZEN
                ])->save();
            } else {
                if ( $user->isFrozen() ) {
                    return response()->json(
                        UtilClass::formatResponseData(
                            Response::HTTP_UNAUTHORIZED,
                            'アカウントは凍結されております'
                        )
                    , Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
                }
            }
            if ( $request->input('tel') ?? null ) {
                $user->fill($request->only([
                    'tel'
                ]))->save();
            }
            // トークン発行と認証
            $tokenResult = $user->createToken($uid);
        } catch ( \Exception $e ) {
            DB::rollBack();
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_INTERNAL_SERVER_ERROR,
                    $e->getMessage()
                )
            , Response::HTTP_INTERNAL_SERVER_ERROR, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        DB::commit();

        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [[
                    'firebase_uid' => $uid,
                    'access_token' => $tokenResult->plainTextToken,
                ]],
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    // tel or emailとパスワードでログインする（すでにアカウントがあるユーザーを想定）
    public function secondLogin(Request $request)
    {
        $query = User::query();
        if ( $request->input('tel') ?? null ) {
            $query->where('tel', $request->input('tel'));
        } else if ( $request->input('email') ?? null ) {
            $query->where('email', $request->input('email'));
        } else {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    '電話番号またはメールアドレスを入力してください'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        if ( !($request->input('password') ?? null) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'パスワードを入力してください'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        $user = $query->first();
        if ( empty($user) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'ユーザー情報が一致しません'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        } else {
            if ( $user->isFrozen() ) {
                return response()->json(
                    UtilClass::formatResponseData(
                        Response::HTTP_UNAUTHORIZED,
                        'アカウントは凍結されています'
                    )
                , Response::HTTP_UNAUTHORIZED, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
            }
        }

        if (  !Hash::check($request->input('password'), $user->password) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'パスワードが異なります'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        try {
            DB::beginTransaction();
            // トークン発行と認証
            $tokenResult = $user->createToken($request->password);
        } catch ( \Exception $e ) {
            DB::rollBack();
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_INTERNAL_SERVER_ERROR,
                    $e->getMessage(),
                )
            , Response::HTTP_INTERNAL_SERVER_ERROR, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        DB::commit();
        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [[
                    'firebase_uid' => $user->firebase_uid,
                    'access_token' => $tokenResult->plainTextToken,
                ]],
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }



    //トークンからUidを取得する。
    private function getUidByToken($idToken)
    {
        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken);
        } catch (InvalidToken $e) {
            return ['error' => 'Token is Invalid.'];
        } catch (\InvalidArgumentException $e) {
            return ['error' => 'Token does not parse.'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }

        $uid = $verifiedIdToken->claims()->get('sub');

        return $uid;
    }

    // ログインしているユーザー情報取得
    public function get(Request $request)
    {
        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [$request->user()],
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    // ユーザー情報更新
    public function update(UpdateUserRequest $request)
    {
        $user = $request->user();
        try {
            DB::beginTransaction();
            $user->fill($request->only([
                'email',
                'tel',
                'last_name',
                'first_name',
                'last_name_kana',
                'first_name_kana',
                'gender',
                'birthday',
                'zipcode',
                'address1',
                'address2',
                'address3',
                'address4',
                'jititai_id',
                'jititai_name',
                'profile_image_path',
                'ios_token',
                'android_token',
            ]));
            if ( $request->input('password') ?? null ) {
                $user->password = Hash::make($request->input('password'));
            }
            $user->save();
        } catch ( \Exception $e ) {
            DB::rollBack();
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_INTERNAL_SERVER_ERROR,
                    $e->getMessage()
                )
            , Response::HTTP_INTERNAL_SERVER_ERROR, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        DB::commit();

        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [$user],
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    // 電話番号とメールアドレスでそのユーザー存在するかどうか確認
    public function isExists(Request $request)
    {
        $query = User::query();
        if ( $request->input('tel') ?? null ) {
            $query->where('tel', $request->input('tel'));
        } else if ( $request->input('email') ?? null ) {
            $query->where('email', $request->input('email'));
        } else {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    '電話番号またはメールアドレスは必須です',
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [[
                    'is_exists' => $query->exists(),
                ]]
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    // 退会API
    public function delete(Request $request)
    {
        //　ユニークな値を潰す　@timestamp
        $user = $request->user();
        $timestamp = Carbon::now()->format('YmdHi');
        // ここでAPIで予約取得してステータスを見て有効なやつが存在したら退会させない
        if ( $this->hasActiveInbound($user->id) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'お客様のご予約はまだ完了しておりません'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        try {
            DB::beginTransaction();
            $user->fill([
                'email' => $user->email.'@'.$timestamp,
                'tel' => $user->tel.'@'.$timestamp,
                'firebase_uid' => $user->firebase_uid.'@'.$timestamp
            ])->save();
            $user->cars->each(function ($car) {
                $car->delete();
            });
            $user->delete();
        } catch ( \Exception $e ) {
            DB::rollBack();
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_INTERNAL_SERVER_ERROR,
                    $e->getMessage()
                )
            , Response::HTTP_INTERNAL_SERVER_ERROR, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        DB::commit();

        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }



    private function hasActiveInbound($app_user_id)
    {
        $client = new \GuzzleHttp\Client();
        $options = [
            'query' => [
                'app_user_id' => $app_user_id,
            ],
        ];

        // テスト用ロジック。開発環境がBasic認証をかけていたため。
        if (config('app.is_basic_auth')) {
            $options['auth'] = [
                config('app.basic_auth_user'),
                config('app.basic_auth_password'),
            ];
        }

        try {
            $response = $client->request('GET', config('app.phase2_url').'api/app_user/hasActiveInbound', $options);
            $responseData = json_decode($response->getBody(), true);
        } catch ( \Exception $e ) {
            throw new \Exception('エラーが発生しました');
        }

        return $responseData['data']['result'];
    }

    /*
    |--------------------------------------------------------------------------
    | テスト用
    |--------------------------------------------------------------------------
    */

    // 匿名ユーザーでFirebaseの認証を通す
    public function loginAnonymous()
    {
        //return response()->json('はい', Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        $anonymous = $this->auth->signInAnonymously();
        // ここでrefreshToken取得しておくと便利かも

        //return $anonymous;
        return response()->json([
            'idToken' => $anonymous->idToken(),
            'userId' => $anonymous->firebaseUserId(),
            'refreshToken' => $anonymous->refreshToken()
        ], Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);

        // まず最初にFirebaseでログイン
        // userIDとToken返ってくる
    }

    // refreshTokenを用いてidTokenを更新
    public function updateIdToken(Request $request)
    {
        $signInResult = $this->auth->signInWithRefreshToken($request->refresh_token);

        return response()->json([
            'idToken' => $signInResult->idToken(),
            'userId' => $signInResult->firebaseUserId(),
            'refreshToken' => $signInResult->refreshToken()
        ], Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }
}
