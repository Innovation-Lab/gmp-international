<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Common\UtilClass;
use App\Models\Favorite;
use Symfony\Component\HttpFoundation\Response;

class FavoriteController extends Controller
{
    // どこかで消す
    public function get(Request $request, $type = null, $code = null)
    {
        $query = $request->user()->favorites();
        if ( !empty($type) ) {
            $query->where('type', $type);
        }

        if  ( !empty($code) ) {
            $query->where('code', $code);
        }
        $data = $query->simplePaginate(10);

        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [$data]
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    // どこかで消す
    // トグルで追加と削除できるといいですね
    public function add(Request $request, $type = null, $code = null)
    {
        // client. blog, coupon以外は弾く
        if ( !in_array($type, Favorite::TYPE) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'typeの形式が不正です'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        if ( empty($type) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'typeは必須です'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        if ( empty($code) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'codeは必須です'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        $user = $request->user();
        // if ( Favorite::where('user_id', $user->id)->where('type', $type)->where('code', $code)->exists() ) {
        //     return response()->json(
        //         UtilClass::formatResponseData(
        //             Response::HTTP_BAD_REQUEST,
        //             'すでに存在するデータです'
        //         )
        //     , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        // }

        // $favorite = new Favorite;
        //     $favorite->user_id = $user->id;
        //     $favorite->fill([
        //         'type' => $type,
        //         'code' => $code,
        //     ])->save();

        // 存在していればsoftDelete
        $favorite = Favorite::withTrashed()->where('user_id', $user->id)->where('type', $type)->where('code', $code)->first();
        if ( empty($favorite) ) {
            // 新規登録
            $favorite = new Favorite;
            $favorite->fill([
                'user_id' => $user->id,
                'type' => $type,
                'code' => $code,
                'deleted_at' => NULL
            ])->save();
        } else {
            // 更新処理
            if ( $favorite->deleted_at ) {
                $favorite->restore();
            } else {
                $favorite->delete();
            }
        }

        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [$favorite]
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    public function get2(Request $request, $type = null, $code = null)
    {
        $query = $request->user()->favorites();
        if ( !empty($type) ) {
            $query->where('type', $type);
        }

        if  ( !empty($code) ) {
            $query->where('code', $code);
        }

        // クエリパラメータにあれば検索する
        if ( $request->input('client_id') ) {
            $query->where('client_id', $request->input('client_id'));
        }
        $data = $query->simplePaginate(10);

        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [$data]
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    // トグルで追加と削除できるといいですね
    public function add2(Request $request, $type = null, $code = null)
    {
        // client. blog, coupon以外は弾く
        if ( !in_array($type, Favorite::TYPE) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'typeの形式が不正です'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        if ( empty($type) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'typeは必須です'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        if ( empty($code) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'codeは必須です'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        if ( $type != Favorite::TYPE[Favorite::CLIENT] ) {
            if ( empty($request->input('client_id')) ) {
                return response()->json(
                    UtilClass::formatResponseData(
                        Response::HTTP_BAD_REQUEST,
                        'client_idは必須です'
                    )
                , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
            }
        }

        $user = $request->user();

        // お気に入りの種別で分ける
        if ( $type == Favorite::TYPE[Favorite::CLIENT] ) {
            $favorite = Favorite::withTrashed()->where('user_id', $user->id)->where('type', $type)->where('code', $code)->first();
        } else {
            $favorite = Favorite::withTrashed()->where('user_id', $user->id)
                ->where('type', $type)
                ->where('code', $code)
                // クーポンとブログはclient_idないと特定できない想定
                ->where('client_id', $request->input('client_id'))
                ->first();
        }

        // 存在していればsoftDelete
        if ( empty($favorite) ) {
            // 新規登録
            $favorite = new Favorite;
            $favorite->client_id = $request->input('client_id') ?? null;
            $favorite->fill([
                'user_id' => $user->id,
                'type' => $type,
                'code' => $code,
                'deleted_at' => NULL
            ])->save();
        } else {
            // 更新処理
            if ( $favorite->deleted_at ) {
                $favorite->restore();
            } else {
                $favorite->delete();
            }
        }

        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [$favorite]
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }
}
