<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Главная</a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('posts.index') ? 'active' : '' }}"
       href="{{ route('posts.index') }}">Посты</a>
</li>
<li class="nav-item {{ request()->routeIs('posts.categories.index') ? 'active' : '' }}"><a class="nav-link"
                                                                                           href="{{ route('posts.categories.index') }}">Категории</a>
</li>

@if (auth()->check() && auth()->user()->is_admin)
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}"
           href="{{ route('admin.index') }}">Админка</a>
    </li>
@endif

