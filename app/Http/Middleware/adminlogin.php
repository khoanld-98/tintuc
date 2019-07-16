<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class adminlogin
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
        if(Auth::check()){
            $userr=Auth::user();
            if($userr->quyen==1){
                return $next($request);
                }
                return redirect('admin/dangnhap')->with('thongbao','bạn không phải là quản trị viên');
        }
        else{
            return redirect('admin/dangnhap')->with('thongbao','bạn không phải là quản trị viên');
        }
    }
}
