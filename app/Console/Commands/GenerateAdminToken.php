<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\AdminToken;

class GenerateAdminToken extends Command
{
    protected $signature = 'generate:admin-token';
    protected $description = 'Generate an admin token';

    public function handle()
    {
        $token = bin2hex(random_bytes(16));

        $this->info('Generated Admin Token: ' . $token);

        AdminToken::create(['token' => $token]);

        $this->info('Admin Token added to the database.');
    }
}
