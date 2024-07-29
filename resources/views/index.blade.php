@extends('layout-page')
@section('title', 'Tu salud es importante')
@section('content')
    <div class="Content">
        <div class="container">
            <div class="Content__container">
                <div class="Content__body">
                    <div class="Content__mainBlog">
                        <a href="{{ route('blogindex', ['id' => $mainblog->id]) }}" class="Content__mainBlog--image">
                            <img src="storage/{{ $mainblog->imagen }}" alt="">
                        </a>
                        <a href="#" class="Content__mainBlog--name">
                            <h3>{{ $mainblog->nombre }}</h3>
                        </a>
                        <div class="Content__mainBlog--description">
                            <p>{{ $mainblog->descripcion }}</p>
                        </div>
                        <div class="Content__mainBlog--details">
                            <div class="Content__mainBlog--details-item">
                                <i class="fa-regular fa-clock"></i>
                                <span>{{ $mainblog->fecha }}</span>
                            </div>
                            <div class="Content__mainBlog--details-item">
                                <i class="fa-regular fa-eye"></i>
                                <span>{{ $mainblog->views }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="Content__blogsContainer">
                        @foreach ($dateblogs as $dateblog)
                            <a href="{{ route('blogindex', ['id' => $dateblog->id]) }}" class="Content__blogsContainer--blog">
                                <div class="Content__blogsContainer--blog-image">
                                    <img src="storage/{{ $dateblog->imagen }}" alt="">
                                </div>
                                <div class="Content__blogsContainer--blog-details">
                                    <div class="Content__blogsContainer--blog-name">
                                        <h3>{{ $dateblog->nombre }}</h3>
                                    </div>
                                    <div class="Content__blogsContainer--blog-info">
                                        <div class="Content__mainBlog--details-item">
                                            <i class="fa-regular fa-clock"></i>
                                            <span>{{ $dateblog->fecha }}</span>
                                        </div>
                                        <div class="Content__mainBlog--details-item">
                                            <i class="fa-regular fa-eye"></i>
                                            <span>{{ $dateblog->views }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="Content__mostViesPost">
                        <div class="Content__mostViesPost--title">
                            <h2>
                                <img src="./images/page-marker.png" alt="">
                                Nuestros posts mas visitados.
                            </h2>
                        </div>
                        <div class="Content__mostViesPost--grid">
                            @foreach ($mostpopularblogs as $mostpopularblog)
                                <a href="{{ route('blogindex', ['id' => $mostpopularblog->id]) }}" class="Content__mostViesPost--blog">
                                    <div class="Content__blogsContainer--blog-image">
                                        <img src="storage/{{ $mostpopularblog->imagen }}" alt="">
                                    </div>
                                    <div class="Content__blogsContainer--blog-details">
                                        <div class="Content__blogsContainer--blog-name">
                                            <h3>{{ $mostpopularblog->nombre }}</h3>
                                        </div>
                                        <div class="Content__blogsContainer--blog-info">
                                            <div class="Content__mainBlog--details-item">
                                                <i class="fa-regular fa-clock"></i>
                                                <span>{{ $mostpopularblog->fecha }}</span>
                                            </div>
                                            <div class="Content__mainBlog--details-item">
                                                <i class="fa-regular fa-eye"></i>
                                                <span>{{ $mostpopularblog->views }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="Content__sidebar">
                    <div class="Content__sidebar--group">
                        <div class="Content__sidebar--item">
                            <div class="Content__sidebar--heading">
                                <h3>
                                    <img src="{{ asset('images/page-marker.png') }}" alt="">
                                    Posts Populares
                                </h3>
                            </div>
                            <div class="Content__sidebar--posts">
                                @foreach ($popularblogs as $popularblog)
                                    <a href="{{ route('blogindex', ['id' => $popularblog->id]) }}" class="Content__sidebar--post">
                                        <div class="Content__sidebar--post-image">
                                            <img src="{{ asset('storage/' . $popularblog->imagen) }}" alt="">
                                        </div>
                                        <div class="Content__sidebar--post-name">
                                            <h6>{{ $popularblog->nombre }}</h6>
                                        </div>
                                        <div class="Content__sidebar--post-details">
                                            <div class="Content__mainBlog--details-item">
                                                <i class="fa-regular fa-clock"></i>
                                                <span>{{ $popularblog->fecha }}</span>
                                            </div>
                                            <div class="Content__mainBlog--details-item">
                                                <i class="fa-regular fa-eye"></i>
                                                <span>{{ $popularblog->views }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                        <div class="Content__sidebar--item">
                            <div class="Content__sidebar--heading">
                                <h3>
                                    <img src="./images/page-marker.png" alt="">
                                    Comentarios
                                </h3>
                                <div class="Content__sidebar--comments">
                                    <div class="Content__sidebar--comment">
                                        <span>
                                            <i class="fa-solid fa-comments"></i>
                                            Dr. Julio Peña
                                        </span>
                                        <p>La mejor pagina de medicina</p>
                                    </div>
                                    <div class="Content__sidebar--comment">
                                        <span>
                                            <i class="fa-solid fa-comments"></i>
                                            Dr. Armando Casas
                                        </span>
                                        <p>Mucho contenido didactico y necesario</p>
                                    </div>
                                    <div class="Content__sidebar--comment">
                                        <span>
                                            <i class="fa-solid fa-comments"></i>
                                            Dr. Alan Brito
                                        </span>
                                        <p>La brujula guia para una buena salud</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Content__sidebar--item">
                            <div class="Content__sidebar--heading">
                                <h3>
                                    <img src="./images/page-marker.png" alt="">
                                    Calendario
                                </h3>
                                <div class="Content__sidebar--calendar">
                                    <div class="Content__sidebar--calendarContainer">
                                        <table id="wp-calendar" class="wp-calendar-table">
                                            <caption>Abril 2024</caption>
                                            <thead>
                                                <tr>
                                                    <th scope="col" title="Monday">M</th>
                                                    <th scope="col" title="Tuesday">T</th>
                                                    <th scope="col" title="Wednesday">W</th>
                                                    <th scope="col" title="Thursday">T</th>
                                                    <th scope="col" title="Friday">F</th>
                                                    <th scope="col" title="Saturday">S</th>
                                                    <th scope="col" title="Sunday">S</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>5</td>
                                                    <td>6</td>
                                                    <td>7</td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td>10</td>
                                                    <td>11</td>
                                                    <td>12</td>
                                                    <td>13</td>
                                                    <td>14</td>
                                                </tr>
                                                <tr>
                                                    <td>15</td>
                                                    <td>16</td>
                                                    <td>17</td>
                                                    <td>18</td>
                                                    <td>19</td>
                                                    <td>20</td>
                                                    <td id="today">21</td>
                                                </tr>
                                                <tr>
                                                    <td>22</td>
                                                    <td>23</td>
                                                    <td>24</td>
                                                    <td>25</td>
                                                    <td>26</td>
                                                    <td>27</td>
                                                    <td>28</td>
    
                                                </tr>
                                                <tr>
                                                    <td>29</td>
                                                    <td>30</td>
                                                    <td class="pad" colspan="5">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Content__partners">
                <div class="Content__partners--container">
                    <div class="Content__partners--item">
                        <img src="./images/medicalCare.png" alt="">
                    </div>
                    <div class="Content__partners--item">
                        <img src="./images/isidamed.png" alt="">
                    </div>
                    <div class="Content__partners--item">
                        <img src="./images/medicalCare2.png" alt="">
                    </div>
                    <div class="Content__partners--item">
                        <img src="./images/medicom.png" alt="">
                    </div>
                    <div class="Content__partners--item">
                        <img src="./images/alternative.png" alt="">
                    </div>
                    <div class="Content__partners--item">
                        <img src="./images/medlab.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection