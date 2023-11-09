<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum Day: string
{
    use HasEnumValues;
    case SATURDAY = 'شنبه';
    case SUNDAY = 'یکشنبه';
    case MONDAY = 'دوشنبه';
    case TUESDAY = 'سه شنبه';
    case WEDNESDAY = 'چهارشنبه';
    case THURSDAY = 'پنجشنبه';
    case FRIDAY = 'جمعه';

}
