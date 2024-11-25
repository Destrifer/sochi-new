<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Аренда авто без водителя в Сочи. Защита бронирования. Выезд в Крым и Абхазию. Подача 24/7. Детское Кресло')">
    <meta name="yandex-verification" content="120084642aed756a" />
    <title>@yield('title', 'Аренда Авто в Сочи ' . date('Y') . ' - посуточный прокат машин по выгодным ценам')</title>
    <link rel="icon" href="{{ asset('/img/favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/page.css">
    <link rel="stylesheet" href="/css/about.css">
    <link rel="stylesheet" href="/css/contacts.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
                k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(98106364, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/98106364" style="position:absolute; left:-9999px;" alt="" />
        </div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>

<body>
    <header class="header">
        <div class="top-line">
            <div class="container">
                <div id="address-container">
                    <label for="address-select">Выберите адрес:</label>
                    <select id="address-select" onchange="updateAddress()">
                        <option value="10" data-address="г. Москва, ул. Ленина, 1" selected>Адрес 1</option>
                        <option value="11" data-address="г. Санкт-Петербург, Невский проспект, 100">Адрес 2
                        </option>
                        <option value="12" data-address="г. Казань, ул. Баумана, 50">Адрес 3</option>
                    </select>
                    <p id="address-display">Выбранный адрес: г. Москва, ул. Ленина, 1</p>
                </div>
            </div>
            <nav class="container">
                <section>
                    <a href="/" class="logo"></a>
                    {{ menu('Main', 'menu') }}
                </section>
                <div class="phone">
                    <a href="https://wa.me/79952260541" target='_blank'><img src="img/wa.svg" alt=""></a>
                    <a href="https://t.me/sochirentacar_manager" target='_blank'><img src="img/tg.svg"
                            alt=""></a>
                    <a href="tel:+78622777333">+7 (8622) 777-333</a>
                </div>
            </nav>
    </header>

    <main>
        @yield('content')
    </main>
    <footer class="grey">
        <div class="container">
            <div class="foottop">
                <div class="column">
                    <div>
                        <strong>Сервис</strong>
                        {{-- <a href="#">RentRide в России</a>
						<a href="#">Блог</a>
						<a href="#">Новости</a> --}}
                        <a href="/#about">О нас</a>
                        <a href="/rent/">Условия аренды</a>
                        <a href="/insurance/">Условия страхования</a>
                        <a href="/contacts/">Контакты</a>
                    </div>
                </div>
                <div class="column">
                    <strong>Связаться с нами</strong>
                    <a class="phone" href="tel:+78622777333">+7 (8622) 777-333</a>
                    <span>ежедневно с 9:00 до 21:00</span>
                    <div class="card-block">
                        <img src="img/mir.svg" alt="" srcset="">
                        <img src="img/visa.svg" alt="" srcset="">
                        <img src="img/maestro.svg" alt="" srcset="">
                        <img src="img/mastercard.svg" alt="" srcset="">
                    </div>
                </div>
            </div>
        </div>
        <div class="footbot">
            <div class="container">
                <span>© 2015-{{ date('Y') }} sochirentacar.su</span>
            </div>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const swipers = document.querySelectorAll('.swiper-container');
            swipers.forEach(function(swiperContainer) {
                new Swiper(swiperContainer, {
                    loop: true,
                    navigation: {
                        nextEl: swiperContainer.querySelector('.swiper-button-next'),
                        prevEl: swiperContainer.querySelector('.swiper-button-prev'),
                    },
                    pagination: {
                        el: swiperContainer.querySelector('.swiper-pagination'),
                        clickable: true,
                    },
                    slidesPerView: 1,
                    spaceBetween: 10,
                });
            });
        });
    </script>
</body>

</html>
