<?php

namespace App\Http\Middleware;
use App\Http\Controllers\Controller;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Factor\FactorMails;
use Carbon\Carbon;

use Closure;

class Factor
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

        $user = Auth::user();

        if($user->factor==0){

            if($user->two_factor_expires_at == null){

                    //dd('hola');
                    $user->generateTwoFactorCode();
                    $url = null; 
                    //Mail::send(new FactorMails($user,$url));
                    return redirect()->route('candidates.factors');

                    return $next($request);
                
            }else{

                if($user->two_factor_expires_at < now()){
                    return redirect()->route('candidates.factors.expired');
                }else{
                    return $next($request);
                }

            }
        }else{
            return $next($request);
        }

    }

    

}
