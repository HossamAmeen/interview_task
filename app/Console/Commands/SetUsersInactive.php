<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class SetUsersInactive extends Command
{

    protected $signature = 'users:set-inactive';
    protected $description = 'Set users with "test" in their email to inactive';

    public function handle()
    {
        $count = User::where('email', 'LIKE', '%test%')
                     ->update(['status' => 'inactive']);

        $this->info("{$count} users have been set to inactive.");
    }
}
