<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>itnotepad</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    @auth()
                    @if(Auth::user()->role == 1) 
                            <a class="nav-link" href="{{ route('main.index') }}">Главная</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.index') }}">Категории</a>
                        </li>
                    @endif
                    @endauth
                        <li class="nav-item">
                            @auth()
                            <a class="nav-link" href="{{ route('personal.main.main') }}"><u>Личный кабинет</u></a>
                            @endauth
                            @guest()
                            <a class="nav-link" href="{{ route('personal.main.main') }}">Войти</a>
                            @endguest
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    @yield('content')
    <!-- коммент -->
    @guest()
    <section class="edica-footer-banner-section">
        <div class="container">
            <div class="footer-banner" data-aos="fade-up">
                <h1 class="banner-title" style="color:orangered">Авторизация</h1>
                <p class="banner-text">Для доступа к сервису необходимо авторизоваться.</p>
            </div>
        </div>
    </section>
    @endguest
    <footer class="edica-footer" style="margin-top: 5px" data-aos="fade-up">
        <div class="container">
            <div class="row footer-widget-area">
                <div class="col-md-3">
                    <!-- <a href="/" class="footer-brand-wrapper">
                        <img src="{{ asset('assets/images/Mondi.png') }}" alt="edica logo">
                    </a> -->
                    <p class="contact-details">admin@com</p>
                    <p class="contact-details">8 (821) 269-95-55</p>
                    <nav class="footer-social-links">
                        <a href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a href="#!"><i class="fab fa-twitter"></i></a>
                        <a href="#!"><i class="fab fa-behance"></i></a>
                        <a href="#!"><i class="fab fa-dribbble"></i></a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="footer-nav">
                        <a href="https://www.mondigroup.com/en/about-mondi/" class="nav-link">О компании</a>
                        <a href="https://www.mondigroup.com/en/products-and-solutions/" class="nav-link">Продукция</a>
                        <a href="https://www.mondigroup.com/en/sustainability/" class="nav-link">Стабильность</a>
                        <a href="https://www.mondigroup.com/en/careers/" class="nav-link">Карьера</a>
                        <a href="https://www.mondigroup.com/en/investors/" class="nav-link">Инвесторам</a>
                        <a href="https://www.mondigroup.com/en/newsroom/" class="nav-link">Новости</a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <nav class="footer-nav">
                        <a href="https://www.mondigroup.com/en/about-mondi/faqs/" class="nav-link">Часто задаваемые вопросы</a>
                        <a href="https://www.mondigroup.com/en/about-mondi/where-we-operate/" class="nav-link">Где мы работаем</a>
                        <a href="https://www.mondigroup.com/en/legal-notice/" class="nav-link">Юридическая информация</a>
                        <a href="https://www.mondigroup.com/en/privacy-notices/" class="nav-link">Конфиденциальность</a>
                        <a href="https://www.mondigroup.com/en/accessibility/" class="nav-link">Доступность</a>
                        <a href="https://www.mondigroup.com/en/contact/" class="nav-link">Запросы</a>
                    </nav>
                </div>
            </div>
            <div class="footer-bottom-content">
                <p class="mb-0">© . 2023 <a href="https://www.mondigroup.com/" target="_blank" rel="noopener noreferrer" class="text-reset"></a> . Все права защищены.</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
      </script>
</body>

</html>
