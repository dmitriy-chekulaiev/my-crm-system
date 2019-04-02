<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SahusoftCom\EloquentImageMutator\EloquentImageMutatorTrait;

class Profile extends Model
{
    use EloquentImageMutatorTrait;
    protected $image_fields = ['profile_image'];
    protected $fillable = ['firstname', 'position', 'lastname', 'phone', 'user_id', 'gender', 'address', 'profile_image'];

    public function fullname()
    {
        return $this->firstname . $this->lastname;
    }
}
