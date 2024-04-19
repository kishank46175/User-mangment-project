<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class DatabaseBackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the application database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filename = 'backup.sql'; // Define the backup filename
        $mysqldump = escapeshellarg("mysqldump -u ".env('DB_USERNAME')." -p".env('DB_PASSWORD')." ".env('DB_DATABASE')." > $filename");
        $process = new Process([$mysqldump]);
        $process->run();

        if ($process->isSuccessful()) {
            $this->info("Database backup created successfully!");
        } else {
            $this->error("Error creating database backup: " . $process->getErrorOutput());
        }
    }
}
