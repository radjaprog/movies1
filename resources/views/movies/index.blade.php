@extends('layouts.master')       {{--prekopiraj sve iz master.blade.php    --}}

@section('title', 'Blog - all movies')   {{-- 'title' koji section je u pitanju, a drugi argument je text. @section znaci da ubacujemo ovde ono sto je @yield title('title') --}}

@section('content')                      {{-- ono sto je definisano u @yield('content') u master.blade.php ce biti ovde--}}
    <body class="antialiased">
       <ul>
          @if ($movies) {{--// ako ima postova ispisi uradi dole--}}
            
        @foreach($movies as $movie)   <!-- izvlacenje svih postova iz baze posts , sto znaci da bi ovde trebali da se ovde na mesto $posts upisuje naziv koji smo definisali u web.php  'postsX' -->
        <li>
            <!-- https://127.0.0.1:8000/posts/{id} , ovde dole gde je definisano 'id' => $post->id prolazimo kroz asocijativni niz u bazi i pitamo ima li ovde neki 'id' da se zameni, ako ima onda umesto {id} upisujemo tu vrednost sto smo pronasli u 'id' => $post->id -->
            <a href="{{ route('singlepost-route', [ 'id' => $movie->id ]) }}"> <!-- pozivanje route metode zato sto smo pozvali viticaste zagrade i izvrsava kod koji smo definisali unutar viticastih zagrada-->
                {{ $movie->title }}
            </a>
        </li>
        @endforeach

        @else 
            nema bg fuck off   {{-- ako nema postova ispisaj poruku--}}
        @endif 
        
            <!-- $route = route('single-post')   // route-helper ovde bi tip ove vrednosti bio string, zato sto route helper vraca string, koja bi bila definisana funkcijom
            function route($routeName) {
                foreeach (routes as route) {
                    if (route->name === $routeName) {
                        return route->path;
                    }
                } prolazi kroz niz route koja se zove single-post
            }
            -->
       </ul>
@endsection