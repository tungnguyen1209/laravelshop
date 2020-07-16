<?php


namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLoginAdmin
{
    public function handle($request, Closure $next)
    {
        if(!get_data_user('admins')){
            return redirect('admin/login');
        }
        else{
           return $next($request);
        }
    }
}
