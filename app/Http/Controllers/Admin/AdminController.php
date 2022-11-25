<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

use Auth;
use DB;


class AdminController extends Controller
{
    /**
     * アカウント一覧
     *
     * @param Request $request
     * @return View
     */
    public function showIndex(Request $request): View
    {
        $sort = $request->sort;
        $admin_query = Admin::where(function(Builder $q) use ($request){
            if($request->filled('keyword')){
                $q->where(function(Builder $q_keyword) use ($request) {
                    $keyword_reg = '%' . $request->query('keyword') . '%';
                    $q_keyword->where('name', 'LIKE', $keyword_reg)
                        ->orWhere('email', 'LIKE', $keyword_reg);
                });
            }

            if($request->filled('auth')) $q->where('authority', $request->query('auth'));
        });

        if($sort === 'asc' || is_null($sort)){
            $admin_query->orderBy('id')->orderByDesc('created_at');
        } else if ($sort === 'desc'){
            $admin_query->orderByDesc('id')->orderByDesc('created_at');
        }

        $admins = $admin_query
            ->paginate(50)
            ->appends($request->query());

        return view('account.index', ['admins' => $admins]);
    }


    /**
     * 削除処理
     */
    public function destroy(Request $request)
    {
        // delete実行時にログインが切れてしまうので現在のログインを保存して処理完了後に再ログインさせる
        $auth_user = Auth::guard('admin')->user();
        DB::beginTransaction();

        try{
            $admin = Admin::find($request->input('adminId'));
            $admin->update([
                // 再登録が可能なように削除時にはタイムスタンプでEメールをエスケープする
                'email' => $admin->email . '@' . now()->format('YmdHis')
            ]);
            $admin->delete();
        } catch (\Exception $e) {
            DB::rollback();
            Auth::guard('admin')->login($auth_user);

            throw new \Exception($e->getMessage() ?: 'エラーが発生しました。');
        }

        DB::commit();
        if($auth_user) Auth::guard('admin')->login($auth_user);

        return redirect()
            ->route('account.index');
    }

    public function showEdit($admin_id)
    {
        $admin = Admin::find($admin_id);
        return view('account.edit', compact('admin'));
    }


    public function edit(UpdateAdminRequest $request, $admin_id)
    {
        $admin = Admin::find($admin_id);
        $admin->fill([
            'authority' => $request->input('authority'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
        ]);
        if ($request->input('password1234')) {
            $admin->password = Hash::make($request->input('password'));
        }
        $admin->save();
        return redirect()->route('account.index');
    }
}
