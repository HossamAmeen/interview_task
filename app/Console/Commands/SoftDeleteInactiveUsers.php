<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class SoftDeleteInactiveUsers extends Command
{
    protected $signature = 'users:soft-delete-inactive';
    protected $description = 'Soft delete users with inactive status';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::where('status', 'inactive');
        $count = $users->count();

        $users->delete();

        $this->info("{$count} users have been soft deleted.");
    }
}
