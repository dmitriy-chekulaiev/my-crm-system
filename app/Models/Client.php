<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'address', 'contact_person'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
