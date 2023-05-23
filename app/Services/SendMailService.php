<?php


namespace App\Services;

use App\Mail\User\RegisterComplete;
use Carbon\Carbon;
use Illuminate\Mail\SentMessage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

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
     * @param array $items
     * @param int $mail_type
     * @return SentMessage|null
     */
    public function send(
        string $action,
        array  $items,
        int    $mail_type = 1,
    ): ?SentMessage
    {
        return match ($action) {
            'registration' => Mail::to(data_get($items, 'email'))
                ->send(new RegisterComplete($items)),
            
            '???' => '__',
            
            '??????' => '___',
        };
    }
}
