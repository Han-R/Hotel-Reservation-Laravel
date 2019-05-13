<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Link;

class CheckPermission
{
    public function handle($request, Closure $next)
    {
        $request = $next($request);
        //جيب اسم الرابط الذي نحن به
        $routeName = \Route::currentRouteName();
        //هل الرابط المطلوب ضمن جدول الصلاحيات او اللينكات
        $inLinksTable = Link::where('route_name', $routeName)->count();
        //المستخدم الي داخل على النظام
        $user = auth()->user();
        //اذا كان هناك مستخدم والرابط المطلوب   ضمن جدول اللينكات
        if($inLinksTable && $user){
            //هل الرابط المطلوب ضمن صلاحيات المستخدم؟؟
            $havePermission = $user->links()->where("route_name", $routeName)->count()>0;
            if(!$havePermission){
                //ان ما كان معه صلاحية يتسهل
                return redirect('/admin/no-access');
            }
        }        
        return $request;
    }
}
