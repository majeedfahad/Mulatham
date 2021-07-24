<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elimination extends Model
{
    use HasFactory;

    public static function fight($attacker, $target, $fakename)
    {
        $result = null;
        $elimination = new Elimination();
        $elimination->attacker_id = $attacker->id;
        $elimination->target_id = $target->id;
        if(Elimination::isSuccess($target, $fakename)) {
            $elimination->status = 'SUCCESS';
            $elimination->points = $target->score;
            $target->eliminate();
            $result = true;
        } else {
            $elimination->status = 'FAILED';
            $elimination->points = $attacker->score;
            $attacker->eliminate();
            $result = false;
        }
        $elimination->save();
        return $result;
    }

    private static function isSuccess($target, $fakename) {
        return $target->fakename == $fakename;
    }
}
