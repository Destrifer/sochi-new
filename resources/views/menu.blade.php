<ul class="menu">
    @foreach($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
            @if ($menu_item->children->count() > 0)
                <ul class="submenu">
                    @foreach($menu_item->children as $child)
                        <li><a href="{{ $child->link() }}">{{ $child->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>