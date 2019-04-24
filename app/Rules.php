<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'current_rules';

    /**
     * Primary key of current table.
     *
     * @var string
     */
    protected $primaryKey = 'idRule';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rentPeriod','extensionNumber','extensionPeriod','rentNumber','banPeriod','itmNotReturned','itmNotReturnedPeriod'];
}


