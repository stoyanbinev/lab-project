<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'inventory';

    /**
     * Primary key of current table.
     *
     * @var string
     */
    protected $primaryKey = 'idInventory';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tile','availability','releaseYear','rentStatus','company','image','rating','idPlatform','idCategory','idCollectionType'];
}

