<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Helpers\MailHelper;

use App\Models\User;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to users';

    protected $mailHelper;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MailHelper $mailHelper)
    {
        parent::__construct();

        $this->mailHelper = $mailHelper;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::whereHas('role', function($query) {
            $query->where('roles.name', 'user');
        })->get();

        if ($users->isEmpty()) return;

        $this->mailHelper->sendEmails($users);
    }
}
