<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\BanLog;
use App\Rules;
use App\UserStatus;
use App\Exceptions\Handler;

trait BanLogTrait
{

    /**
     * Ban a user.
     *
     * @return Response
     */
    public function banUserLogic($id, $info='')
    {

        $user = UserStatus::where('idUser',$id)->first();
        if($user->idStatusType==1) {return 0;}
        try{
            $ban = new BanLog;
            $rules = Rules::first();
            $date = date("Y-m-d");
            $ban->startDate = $date;
            $ban->idUser = $id; 
            $ban->info = $info;
            $ban->endDate = date("Y-m-d",strtotime($date."+ ".$rules->banPeriod." days"));

            $ban->save();

            UserStatus::where('idUser',$id)->update(array('idStatusType' => 1));

            return 1;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return 0;
    }

    /**
     * Ban a user.
     *
     * @return Response
     */
    public function unbanUserLogic($id)
    {

        $user = UserStatus::where('idUser',$id)->first();
        if($user->idStatusType!=1) {return 0;}
        try{
            
            BanLog::where('idUser',$id)->update(array('endDate' => date("Y-m-d")));
            UserStatus::where('idUser',$id)->update(array('idStatusType' => 2));

            return 1;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return 0;
    }

}
