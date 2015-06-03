<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfNotDbAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (! $request->user()->isADbAdmin() )
		{
			return redirect('')->withErrors(['middleware'=>'Not Authorized']);
		}
		return $next($request);
	}

}
