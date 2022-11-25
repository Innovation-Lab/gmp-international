<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Common\UtilClass;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * 自分の車両取得
     */
    public function get(Request $request)
    {
        if ( !empty($request->route('car_id')) ) {
            // パスパラメータでcar_idがある時
            $car = Car::find($request->route('car_id'));
            if ( empty($car) ) {
                return response()->json(
                    UtilClass::formatResponseData(
                        Response::HTTP_BAD_REQUEST,
                        '車両ID: '.$request->car_id.'の車両は存在しません'
                    )
                , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
            }
            $resData = [$car];
        } else {
            $resData = $request->user()->cars;
        }
        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                $resData
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    /**
     * 車両登録
     */
    public function add(Request $request)
    {
        // 特に必須項目はなしです
        try {
            DB::beginTransaction();
            $car = new Car;
            $car->user_id = $request->user()->id;
            $car->fill($request->only($car->getFillableColumnNames()))->save();
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
                [Car::find($car->id)]
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    /**
     * 車両情報更新
     */
    public function update(Request $request)
    {
        if ( empty($request->route('car_id')) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'car_idは必須です'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        // ここで一意
        $car = $request->user()->cars()->where('id', $request->car_id)->first();
        if ( empty($car) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    '車両ID: '.$request->car_id.'の車両は存在しません'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        try {
            DB::beginTransaction();
            $car->fill($request->only($car->getFillableColumnNames()))->save();
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
                [Car::find($car->id)]
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    /**
     * 車両削除
     */
    public function delete(Request $request)
    {
        if ( empty($request->route('car_id')) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'car_idは必須です'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        // ここで一意
        $car = $request->user()->cars()->where('id', $request->car_id)->first();
        if ( empty($car) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    '車両ID: '.$request->car_id.'の車両は存在しません'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        try {
            DB::beginTransaction();
            $car->delete();
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

    /**
     * TODO: MGPIのAPIを叩きます
     *
     * @return void
     */
    public function getPhotoName(Request $request)
    {
        if ( empty($request->input('brand_cd')) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'brand_cdは必須です'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        if ( empty($request->input('car_cd')) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'car_cdは必須です'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        // パラメータ丸々送ります。maker_id, car_cd, grade_idで絞り込み
        try {
            $client = new \GuzzleHttp\Client();
            $options = [
                'query' => [
                    'brand_cd' => $request->brand_cd,
                    'car_cd' => $request->car_cd,
                    'grade_id' => $request->grade_id
                ]
            ];

            // テスト用ロジック。開発環境がBasic認証をかけていたため。
            if (config('app.is_basic_auth')) {
                $options['auth'] = [
                    config('app.basic_auth_user'),
                    config('app.basic_auth_password'),
                ];
            }

            $response = $client->request('GET', config('app.phase2_url').'api/car/photo', $options);
            $responseData = json_decode($response->getBody(), true);
        } catch (ClientException $e) {
            //$message = json_decode($e->getResponse()->getBody()->getContents(), true)['message'] ?? $e->getMessage();
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_INTERNAL_SERVER_ERROR,
                    'エラーが発生しました'
                )
            , Response::HTTP_INTERNAL_SERVER_ERROR, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        } catch (\Exception $e) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_INTERNAL_SERVER_ERROR,
                    'エラーが発生しました'
                )
            , Response::HTTP_INTERNAL_SERVER_ERROR, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        if (empty($responseData)) {
            $responseData = null;
        } else {
            $responseData = [$responseData];
        }
        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                $responseData
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }
}
