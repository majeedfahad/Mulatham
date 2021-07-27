<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'fakename',
        'password',
        'order',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAlive()
    {
        return $this->status == 1;
    }

    public function isAdmin()
    {
        return $this->role == 1;
    }
    
    public function answers()
    {
        return $this->hasMany(AnswerUser::class);
    }

    public function hasAnsweredQuestion($question)
    {
        return $this->answers->map->question->flatten()->contains($question);
    }

    public function assignQuestionScore($question_id)
    {
        $answer = $this->answers()->where('question_id', $question_id)->first();
        if($answer) {
            $this->score += $answer->score;
            $this->update();
        }
    }

    public function eliminate()
    {
        $this->status = 0;
        $this->update();
    }

    public function assignFailedEliminationScore($score)
    {
        $this->score += $score;
        $this->update();
    }

    public function assignSuccessEliminationScore($score)
    {
        $this->hidden_score += $score;
        $this->update();
    }

    public function isEligibleToAnswer($question)
    {
        if($this->isAlive() && !$this->hasAnsweredQuestion($question)) {
            return true;
        }
        return false;
    }

    public function getTotalScore()
    {
        return $this->score + $this->hidden_score;
    }
}
