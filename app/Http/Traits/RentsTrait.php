<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Rents;
use App\Inventory;
use App\Rules;
use App\UserStatus;

trait RentsTrait
{

    /**
     * Rent a given game
     *
     * @return Response
     */
    public function rentGameLogic($id,$idUser,$period)
    {
        $game = Inventory::where((new Inventory)->getKeyName(),$id)->first();
        try{
            if($game->availability > 0){

                $rules = Rules::first();
                $userStatus = UserStatus::where('idUser',$idUser)->first();
                if((int)$rules->rentPeriod<$period){return 0;}
                if($rules->rentNumber<=$userStatus->totalRents){return 0;}
                if($userStatus->idStatusType==2){return 0;}
                $rent = new Rents;
                $date = date("Y-m-d");
                $rent->dateRented = $date;
                $rent->expiryRent = date("Y-m-d",strtotime($date."+ ".$period." days"));
                $null=strtotime("January 1 1970");
                $rent->dateReturned = date('Y-m-d', $null);
                $rent->booked = 0;
                $rent->extraExtension = 0;
                $rent->idInventory = $id;
                $rent->idUser = $idUser;
                $rent->save();

                UserStatus::where('idUser',$idUser)->update(array('totalRents' => \DB::raw('totalRents+1')));

                Inventory::where((new Inventory)->getKeyName(), $id)->update(array('availability' => $game->availability-1));

                return 1;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return 0;
    }

    /**
     * Return a rented game
     *
     * @return Response
     */
    public function returnGameLogic($idRent, $condition)
    {
        $rent = Rents::where((new Rents)->getKeyName(),$idRent)->first();
        
        try{
            if($rent->dateReturned !== '1970-01-01') {return 0;}
            $game = Inventory::where((new Inventory)->getKeyName(),$rent->idInventory)->first();
            $rent->dateReturned = date("Y-m-d");

            $rent->save();

            UserStatus::where('idUser',$rent->idUser)->update(array('totalRents' => \DB::raw('totalRents-1')));

            Inventory::where((new Inventory)->getKeyName(), $rent->idInventory)->update(array('availability' => $game->availability+1));

            return 1;
            
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return 0;
    }

    /**
     * Request an extension
     *
     * @return Response
     */
    public function requestExtendLogic($idRent)
    {
        
        $rent = Rents::where((new Rents)->getKeyName(),$idRent)->first();
        
        try{
            $game = Inventory::where((new Inventory)->getKeyName(),$rent->idInventory)->first();
            $rules =  Rules::first();
            if($rent->extraExtension >= $rules->extensionNumber){return 0;}
            $rent->expiryRent = date("Y-m-d",strtotime($rent->expiryRent."+ ".$rules->extensionPeriod." days"));
            $rent->extraExtension = $rent->extraExtension + 1;
            $rent->save();

            return 1;
            
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
        return 0;
    }

}
