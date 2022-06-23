<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class Commands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete cancelled orders every 1 minutes';

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
        DB::table('carts')->where('status', '=' , config('const.CART.STATUS.CANCELED'))->delete();  
    }
}
