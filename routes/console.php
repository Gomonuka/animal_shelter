<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('MigrateInOrder', function () {
    $migrations = [ 
        '2024_06_20_132940_create_roles_table.php',
        '2024_06_25_131200_create_personal_access_tokens_table.php',
        '0001_01_01_000000_create_users_table.php',
        '2024_06_25_131139_add_two_factor_columns_to_users_table.php',
        '0001_01_01_000001_create_cache_table.php',
        '0001_01_01_000002_create_jobs_table.php',
        '2024_06_20_132850_create_categories_table.php',
        '2024_06_20_132951_create_shelters_table.php',
        '2024_06_20_132857_create_pets_table.php',
        '2024_06_20_132945_create_tasks_table.php',
        
    ];
    foreach($migrations as $migration) {
        $basePath = 'database/migrations/';          
        $migrationName = trim($migration);
        $path = $basePath.$migrationName;
        $this->call('migrate:refresh', [
            '--path' => $path,            
        ]);
    }   
})->purpose('Migrating tables in a specific order');