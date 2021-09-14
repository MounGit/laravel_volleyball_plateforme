@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Équipes complètes</h2>
    <div class="d-flex flex-column align-items-center">
        @foreach ($equipe as $data)
            @if (count($data->joueurs) == $data->max)
                    <h3 class="my-3">
                        <a class="text-decoration-none" href="{{route('equipes.show', $data->id)}}">{{$data->name}}</a>
                    </h3>
            @endif
        @endforeach
    </div>
</section>


<section class="container my-5">
    <h2 class="text-center my-3">Équipes incomplètes</h2>
    <div class="d-flex flex-column align-items-center">
        @php
            $a = 0;
        @endphp
        @foreach ($equipe as $data)
            @if (count($data->joueurs) < $data->max && $a < 2)
                @php
                    $a++;
                @endphp
                    <h3 class="my-3">
                        <a class="text-decoration-none" href="{{route('equipes.show', $data->id)}}">{{$data->name}}</a>
                    </h3>
            @endif
        @endforeach
    </div>

</section>

<section class="container my-5">
    <h2 class="text-center my-3">Joueurs sans équipe</h2>

    <div class="d-flex flex-column align-items-center">
        @php
            $b = 0;
        @endphp
        @foreach ($joueur->shuffle() as $data)
            @if ($data->equipe_id == NULL &&$b < 4)
                @php
                    $b++;
                @endphp
                    <h3 class="my-3">
                        <a class="text-decoration-none" href="{{route('joueurs.show', $data->id)}}">
                            {{$data->name}} {{$data->firstname}}
                        </a>
                    </h3>
            @endif
        @endforeach
    </div>
</section>

<section class="container my-5">
    <h2 class="text-center my-3">Joueurs avec équipe</h2>

    <div class="d-flex flex-column align-items-center">
        @php
            $c = 0;
        @endphp
        @foreach ($joueur->shuffle() as $data)
            @if ($data->equipe_id != null && $c <4)
                @php
                    $c++;
                @endphp
                    <h3 class="my-3">
                        <a class="text-decoration-none" href="{{route('joueurs.show', $data->id)}}">
                            {{$data->name}} {{$data->firstname}}
                        </a>
                    </h3>
            @endif
        @endforeach
    </div>
</section>

<section class="container my-5">
    <h2 class="text-center my-3">Équipes européennes</h2>

    <div class="d-flex flex-column align-items-center">
        @foreach ($equipe as $data)
            @if ($data->continent->name == "Europe")
                    <h3 class="my-3">
                        <a class="text-decoration-none" href="{{route('equipes.show', $data->id)}}">{{$data->name}}</a>
                    </h3>
            @endif
        @endforeach
    </div>
</section>

<section class="container my-5">
    <h2 class="text-center my-3">Équipes hors europe</h2>

    <div class="d-flex flex-column align-items-center">
        @foreach ($equipe as $data)
            @if ($data->continent->name != "Europe")
                    <h3 class="my-3">
                        <a class="text-decoration-none" href="{{route('equipes.show', $data->id)}}">{{$data->name}}</a>
                    </h3>
            @endif
        @endforeach
    </div>
</section>

<section class="container my-5">
    <h2 class="text-center my-3">Joueuses</h2>

    <div class="d-flex flex-column align-items-center">
        @php
            $d = 0;
        @endphp
        @foreach ($joueur as $data)
            @if ($data->gender == "Femme" && $d <5)
                @php
                    $d++;
                @endphp
            <h3 class="my-3">
                        <a class="text-decoration-none" href="{{route('joueurs.show', $data->id)}}">
                            {{$data->name}} {{$data->firstname}}
                        </a>
                    </h3>
            @endif
        @endforeach
    </div>
</section>

<section class="container my-5">
    <h2 class="text-center my-3">Joueurs</h2>

    <div class="d-flex flex-column align-items-center">
        @php
            $e = 0;
        @endphp
        @foreach ($joueur as $data)
            @if ($data->gender == "Homme" && $e < 5)
                @php
                    $e++;
                @endphp
                    <h3 class="my-3">
                        <a class="text-decoration-none" href="{{route('joueurs.show', $data->id)}}">
                            {{$data->name}} {{$data->firstname}}
                        </a>
                    </h3>
            @endif
        @endforeach
    </div>
</section>
   
@endsection