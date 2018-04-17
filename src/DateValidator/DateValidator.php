<?php
/**
 * Created by PhpStorm.
 * User: vitalijus
 * Date: 18.4.17
 * Time: 22.05
 */

namespace App\DateValidator;


class DateValidator
{

    /**
     * @param $day
     * @return string
     */
    function validateDate($day): string
    {
        $checkDate = \DateTime::createFromFormat('Y-m-d', $day);

        if ($checkDate == true) {
            $userDay = new \DateTime($day);
            $presentDay = new \DateTime();
            $diff = $userDay->diff($presentDay)->format("%a");
            $presentDay = $presentDay->format("Y-m-d");
            $userDay = $userDay->format("Y-m-d");
            if ($userDay >= $presentDay && $diff < 60 && $userDay == $day) {
                return $day;
            } else {
                echo 'Netinkamai ivesta data';
                return $today;
            }
        } else {
            $thisDay = new \DateTime();
            $thisDay= $thisDay->format("Y-m-d");
            echo 'Netinkamas datos formatas';
            return $thisDay;
        }
    }


}