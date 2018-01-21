<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable;
    use HasRoles;

    protected $table = 'users';

    protected $fillable = ['nickname', 'avatar', 'gender', 'email', 'password', 'mobile'];

    protected $hidden = ['password', 'remember_token'];

    /**
     * create user
     * @param  request $user_data user input register data
     * @return boolean
     */
    public function createNewUser($user_data){
        $this->password = bcrypt($user_data->password);
        $this->mobile = $user_data->mobile;
        $this->email = $user_data->email;
        $this->nickname = $user_data->mobile;
        if($this->save()){
            return true;
        }else{
            return false;
        }
    }
}
