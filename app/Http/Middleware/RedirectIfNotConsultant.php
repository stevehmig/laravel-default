<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfNotConsultant {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (! $request->user()->isAConsultant() )
		{
			return redirect('')->withErrors(['middleware'=>'Not Authorized']);
		}
		return $next($request);
	}

}
