<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Message extends Model
{
    function users(){
        return $this->belongsTo("App\User","id_seeder","id");
    }
}
