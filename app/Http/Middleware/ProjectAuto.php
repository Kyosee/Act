<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Wechat;

class ProjectAuto{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $project = $request->project;

        // 应用检测
        if(!$project || !$project->template){
            abort(404);
        }

        // 微信登录检测
        if(!session('wechat_user')){
            // return Wechat::oauthCheck($project->wechat_id, $request->url());
        }

        return $next($request);
    }
}
