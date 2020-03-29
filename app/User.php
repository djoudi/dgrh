<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'email', 'password','first_name','last_name','mobile','grade','wilaya_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

       public function getFullnameAttribute()
   {
    return $this->first_name . " " . $this->last_name;
   }


    /** Scope */
    public function scopeAdmin($query)
    {
      return $query->Role('admin')->get();
    } 

     public function scopeMiclat($query)
    {
      return $query->Role('miclat')->get();
    } 

     public function scopeWilayas($query)
    {
      return $query->Role('wilaya')->get();
    } 

}
