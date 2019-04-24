<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_status';

    /**
     * Primary key of current table.
     *
     * @var string
     */
    protected $primaryKey = 'idUserStatus';
   
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['totalRents','lastUpdate','idStatusType'];
}
