<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $MAC, mixed $input)
 * @method static find(int|string|null $id)
 */
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

    protected $fillable = [
        self::USER_ID,
        self::IS_MALE,
        self::HEIGHT,
        self::WEIGHT,
        self::AGE,
        self::SITDAILY,
        self::BACKPAIN,
        self::POSTURE,
        self::MAC,
    ];
}
