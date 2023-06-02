<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalComplete extends Mailable
{
    
    use Queueable, SerializesModels;
    
    protected string $title = '退会処理が完了しました';
    private $item;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($item)
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
        $view = 'web.email.user.withdrawal';
        return $this->view($view)
            ->subject($this->title)
            ->with([
                'item' => $this->item
            ]);
    }
}