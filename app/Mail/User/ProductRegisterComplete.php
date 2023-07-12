<?php

namespace App\Mail\User;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductRegisterComplete extends Mailable
{
    
    use Queueable, SerializesModels;
    
    protected string $title = '製品の登録を受け付けました';
    private User $user;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = 'web.email.user.product_register';
        return $this->view($view)
            ->subject($this->title)
            ->with([
                'item' => $this->user
            ]);
    }
}