<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Jenssegers\Agent\Agent;

class MobileRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Create an instance of the Agent class
        $agent = new Agent();

        // Check if the user is on a mobile device
        if ($agent->isMobile() || $agent->isTablet()) {
            // Redirect to the mobile subdomain
            //return redirect()->to('https://taxi.websl.lk/template2/');
        }

        return $next($request);
    }
}
