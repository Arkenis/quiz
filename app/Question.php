<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $timestamps = false;

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function correctAnswer()
    {
        foreach ($this->answers as $answer)
        {
            if ($answer->correct) return $answer;
        }

        return null;
    }
}
