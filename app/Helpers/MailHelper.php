<?php

namespace App\Helpers;

use App\Mail\NewOrderMail;

use Mail;

class MailHelper {

    /**
     * Send email when creating a new order
     * @param  string $email email
     * @return void
     */
    public function newOrder($email)
    {
        try {
            Mail::to(env('ORDER_ADMIN_EMAIL'))->queue(new NewOrderMail($email));
        } catch (\Exception $e) {
            \Log::error($e->getMessage() . ' newOrder MailHelper');
        }
    }
}
