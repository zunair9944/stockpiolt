<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GlobalDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $globalData = getAppSettings(); // Your database query here;
        $logo = $globalData->getFirstMediaUrl('images', 'thumb');
        // var_dump($logo); die;
        
        $data['logo'] = $logo;
        // $data['notifications'] = $notifications;
        // Share the data with all views
        view()->share($data);
        return $next($request);
    }
}
