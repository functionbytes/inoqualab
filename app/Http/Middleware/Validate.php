<?php

namespace App\Http\Middleware;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\Factor\FactorMails;
use Carbon\Carbon;

use Closure;

class Validate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = User::auth();
        
        if($user->validate==0){

            return redirect()->route('candidates.validation');
           
        }else{
            return $next($request);
        }

    }

    

}
