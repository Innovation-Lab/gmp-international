<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNotificationRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * お知らせ一覧
     *
     * @param Request $request
     * @return View
     */
    public function showIndex(Request $request): View
    {
        $sort = $request->sort;
        $news_query = Notification::where(function (Builder $q) use($request) {
            if($request->filled('keyword')){
                $q->where(function(Builder $q_keyword) use ($request){
                    $keyword_reg = '%' . $request->query('keyword') . '%';

                    $q_keyword->where('title', 'LIKE', $keyword_reg)
                        ->orWhere('content', 'LIKE', $keyword_reg);
                });
            }
        });

        if ($sort === 'asc' || is_null($sort)) {
            $news_query->orderBy('title')->orderByDesc('created_at');
        } else if ($sort === 'desc') {
            $news_query->orderByDesc('title')->orderByDesc('created_at');
        }

        $news = $news_query
            ->paginate(50)
            ->appends($request->query());

        return view('news.index', ['news' => $news]);
    }

    // 新規登録画面表示
    public function showAdd(Request $request)
    {
        return view('news.add');
    }

    // 新規登録
    public function add(UpdateNotificationRequest $request)
    {
        //$timeStamp = Carbon::now()->format('YmdHi');
        $imageFile = $request->file('news_image_file');
        // 時間の整形と画像の保存
        if ( !empty($imageFile) ) {
            if (
                !Storage::disk('s3')->putFileAs(
                    config('app.news_image_path'),
                    $imageFile,
                    $imageFile->getClientOriginalName()
                )
            ) {
                return redirect()->back()->withInput()->withErrors(
                    ['news_image_file' => 'ファイルの送信に失敗しました']
                );
            }
        }
        try {
            DB::beginTransaction();
            $notification = new Notification;
            $notification->fill(
                $request->only([
                    'title',
                    'content',
                    'public',
                    'release_datetime'
                ])
            );
            if ( !empty($imageFile) ) {
                $notification->image_path = $imageFile->getClientOriginalName();
            }
            $notification->save();
        } catch ( \Exception $e ) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(
                ['news_image_file' => 'データの登録に失敗しました']
            );
        }
        DB::commit();

        return redirect()->route('news.index');
    }

    public function showEdit($news_id)
    {
        $notification = Notification::find($news_id);
        return view('news.edit', compact('notification'));
    }

    public function edit(UpdateNotificationRequest $request, $news_id)
    {
        $notification = Notification::find($news_id);

        $imageFile = $request->file('news_image_file');
        //$timeStamp = Carbon::now()->format('YmdHi');
        // 時間の整形と画像の保存
        if ( !empty($imageFile) ) {
            if (
                !Storage::disk('s3')->putFileAs(
                    config('app.news_image_path'),
                    $imageFile,
                    $imageFile->getClientOriginalName()
                )
            ) {
                return redirect()->back()->withInput()->withErrors(
                    ['news_image_file' => 'ファイルの送信に失敗しました']
                );
            }
        }
        // Storage::disk('s3')->delete(
        //     config('app.news.image_path').$notification->image_path
        // );
        try {
            DB::beginTransaction();
            if ( !empty($imageFile) ) {
                $notification->image_path = $imageFile->getClientOriginalName();
            }
            $notification->fill([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'public' => $request->input('public'),
                'release_datetime' => $request->input('release_datetime'),
            ])->save();
        } catch ( \Exception $e ) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(
                ['news_image_file' => 'データの登録に失敗しました']
            );
        }
        DB::commit();


        return redirect()->route('news.index');
    }

    public function ajaxDeleteImage(Notification $news)
    {
        // s3の画像を削除
        Storage::disk('s3')->delete($news->image_path);

        // DB上の画像パスをNULLに変更
        $news->update(['image_path' => null]);

        return response()
            ->json('画像を削除しました。');
    }


    public function search(Request $request)
    {
        # code...
    }

    /**
     * 削除処理
     */
    public function destroy(Request $request)
    {
        $news = Notification::find($request->input('newsId'));
        // s3の画像を削除
        if (isset($news->image_path)) {
            Storage::disk('s3')->delete($news->image_path);
        }
        // DB上の画像パスをNULLに変更
        $news->update(['image_path' => null]);
        $news->delete();
        return redirect()->route('news.index');
    }
}
