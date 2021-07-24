<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'score',
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function active()
    {
        $this->status = 1;
        $this->update();
    }
    public function deActive()
    {
        $this->status = 0;
        $this->update();
    }

    public function isActive()
    {
        return $this->status == 1;
    }

    public function isText()
    {
        return $this->type == 1;
    }
}
