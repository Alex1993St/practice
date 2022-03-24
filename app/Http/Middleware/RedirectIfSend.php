<?php

namespace App\Http\Middleware;

use App\Modules\Comment;
use Closure;

class RedirectIfSend
{
    /**
     * Middleware to check if user send comment
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Comment::where('user_id', auth()->user()->id)
                   ->whereDate('created_at', \DB::raw('CURDATE()'))->first()
        ) {
            return $next($request);
        }

        return back();
    }
}
