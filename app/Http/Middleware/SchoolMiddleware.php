<?php
/**
 * Created by PhpStorm.
 * User: Surani Hiranyada
 * Date: 12/20/2016
 * Time: 9:14 PM
 */


namespace App\Http\Middleware;

use Closure;
use Auth;
use Exception;

class SchoolMiddleware
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
        try
        {
            if (Auth::user()->user_type == "school") {
//            $request->merge(array("user" => "A"));
                return $next($request);
            } else {
                return redirect()->route('getDashboard');
            }
        }
        catch(\Exception $e){
            return view('welcome');
        }

    }
}