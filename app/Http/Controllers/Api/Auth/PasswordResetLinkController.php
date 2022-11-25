<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

use App\Http\Common\UtilClass;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    // リンク送ります。
    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // 登録のあるメールアドレスに対してメールを飛ばす
        $user = User::where('email', $request->input('email'))->first();
        if ( empty($user) ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    '登録のないメールアドレスになります'
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
        // $request->validate([
        //     'email' => ['required', 'email'],
        // ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            //$request->only('email')
            ['email' => $request->input('email')]
        );

        if ( $status == Password::RESET_LINK_SENT ) {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_OK,
                    config('const.HTTP_OK_MESSAGE'),
                )
            , Response::HTTP_OK, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        } else {
            return response()->json(
                UtilClass::formatResponseData(
                    Response::HTTP_BAD_REQUEST,
                    $this->getStatusMessage($status),
                )
            , Response::HTTP_BAD_REQUEST, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
        }
    }

    private function getStatusMessage($status) {
        if ( $status === Password::INVALID_USER ) {
            return 'ユーザー情報が取得できません';
        }
        return 'メールの送信に失敗しました';
    }
}
