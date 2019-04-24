<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSoc extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_soc';

    /**
     * Primary key of current table.
     *
     * @var string
     */
    protected $primaryKey = 'idUser';
   
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','DOB','email','phone','idUserType'];
}

