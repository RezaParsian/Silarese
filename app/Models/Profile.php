<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    const
        USER_ID = "user_id",
        IS_MALE = "is_male",
        HEIGHT = "height",
        WEIGHT = "weight",
        AGE = "age",
        SITDAILY = "sitDaily",
        BACKPAIN = "backPain",
        POSTURE = "posture",
        MAC = "mac";
}
