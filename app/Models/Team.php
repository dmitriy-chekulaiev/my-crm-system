<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Team extends Model
{

    protected $fillable = ['owner_id', 'name'];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

//    public function getTeamNameAttribute()
//    {
//        if ($this->name) {
//            return $this->name;
//        } else {
//            return $this->owner->profile->fullname;
//        }
//    }



}
