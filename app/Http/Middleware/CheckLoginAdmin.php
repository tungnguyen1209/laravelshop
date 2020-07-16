<?php


namespace App\Http\Middleware;
use Closure;
use Auth;
class CheckLoginAdmin
{
    public function handle($request, Closure $next)
    {
        if(!get_data_user('admins')){
            return view('admin::login');
        }
        else{
            return $next($request);
        }
    }
}
