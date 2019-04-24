<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DamagedProperty extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'damage_property';

    /**
     * Primary key of current table.
     *
     * @var string
     */
    protected $primaryKey = ['idInventory','idUser'];
	public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fee','refunded','info'];

	/**
	 * Set the keys for a save update query.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	protected function setKeysForSaveQuery(Builder $query)
	{
	    $keys = $this->getKeyName();
	    if(!is_array($keys)){
	        return parent::setKeysForSaveQuery($query);
	    }

	    foreach($keys as $keyName){
	        $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
	    }

	    return $query;
	}

	/**
	 * Get the primary key value for a save query.
	 *
	 * @param mixed $keyName
	 * @return mixed
	 */
	protected function getKeyForSaveQuery($keyName = null)
	{
	    if(is_null($keyName)){
	        $keyName = $this->getKeyName();
	    }

	    if (isset($this->original[$keyName])) {
	        return $this->original[$keyName];
	    }

	    return $this->getAttribute($keyName);
	}
}

