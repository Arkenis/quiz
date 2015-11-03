<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['quiz_id', 'user_id', 'score'];

    public function results()
    {
        return $this->hasMany('App\Result');
    }

    function getName()
    {
        $user = User::find($this->user_id);
        return $user->name;
    }
}
