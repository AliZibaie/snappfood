<?php

namespace App\Services\resources;

use App\Models\RestaurantCategory;

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

    public static function filter()
    {
        $isOpen = request('is_open');
        $type = request('type');
        $scoreGreaterThan = request('score');
//        dd($isOpen, $type, $scoreGreaterThan);
        $query = \App\Models\Restaurant::query();

        if (isset($isOpen)) {
            $query->where('status', $isOpen);
        }

        if ($type) {
            $id = RestaurantCategory::query()->where('restaurant_type', $type)->first()->id;
            $query->where('restaurant_category_id', $id);
        }

        if ($scoreGreaterThan) {
            $query->where('score', '>', $scoreGreaterThan);
        }

        return $query->get();
    }
}
