<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\weight;

class challenge extends Model
{
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'id', 'user_id');
    }
}
