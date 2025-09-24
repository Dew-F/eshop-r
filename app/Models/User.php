<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public function setPasswordAttribute($password){
        $this->attributes['Password'] = bcrypt($password);
    }

    public function getAuthPassword() {
        return $this->Password;
    }

    protected $primaryKey = 'ID';

    public function user(){
    return $this->belongsTo(User::class, 'UserID');
    }

    public function getRole() {
        return $this->RoleID;
    }

    public function roles() 
    {
       return $this->belongsTo(Role::class, 'RoleID');
    }

    public $timestamps = false;
    protected $fillable = ['Name', 'Email', 'Password', 'RoleID'];
    protected $hidden = ['Password'];
}
