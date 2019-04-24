<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait TableTrait
{

    /**
     * Show the current contents.
     *
     * @return Response
     */
    public function show($class)
    {
        $inventory = $class::all();
        return $inventory;
    }
    
    /**
     * Change row.
     *
     * @return Response
     */
    public function change($id, $value, $field, $class)
    {
    	try {
        	$inventory = $class::where((new $class)->getKeyName(), $id)
        		->update(array($field => $value));
        	$inventory = $class::where((new $class)->getKeyName(), $id)->first();
        	return $inventory->toJson();
    	} catch (\Exception $exception) {
        	return $exception->getMessage();

    	}
    	
    }

     /**
     * Insert a new record.
     *
     * @param  Request  $request
     * @param  String   $class
     * @return Response
     */
    public function insert(Request $request, $class)
    {

        try {
        	$inventory = new $class($request->all());
            $inventory->save();
        	return $inventory->toJson();
    	} catch (\Exception $exception) {
        	return $exception->getMessage();

    	}
    }

    /**
     * Insert a new record.
     *
     * @param  Array/Integer  $id
     * @param  String  $class
     * @return Response
     */
    public function delete($id, $class)
    {

        try {
            $class::destroy($id);
            return 1;
        } catch (\Exception $exception) {
            return $exception->getMessage();

        }
    }

}
