<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elimination extends Model
{
    use HasFactory;

    public static function fight($attacker, $target, $targetName)
    {
        $result = null;
        $elimination = new Elimination();
        $elimination->attacker_id = $attacker->id;
        $elimination->target_id = $target->id;
        if(Elimination::isSuccess($target, $targetName)) {
            $elimination->status = 'SUCCESS';
            $elimination->points = $target->score;
            $attacker->assignEliminationScore($target->score);
            $target->eliminate();
            $result = true;
        } else {
            $elimination->status = 'FAILED';
            $elimination->points = $attacker->score;
            $target->assignEliminationScore($attacker->score);
            $attacker->eliminate();
            $result = false;
        }
        $elimination->save();
        return $result;
    }

    private static function isSuccess($target, $targetName) {
        return $target->name == $targetName;
    }
}
