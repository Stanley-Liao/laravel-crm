<?php 
namespace App\Libraries;

use App\Interfaces\Ihoroscope;
use Exception;
use \UnexpectedValueException;
use QL\QueryList;

class Horoscope implements Ihoroscope
{
    protected $name = [];
    protected $entirety_desc = [];
    protected $love_desc = [];
    protected $career_desc = [];
    protected $wealth_desc = [];
    protected $entirety_rating = [];
    protected $love_rating = [];
    protected $career_rating = [];
    protected $wealth_rating = [];
    public function __construct(){
        $this->get_data();
    }

    public function name(){
        return $this->name;
    }

    public function entirety_desc(){
        return $this->entirety_desc;
    }

    public function love_desc(){
        return $this->love_desc;
    }

    public function career_desc(){
        return $this->career_desc;
    }

    public function wealth_desc(){
        return $this->wealth_desc;
    }

    public function entirety_rating(){
        return $this->entirety_rating;
    }

    public function love_rating(){
        return $this->love_rating;
    }

    public function career_rating(){
        return $this->career_rating;
    }

    public function wealth_rating(){
        return $this->wealth_rating;
    }

    public function get_data(){

        $horoscopes = QueryList::get('http://astro.click108.com.tw/')
            ->find('.STAR12_BOX > ul > li > a')
            ->attrs('href');

        foreach ($horoscopes as $horoscope) {
            $url = urldecode($horoscope);
            parse_str( parse_url($url)['query'] , $params);
            $target = QueryList::get($params['RedirectTo']);
            
            $name = $target->find('.ROOT')
                        ->find('p > a')
                        ->text();
            $name = explode('－', utf8_decode($name))[1];

            $rating = $target->find('.FORTUNE_INDEX_AERA')
                        ->find('div > div.STAR_LIGHT > img')
                        ->attrs('src');

            $desc = $target->find('.TODAY_CONTENT')
                        ->find('p')->texts()->chunk(2)
                        ->mapSpread(function ($odd, $even) {
                        
                            return utf8_decode($even);
                        });

            array_push($this->name, $name);
            array_push($this->entirety_desc, $desc[0]);
            array_push($this->love_desc, $desc[0]);
            array_push($this->career_desc, $desc[2]);
            array_push($this->wealth_desc, $desc[3]);
            array_push($this->entirety_rating, substr($rating[0], -5, 1));
            array_push($this->love_rating, substr($rating[1], -5, 1));
            array_push($this->career_rating, substr($rating[2], -5, 1));
            array_push($this->wealth_rating, substr($rating[3], -5, 1));
        }        
    }
}