<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BanLog;
use App\Rules;
use App\UserStatus;
use App\Http\Traits\BanLogTrait;


class BanLogController extends Controller
{

    use BanLogTrait;
    /**
     * Ban a user.
     *
     * @return Response
     */
    public function banUser($id, $info='')
    {
    	return $this->banUserLogic($id, $info);
    }

    /**
     * Ban a user.
     *
     * @return Response
     */
    public function banUserRequest(Request $request)
    {
        return $this->banUserLogic($request->idUser,$request->info);
    }

    /**
     * Ban a user.
     *
     * @return Response
     */
    public function unbanUser($id)
    {

    	return $this->unbanUserLogic($id);
    }
}

