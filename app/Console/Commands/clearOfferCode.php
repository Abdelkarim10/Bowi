<?php

namespace App\Console\Commands;

use App\Models\UserOffer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class clearOfferCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear_offer_code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // DB::table('user_offers')->update([ 'expired' => true ]);
    }
}
