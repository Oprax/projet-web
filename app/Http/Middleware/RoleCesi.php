<?php

namespace App\Http\Middleware;

use Closure;

class RoleCesi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    //si l'utisateur à le role de CESI il peut continuer
    public function handle($request, Closure $next)
    {
        /*$user = $request->user();

        if ($user && $user->isCesi())
        {
            return $next($request);
        }
        return new RedirectResponse(url('/'));*/

        if(\Illuminate\Support\Facades\Auth::user()->isCesi()) {
            return $next($request);
        }else{
            abort(404, 'Page introuvable');
        }
    }
}
