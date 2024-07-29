<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salud En Foco | @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css_page/styles.css')}}">
</head>
<body>
    <div class="Header">
        <div class="container">
            <div class="Header__top">
                <div class="Header__top--left">
                    <div class="Header__top--links">
                        <ul>
                            <li><a href="/" class="activeLink">Inicio +</a></li>
                        </ul>
                    </div>
                </div>
                <div class="Header__top--right">
                    <div class="Header__top--socials">
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa-regular fa-user"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="Header__bottom">
                <div class="Header__bottom--logo">
                    <img src="{{asset('images/page-logo.png')}}" alt="">
                </div>
                <form action="{{ route('searchblog') }}" method="get">
                    <div class="Header__bottom--search">
                        <input type="search" name="data" id="search" placeholder="Buscar...">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @yield('content')
    <footer class="Footer">
        <div class="container">
            <div class="Footer__container">
                <div class="Footer__top">
                    <div class="Footer__top--logo">
                        <img src="{{asset('images/logo-footer.png')}}" alt="">
                    </div>
                    <div class="Footer__top--socials">
                        <h4>Síguenos <span><div class="line"></div></span></h4>
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="Footer__middle">
                    <div class="Footer__middle--about">
                        <div class="Footer__middle--title">
                            <h4>Sobre nosotros</h4>
                        </div>
                        <div class="Footer__middle--description">
                            <p>Etiam condimentum aliquam odio, ut consectetur enim. Nullam metus purus, pharetra quis tempus.</p>
                        </div>
                        <div class="Footer__middle--information">
                            <ul>
                                <li>
                                    <a href="#">
                                        <div class="icon"><i class="fa-solid fa-phone"></i></div>
                                        <div class="strongText"><strong>Teléfono:</strong></div>
                                        <div class="normalText">+3 (092) 508-38-01</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                                        <div class="strongText"><strong>Dirección:</strong></div>
                                        <div class="normalText"> 23, Medical Str., New York, USA</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="icon"><i class="fa-regular fa-clock"></i></div>
                                        <div class="strongText"><strong>Horario:</strong></div>
                                        <div class="normalText">8:00AM - 7:00PM</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="Footer__middle--recentNews">
                        <div class="Footer__middle--title">
                            <h4>Enfermedades recientes</h4>
                        </div>
                        <div class="Footer__middle--recentNews-container">
                            @foreach ($recentblogs as $recentblog)
                                <a href="{{ route('blogindex', ['id' => $recentblog->id]) }}" class="Footer__middle--recentNews-new">
                                    <div class="Footer__middle--recentNews-image">
                                        <img src="{{ asset('storage/' . $recentblog->imagen) }}" alt="">
                                    </div>
                                    <div class="Footer__middle--recentNews-details">
                                        <div class="Footer__middle--recentNews-information">
                                            <div class="Content__mainBlog--details-item">
                                                <i class="fa-regular fa-clock"></i>
                                                <span>{{ $recentblog->fecha }}</span>
                                            </div>
                                        </div>
                                        <div class="Footer__middle--recentNews-name">
                                            <h3>{{ $recentblog->nombre }}</h3>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="Footer__bottom">
            <p>Desarrollado por <span>Angel Bather</span> | <span>Leantony Beltré</span> | 2024 © All Rights reserved</p>
        </div>
    </footer>
</body>
</html>