<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Exceptions\Handler;
use App\Http\Traits\TableTrait;

class InventoryController extends Controller
{
    use TableTrait;

    /**
     * Show the current Inventory.
     *
     * @return Response
     */
    public function showInventory()
    {
    	$inventory = $this->show('App\Inventory');
        return view('listofitems', ['items' => $inventory]);
    }

    /**
     * Show the current Inventory.
     *
     * @return Response
     */
    public function showInventoryOne($id)
    {
        $inventory = Inventory::where('idInventory', $id)->get();
        return view('itempage', ['item' => $inventory]);
    }

    /**
     * Get the current Inventory.
     *
     * @return Response
     */
    public function getInventory()
    {
    	$inventory = $this->show('App\Inventory');
        return $inventory->toJson();
    }

    /**
     * Get available items.
     *
     * @return Response
     */
    public function getAvailable()
    {
    	$inventory = Inventory::where('availability', 1)->get();
        return $inventory->toJson();
    }

    /**
     * Get available items.
     *
     * @return Response
     */
    public function getUnavailable()
    {
    	$inventory = Inventory::where('availability', 0)->get();
        return $inventory->toJson();
    }

    /**
     * Change availability of an item.
     *
     * @return Response
     */
    public function changeField($id, $value, $field)
    {
    	
        return $this->change($id, $value, $field, 'App\Inventory');
    	
    }

     /**
     * Insert a new game.
     *
     * @param  Request  $request
     * @return Response
     */
    public function insertGame(Request $request)
    {
        //dd($request->all());
        
        $request->request->add(['availability' => '1']);
        $request->request->add(['rentStatus' => '1']);
        
        return $this->insert($request, 'App\Inventory');
    }

}
