<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InteressesIngevuld
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if ($user) {
            $student = $user->student;

            if (!$student || !$student->studentInteresses()->exists()) {
                return redirect()->route('interesses.create');
            }
        }

        return $next($request);
    }
}
