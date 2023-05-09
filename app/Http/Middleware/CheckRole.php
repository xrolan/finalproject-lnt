<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        $email = $request->email;
        $user = User::where("email", $email)->get()->first();


        if($user->role === "admin") {
            return response()->json([
                "code" => 404,
                "message" => "Halaman admin belum dibuat"
            ]);
        }else if ($user->role === "user") {
            // return 
        }

        $next($request);
    }
}
