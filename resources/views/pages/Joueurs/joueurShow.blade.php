@extends('template.main')

@section('content')

<section class="container my-5 d-flex flex-column align-items-center">
    <h2 class="text-center mb-5">{{$joueur->name}} {{$joueur->firstname}}</h2>
    
    <div class="card my-5" style="width: 25rem">
        <div class="card-body">
            <img src="{{asset('img/'. $joueur->photo->url)}}" class="card-img-top" alt="">
            <h2>{{$joueur->name}} {{$joueur->firstname}}</h2>            
            <h2>{{$joueur->age}} ans</h2>  
            
            @if ($joueur->equipe == NULL)
            @else 
                <h2>{{$joueur->equipe->name}}</h2>
            @endif 
            
            <h2>{{$joueur->role->name}}</h2>            
            <h4>{{$joueur->gender}}</h4>            
            <h4>{{$joueur->country}}</h4>   
            <hr>
            <p>tel : {{$joueur->phone}}</p>         
            <p>email : {{$joueur->email}}</p>  

            <div class="d-flex justify-content-around mt-5">
                <a class="btn btn-warning" href="{{route('joueurs.edit', $joueur->id)}}">Modifier</a>
                <form action="{{route('joueurs.destroy', $joueur->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection