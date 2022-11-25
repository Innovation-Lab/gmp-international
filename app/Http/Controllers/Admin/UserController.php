<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    /**
     * ユーザー一覧
     *
     * @param Request $request
     * @return View
     */
    public function showIndex(Request $request): View
    {
        $sort = $request->sort;
        $users_query = User::query()
            ->where(function (Builder $q) use ($request) {
                $q->where(function (Builder $q_keyword) use ($request) {
                    $keyword_reg = '%' . $request->input('keyword') . '%';
                    $q_keyword->where('first_name', 'LIKE', $keyword_reg)
                        ->orWhere('last_name', 'LIKE', $keyword_reg)
                        ->orWhere('first_name_kana', 'LIKE', $keyword_reg)
                        ->orWhere('last_name_kana', 'LIKE', $keyword_reg)
                        ->orWhere('tel', 'LIKE', $keyword_reg)
                        ->orWhere('address1', 'LIKE', $keyword_reg)
                        ->orWhere('address2', 'LIKE', $keyword_reg);
                });

                if ($request->gender) $q->where('gender', $request->gender);
                if ($request->prefecture) $q->where('address1', $request->prefecture);
            });

        if($sort === 'asc' || is_null($sort)) {
            $users_query->orderBy('last_name_kana')->orderByDesc('created_at');
        } else if($sort === 'desc'){
            $users_query->orderByDesc('last_name_kana')->orderByDesc('created_at');
        }

        $users = $users_query->take(0)
            ->paginate(0)
            ->appends($request->query());

        return view('user.index', [
            'users' => $users
        ]);
    }

    /**
     * 詳細画面の表示
     */
    public function detail($id)
    {
        $user = User::find($id);

        return view('user.detail', compact('user'));
    }

    /**
     * 凍結処理
     */
    public function frozen(Request $request)
    {
        $user = User::find($request->input('userId'));
        if ($user->isFrozen()){
            $user->frozen = 1;
        }else{
            $user->frozen = 2;
        }
        $user->save();
        return redirect()->route('user.detail', $request->input('userId'));
    }

    public function showEdit($user_id)
    {
        $user = User::find($user_id);
        return view('user.edit',
            [
                'user'=>$user
            ]
        );
    }

    public function edit(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->fill([
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'last_name_kana' => $request->input('last_name_kana'),
            'first_name_kana' => $request->input('first_name_kana'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'tel' => $request->input('tel'),
            'zipcode' => $request->input('zipcode'),
            'address1' => $request->input('address1'),
            'address2' => $request->input('address2'),
            'address3' => $request->input('address3'),
            'address4' => $request->input('address4')

        ]);

        $user->save();
        return redirect()->route('user.detail',$user->id);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->input('userId'));
        $timestamp = Carbon::now()->format('YmdHi');
        $user->fill([
            'email' => $user->email.'@'.$timestamp,
            'tel' => $user->tel.'@'.$timestamp,
            'firebase_uid' => $user->firebase_uid.'@'.$timestamp
        ])->save();
        $user->cars->each(function ($car) {
            $car->delete();
        });
        $user->delete();
        return redirect()->route('user.index');
    }
}
