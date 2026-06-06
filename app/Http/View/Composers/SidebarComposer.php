<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SidebarComposer
{

    /**
     * Create a new composer.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Get the authenticated user
        $user = Auth::user();
        $menus = collect();

        // If the user is authenticated and has a role, retrieve the menus associated with the user's role
        if ($user && $user->role) {
            $menus = $user->role->menus()
                ->with('submenus')
                ->orderBy('menu_order')
                ->get();
        }

        // Pass the menus to the view
        $view->with('menus', $menus);
    }
}
