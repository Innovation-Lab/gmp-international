<?php

namespace App\Mail\User;

use App\Mail\User\SendContactMail;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterComplete extends Mailable
{
    use Queueable, SerializesModels;
    
    protected string $title = '会員登録が完了しました';
    private array $item;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $item)
    {
        $this->item = $item;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = 'web.email.user.register';
        return $this->view($view)
            ->subject($this->title)
            ->with([
                'item' => $this->item
            ]);
    }
}
