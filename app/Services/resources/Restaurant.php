<?php

namespace App\Services\resources;

class Restaurant
{
    public static function format(array $schedules) : array
    {
//        dd($schedules);
        $newFormat = [];
        foreach ($schedules as $schedule) {
            $newFormat[$schedule['day']] = ['start'=>$schedule['open'], 'end'=>$schedule['close']];
        }
        return $newFormat;
    }
}
