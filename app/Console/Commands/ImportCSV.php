<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportCSV extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv {$csvFilePath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import CSV files and store in JSON "php artisan import:csv <filepath>"';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
