<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MBrand;
use App\Models\MProduct;
use App\Models\MColor;
use App\Models\MShop;
use App\Models\SalesProduct;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $userRepository;

    /**
     * ユーザー一覧
     *
     * @param Request $request
     * @return Application|Factory|View
     */

    /**
     * @param UserRepositoryInterface $userRepository
     */

     public function __construct(
        UserRepositoryInterface $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request): View|Factory|Application
    {

        return view('admin.users.index', [
            'users' => $this->userRepository->search($request)->orderByDesc('id')->paginate(20),
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'request' => $request,
        ]);
    }
    
    /**
     * @param $id
     * @return Application|Factory|View
     */
    // public function detail($id): View|Factory|Application
    // {
    //     $user = User::find($id);

    //     return view('admin.users.detail', compact('user'));
    // }
    public function create(): View
    {
        return view('admin.users.create.index');
    }

    public function createProducts(): View
    {
        return view('admin.users.create.products');
    }

    public function detail(User $user): View
    {
        $sales_products = data_get($user, 'salesProducts');

        return view('admin.users.detail.index')->with([
            'user' => $user,
            'sales_products' => $sales_products,
        ]);
    }

    public function editUser(User $user): View
    {
        $prefectures = config('prefecture');

        return view('admin.users.edit.user')->with([
            'user' => $user,
            'prefectures' => $prefectures,
        ]);
    }

    public function editProducts(User $user, SalesProduct $sales_product): View
    {
        return view('admin.users.edit.products')->with([
            'user' => $user,
            'sales_product' => $sales_product,
            'brands' => MBrand::query()->pluck('name', 'id')->toArray(),
            'products' => MProduct::query()->pluck('name', 'id')->toArray(),
            'colors' => MColor::query()->pluck('alphabet_name', 'id')->toArray(),
            'shops' => MShop::query()->pluck('name', 'id')->toArray(),
        ]);
    }

    // public function userEdit(): View
    // {
    //     return view('admin.users.detail.edit.userEdit');
    // }
    
    // /**
    //  * @param User $user
    //  * @return Application|Factory|View
    //  */
    // public function edit(User $user): View|Factory|Application
    // {
    //     return view('admin.users.edit', compact('user'));
    // }
    
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
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
