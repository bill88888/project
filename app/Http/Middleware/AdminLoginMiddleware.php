<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
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
        //检测是否有adminname session值存在
        if($request->session()->has('adminname')){
            //4 获取访问模块的控制器和方法与权限列表对比
            $nodelist=session('nodelist');

            $actions=explode('\\', \Route::current()->getActionName());
            //或$actions=explode('\\', \Route::currentRouteAction());
            $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
            $func=explode('@', $actions[count($actions)-1]);
            $controllerName=$func[0];
            $actionName=$func[1];
            
            // echo $controllerName.':'.$actionName;
            
            //作对比
            //访问模块控制器不存在或访问模块方法不存在
            // if(empty($nodelist[$controllerName]) || !in_array($actionName,$nodelist[$controllerName])){
            //     return redirect('/admin')->with('error','您没有权限!');
            // }

            //访问下一个请求
            return $next($request);
        }else{
            return redirect('/adminlogin/create');
        }
    }
}
