<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rents;
use App\Inventory;
use App\Rules;
use App\UserStatus;
use App\Exceptions\Handler;
use App\Http\Traits\TableTrait;
use App\Http\Traits\RentsTrait;

class RentsController extends Controller
{
    use TableTrait;
    use RentsTrait;

    /**
     * Show current users.
     *
     * @return Response
     */
    public function showRents()
    {
    	$rents = $this->show('App\Rents');
        return view('listofitems', ['user' => $rents]);
    }

    /**
     * Get the current Inventory.
     *
     * @return Response
     */
    public function getRents()
    {
        $rents = $this->show('App\Rents');
        return $rents->toJson();
    }

    /**
     * Change fields.
     *
     * @return Response
     */
    public function changeField($id, $field, $value=NULL)
    {
    	return $this->change($id, $value, $field, 'App\Rents');
    }

    /**
     * Rent a given game
     *
     * @return Response
     */
    public function rentGame($id,$idUser,$period)
    {
        $rents = $this->rentGameLogic($id,$idUser,$period);
    }

    /**
     * Return a rented game
     *
     * @return Response
     */
    public function returnGame($idRent, $condition)
    {
        $rents = $this->returnGameLogic($idRent, $condition);
    }

    /**
     * Request an extension
     *
     * @return Response
     */
    public function requestExtend($idRent)
    {
        
        $rents = $this->requestExtendLogic($idRent);
    }
   
     /**
     * Insert a new rent.
     *
     * @param  Request  $request
     * @return Response
     */
    public function insertRent(Request $request)
    {
        return $this->rentGameLogic($request->idInventory,$request->idUser,$request->period);
    }
}
