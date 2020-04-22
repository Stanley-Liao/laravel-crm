<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Interfaces\Ihoroscope;
use App\Horoscope AS HoroscopeMD;

class Horoscope extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:horoscope';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get horoscope info';

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
     * @return mixed
     */
    public function handle(HoroscopeMD $Horoscope, Ihoroscope $hc)
    {
        for($i = 0;$i < 12; $i++){

            $insert_data = array(
                'name' => $hc->name()[$i],
                'access_date' => date('Y-m-d'),
                'entirety_desc' => $hc->entirety_desc()[$i],
                'love_desc' => $hc->love_desc()[$i],
                'career_desc' => $hc->career_desc()[$i],
                'wealth_desc' => $hc->wealth_desc()[$i],
                'entirety_rating' => $hc->entirety_rating()[$i],
                'love_rating' => $hc->love_rating()[$i],
                'career_rating' => $hc->career_rating()[$i],
                'wealth_rating' => $hc->wealth_rating()[$i]               
            );

            $Horoscope->create($insert_data);
        }
    }
}
