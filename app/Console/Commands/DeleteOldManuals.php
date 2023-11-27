<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Manual;
use Carbon\Carbon;

class DeleteOldManuals extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:manuals';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hapus sijil selepas 180 hari';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Manual::whereDate('created_at', '<', Carbon::now()->subDays(180))
        ->delete();

    }
}
