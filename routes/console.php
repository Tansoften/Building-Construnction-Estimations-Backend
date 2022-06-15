<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/
Artisan::command('db:boot', function(){
    $this->comment('Migrating tables...');
    $this->call('migrate');

    $this->comment('Seeding tables...');
    $this->call('db:seed');

    //$this->comment('Scheduling the system');
    //$this->call('schedule:work');
    
    $this->comment('Done!');
})->purpose('Initializing database.');

Artisan::command('db:reboot', function(){
    $this->comment('Rolling back tables...');
    $this->call('migrate:reset');
    $this->call('db:boot');
})->purpose('Resetting database.');

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
