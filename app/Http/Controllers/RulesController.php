<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules;
use App\Rents;
use App\UserStatus;
use App\BanLog;
use App\Exceptions\Handler;
use App\Http\Traits\RulesTrait;

class RulesController extends Controller
{
    use RulesTrait;
    /**
     * Check and ban users based on late returns.
     *
     * @return Response
     */
    public function checkReturns()
    {
    	return $this->checkReturnsLogic();
    }

    /**
     * Get current rules.
     *
     * @return Response
     */
    public function getRules()
    {
    	$rules = Rules::where((new Rules)->getKeyName(), 1)->first();
    	
        return $rules;
    }

    /**
     * .
     *
     * @return Response
     */
    public function showRules()
    {
        $rules = Rules::where((new Rules)->getKeyName(), 1)->first();
        
        return view('rules', ['rules' => $rules]);
    }


}
