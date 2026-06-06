<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Loop menu dari database (RBAC) -->
        @forelse($menus as $menu)
            @php
                $hasSubmenus = $menu->submenus->count() > 0;
                $isActive = request()->is('dashboard/' . $menu->slug . '*') ? 'active' : '';
            @endphp

            <li class="nav-item">
                @if ($hasSubmenus)
                    <a class="nav-link {{ $isActive ?: 'collapsed' }}" data-bs-target="#menu-{{ $menu->id }}"
                        data-bs-toggle="collapse" href="#">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->menu_name }}</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="menu-{{ $menu->id }}"
                        class="nav-content collapse {{ request()->is('dashboard/' . $menu->slug . '*') ? 'show' : '' }}"
                        data-bs-parent="#sidebar-nav">
                        @foreach ($menu->submenus as $submenu)
                            <li>
                                <a href="{{ $submenu->route ? route($submenu->route) : '#' }}"
                                    class="{{ request()->routeIs($submenu->route) ? 'active' : '' }}">
                                    <i class="bi bi-circle"></i>
                                    <span>{{ $submenu->submenu_name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <a href="{{ $menu->route ? route($menu->route) : '#' }}"
                        class="nav-link {{ $isActive ?: 'collapsed' }}">
                        <i class="{{ $menu->icon }}"></i>
                        <span>{{ $menu->menu_name }}</span>
                    </a>
                @endif
            </li>
        @empty
            <li class="nav-item">
                <span class="nav-link text-muted">No menu available</span>
            </li>
        @endforelse

        <!-- Menu statis tambahan (View Portal) tetap bisa ditulis manual -->
        <li class="nav-item">
            <a href="/" class="nav-link collapsed">
                <i class="bi bi-box-arrow-up-right"></i>
                <span>View Portal</span>
            </a>
        </li>

    </ul>

</aside><!-- End Sidebar -->
