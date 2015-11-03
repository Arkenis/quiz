<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['subject', 'user_id'];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function getUser()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
