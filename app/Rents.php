<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rents extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'rents';

    /**
     * Primary key of current table.
     *
     * @var string
     */
    protected $primaryKey = 'idRent';
   
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['dateRented','expiryRent','dateReturned','booked','extraExtension','idInventory','idUser'];
}


