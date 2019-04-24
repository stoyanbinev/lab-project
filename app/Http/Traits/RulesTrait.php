<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Rules;
use App\Rents;
use App\UserStatus;
use App\BanLog;
use App\Exceptions\Handler;

trait RulesTrait
{

    /**
     * Check and ban users based on late returns.
     *
     * @return Response
     */
    public function checkReturnsLogic()
    {
        $rules = Rules::where((new Rules)->getKeyName(), 1)->first();
        try{
            $matches = \DB::select(\DB::raw("SELECT idUser FROM GameSoc.rents WHERE (dateReturned>expiryRent AND booked=0) OR(dateReturned LIKE '%1970%' AND (SELECT CURRENT_TIMESTAMP)>expiryRent) GROUP BY idUser HAVING count(*) > 1;"));
        } catch (\Exception $exception) {
                return $exception->getMessage();
        }

        foreach ($matches as $match) {
            try {
                Rents::where('idUser', $match->idUser)->update(['booked' => 1]);
                app('App\Http\Controllers\BanLogController')->banUser($match->idUser, 'Late returns');
                return 1;
            } catch (\Exception $exception) {
                return $exception->getMessage();
            }
        }
        
        return 0;
    }

}
