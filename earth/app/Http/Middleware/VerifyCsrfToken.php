<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    // protected $except = [
    //     'api/*', // routes group
    //    'admin/news_content/add',
    //    'admin/news_content/edit/{id}',
    //    'admin/news_content/import/{id}',
    //    'admin/news_content_image/add_image',
    //    'admin/news_content_image/edit_image/{id}',
    // ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        // Disable CSRF by skipping the parent's handle method
        return $next($request);
    }
}
