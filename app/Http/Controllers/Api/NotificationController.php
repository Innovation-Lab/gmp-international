<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Common\UtilClass;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Read;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class NotificationController extends Controller
{
    public function get(Request $request)
    {
        // 公開でソートしてページング 公開日時を満たしてるもののみ取得
        $data = Notification::select(
            DB::raw('
                notifications.id,
                notifications.title,
                concat(left(replace(notifications.content, "\n", ""), 50), "...") as digest_content,
                notifications.image_path,
                notifications.created_at,
                userReadTable.completed as completed
            ')
        )->where('public', Notification::PUBLIC)->where('release_datetime', '<=', Carbon::now())
        ->leftJoin( $this->getUserReadTable($request->user()->id) , function ($join) {
            $join->on('userReadTable.not_id', '=', 'notifications.id');
        })
        ->orderBy('id', 'DESC')->simplePaginate(10);

        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [$data]
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    // お知らせがだんだんデカくなる気がするので
    public function detail(Request $request)
    {
        if ( empty($request->input('notification_id')) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'お知らせIDは必須です',
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        $notification = Notification::select(
            DB::raw('
                notifications.*,
                userReadTable.completed as completed
            ')
        )->where('public', Notification::PUBLIC)->where('release_datetime', '<=', Carbon::now())
        ->where('notifications.id', $request->input('notification_id'))
        ->leftJoin( $this->getUserReadTable($request->user()->id) , function ($join) {
            $join->on('userReadTable.not_id', '=', 'notifications.id');
        })->first();

        if ( !empty($notification) ) {
            $notification->image_url = $notification->preview_image_url;
        }

        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [$notification]
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    // 既読をつけるAPI（クライアント側でいい感じにしてほしい気持ちもある）
    public function read(Request $request)
    {
        if ( empty($request->input('notification_id')) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    'お知らせIDは必須です'
                )
            , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }

        $read = new Read;
        $read->fill([
            'user_id' => $request->user()->id,
            'notification_id' => $request->input('notification_id'),
            'completed' => Read::COMPLETED,
        ])->save();

        return response()->json(
            UtilClass::formatResponseData(
                Response::HTTP_OK,
                config('const.HTTP_OK_MESSAGE'),
                [$read]
            )
        , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    // ユーザーが所有するreadsテーブルのレコード取得
    private function getUserReadTable($userId) {
        return DB::raw(
            '(SELECT id,user_id,notification_id as not_id,completed,created_at,updated_at FROM `reads` WHERE user_id = '.$userId.') AS userReadTable'
        );
    }

}
