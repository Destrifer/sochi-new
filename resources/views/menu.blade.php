<style>
    @media (max-width: 768px) {


        :root {
            --bar-width: 40px;
            --bar-height: 6px;
            --hamburger-gap: 4px;
            --foreground: #333;
            --background: white;
            --hamburger-margin: 8px;
            --animation-timing: 200ms ease-in-out;
            --hamburger-height: calc(var(--bar-height) * 3 + var(--hamburger-gap) * 2);
        }

        .hamburger-menu {
            --x-width: calc(var(--hamburger-height) * 1.41421356237);
            display: flex;
            flex-direction: column;
            gap: var(--hamburger-gap);
            width: max-content;
            position: relative;
            /*top: var(--hamburger-margin);
            right: var(--hamburger-margin);*/
            z-index: 2;
            cursor: pointer;
        }

        .hamburger-menu:has(input:checked) {
            --foreground: #333;
            --background: #333;
        }

        .hamburger-menu:has(input:focus-visible)::before,
        .hamburger-menu:has(input:focus-visible)::after,
        .hamburger-menu input:focus-visible {
            border: 1px solid var(--background);
            box-shadow: 0 0 0 1px var(--foreground);
        }

        .hamburger-menu::before,
        .hamburger-menu::after,
        .hamburger-menu input {
            content: "";
            width: var(--bar-width);
            height: var(--bar-height);
            background-color: var(--foreground);
            border-radius: 9999px;
            transform-origin: left center;
            transition: opacity var(--animation-timing), width var(--animation-timing),
                rotate var(--animation-timing), translate var(--animation-timing),
                background-color var(--animation-timing);
        }

        .hamburger-menu input {
            appearance: none;
            padding: 0;
            margin: 0;
            outline: none;
            pointer-events: none;
        }

        .hamburger-menu:has(input:checked)::before {
            rotate: 45deg;
            width: var(--x-width);
            translate: 0 calc(var(--bar-height) / -2);
        }

        .hamburger-menu:has(input:checked)::after {
            rotate: -45deg;
            width: var(--x-width);
            translate: 0 calc(var(--bar-height) / 2);
        }

        .hamburger-menu input:checked {
            opacity: 0;
            width: 0;
        }

        .sidebar {
            position: fixed;
            /* Фиксируем позицию относительно окна */
            top: 0;
            right: 0;
            z-index: 1;
            /* Устанавливаем слой выше остальных элементов */
            transition: translate var(--animation-timing);
            translate: 100%;
            /* По умолчанию скрываем за экраном */
            padding-top: calc(var(--hamburger-height) + var(--hamburger-margin) + 1rem);
            background-color: var(--background);
            color: var(--foreground);
            width: 10rem;
            /* Фиксируем ширину меню */
            height: 100vh;
            /* Меню на всю высоту экрана */
        }

        .hamburger-menu:has(input:checked)+.sidebar {
            translate: 0;
        }
    }

    /* Основной стиль для меню */
    ul.menu {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    ul.menu>li {
        position: relative;
    }

    ul.menu>li>a {
        text-decoration: none;
        padding: 10px;
        display: block;
    }

    /* Стиль для подменю */
    ul.submenu {
        display: none;
        position: absolute;
        /*top: 100%;*/
        left: 0;
        list-style: none;
        padding: 0;
        margin: 0;
        background-color: #fff;
        /*border: 1px solid #ccc;*/
        width: max-content;
    }

    ul.submenu li {
        padding: 0 10px;
    }

    /* Показываем подменю при наведении на родительский пункт */
    ul.menu>li:hover>.submenu {
        display: block;
    }

    ul.submenu>li>a {
        padding: 3px;
        display: block;
    }

    @media (max-width: 768px) {
        .header nav section .menu {
            flex-direction: column;
        }

        .header nav section .menu .submenu {
            display: none;
        }

        .header nav .phone a:first-child {
            font-size: unset;
        }

        .header nav .phone a:first-child:after {
            background-color: unset;
        }

        .header nav section .menu li {
            padding: 0;
        }
    }
</style>
<ul class="menu">
    @foreach ($items as $menu_item)
        <li>
            <a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
            @if ($menu_item->children->count() > 0)
                <ul class="submenu">
                    @foreach ($menu_item->children as $child)
                        <li><a href="{{ $child->link() }}">{{ $child->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
