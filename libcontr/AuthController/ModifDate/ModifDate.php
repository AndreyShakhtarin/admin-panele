<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 20.08.16
 * Time: 11:46
 *
 * Class for working with data date
 */

namespace libcontr\AuthController\ModifDate;


class ModifDate
{

    public $day;

    public $month;

    public $year;

    public $timestamp;

    /*
     * Takes the parameters day, month and year
     */
    function __construct($day= null, $month = null, $year =null)
    {

        $this->day = $day + 1;
        $this->month = $this->month_to_int($month);
        $this->year = $year;
    }

    /*
     * convert month from string values to numerical
     */
    private function month_to_int($month)
    {
        $months  = array('jan' => 1, 'feb' => 2, 'mar' => 3, 'apr' => 4,
            'may' => 5,'jun' => 6, 'jul' => 7, 'avg' => 8,  'sep' => 9,
            'oct' => 10, 'nov' => 11, 'dec' => 12) ;
        $month = '/'.$month.'/';
        foreach($months as $value=>$item){
            if(preg_match( '/oct/', $value)){
                return $item;
            }
        }

    }

    /*
     * return convert date in format timestamp
     */
    public function get_datestamp()
    {
        $datastamp = $this->year."-".$this->month."-".$this->day;
        $datastamp = strtotime($datastamp);
        return $datastamp;
    }
}