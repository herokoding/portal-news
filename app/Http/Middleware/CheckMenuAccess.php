<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Menu;

class CheckMenuAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $menuSlug)
    {
        // Check if the user has access to the specified menu
        $user = auth()->user();
        $menu = Menu::where('slug', $menuSlug)->firstOrFail();

        // Check if the user has access to the menu
        $hasAccess = $user->role->menus()->where('menu_id', $menu->id)->exists();

        if (!$hasAccess) {
            // If the user does not have access, redirect to a 403 page or show an error message
            abort(403, 'Unauthorized access to this menu.');
        }

        return $next($request);
    }
}
