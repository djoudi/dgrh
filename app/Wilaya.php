<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    protected $table = 'wilayas';

    protected $fillable = [
        'name', 'code'
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }
}