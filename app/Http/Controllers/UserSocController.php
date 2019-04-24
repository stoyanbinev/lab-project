<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserSoc;
use App\Exceptions\Handler;
use App\Http\Traits\TableTrait;

class UserSocController extends Controller
{
    use TableTrait;
    /**
     * Show current users.
     *
     * @return Response
     */
    public function showUsers()
    {
        $rents = $this->show('App\User');
        return view('listofitems', ['user' => $rents]);
    }

    /**
     * Get the current Inventory.
     *
     * @return Response
     */
    public function getUsers()
    {
        $rents = $this->show('App\User');
        return $rents->toJson();
    }

    /**
     * Change availability of an item.
     *
     * @return Response
     */
    public function changeField($id, $field, $value=NULL)
    {
    	return $this->change($id, $value, $field, 'App\User');
    }
   

     /**
     * Insert a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function insertUser(Request $request)
    {
        return $this->insert($request, 'App\User');
    }

}
