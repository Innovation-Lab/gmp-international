<?php


namespace App\Services;

use App\Mail\User\ProductRegisterComplete;
use App\Mail\User\RegisterComplete;
use App\Mail\User\WithdrawalComplete;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Mail;

class SendMailService
{
    /**
     * 送信対象
     */
    public const MAIL_TO = [
        1 => 'user',
        2 => 'admin',
        3 => 'userAndAdmin'
    ];
    
    /**
     * メールタイプ
     */
    public const MAIL_TYPE = [
        1 => 'html',
    ];
    
    /**
     * @param string $action
     * @param $items
     * @param int $mail_type
     * @return SentMessage|null
     */
    public function send(
        string $action,
        $items,
        int    $mail_type = 1,
    ): ?SentMessage
    {
        return match ($action) {
            'registration' => Mail::to(data_get($items, 'email'))
                ->send(new RegisterComplete($items)),
            
            'product_registration' => Mail::to(data_get(\Auth::user(), 'email'))
                ->send(new ProductRegisterComplete(\Auth::user())),
            
            'withdrawal' => Mail::to(data_get($items, 'email'))
                ->send(new WithdrawalComplete($items)),
        };
    }
}
