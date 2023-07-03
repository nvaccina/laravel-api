<aside class="bg-dark py-2">
    <ul>
        <li class="py-2">
            <a href="{{route('admin.home')}}" class="{{Route::currentRouteName() === 'admin.home' ? 'active' : ''}}">
                <i class="pe-2 fa-solid fa-chart-line"></i>Dashboard
            </a>
        </li>
        <li class="py-2">
            <a href="{{route('admin.works.index')}}" class="{{Route::currentRouteName() === 'admin.works.index' ? 'active' : ''}}">
                <i class="pe-2 fa-regular fa-folder"></i>Works
            </a>
        </li>
        <li class="py-2">
            <a href="{{route('admin.works.create')}}" class="{{Route::currentRouteName() === 'admin.works.create' ? 'active' : ''}}">
                <i class="pe-2 fa-regular fa-square-plus"></i> New Work
            </a>
        </li>
        <li class="py-2">
            <a href="{{ route('admin.types.index')}}" class="{{Route::currentRouteName() === 'admin.types.index' ? 'active' : ''}}">
                <i class="pe-2 fa-solid fa-tag"></i> Gestione Types
            </a>
        </li>
        <li class="py-2">
            <a href="#" class="{{Route::currentRouteName() === '#' ? 'active' : ''}}">
                <i class="pe-2 fa-solid fa-tag"></i> Gestione Technologies
            </a>
        </li>
        <li class="py-2">
            <a href="{{route('admin.type_works')}}" class="{{Route::currentRouteName() === 'admin.type_works' ? 'active' : ''}}">
                <i class="pe-2 fa-solid fa-folder-tree"></i> Elenco Type/Work
            </a>
        </li>
        <li class="py-2">
            <a href="#" class="{{Route::currentRouteName() === '#' ? 'active' : ''}}">
                <i class="pe-2 fa-solid fa-folder-tree"></i> Elenco Technology/Work
            </a>
        </li>
        <li class="py-2">
            <a href="{{route('admin.stats')}}" class="{{Route::currentRouteName() === 'admin.stats' ? 'active' : ''}}">
                <i class="pe-2 fa-solid fa-chart-column"></i>Statistiche
            </a>
        </li>
    </ul>
</aside>
