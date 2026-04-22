<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->level == 1) {
            return $next($request);
        }
        return redirect()->route('admin.login')->with(['error' => 'Bạn cần đăng nhập bằng tài khoản quản trị để truy cập trang này.']);
    }
}
