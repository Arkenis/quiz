<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    function getName()
    {
        $user = User::find($this->user_id);
        return $user->name;
    }
}
