@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Photos</h2>


    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif


    <div class="d-flex justify-content-center my-5">
        <a class="btn btn-success" href="{{route('photos.create')}}">Ajouter une photo</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Nom</th>
                <th scope="col">Photo</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($photo as $data)
                    <tr>
                    <th scope="row"></th>
                    <td>{{$data->joueur->name}} {{$data->joueur->firstname}}</td>
                    <td>
                        <img style="width: 40px; height: 30px" src="{{asset('img/'.$data->url)}}" alt="">
                    </td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="{{route('photos.show', $data->id)}}">Détails</a>
                        <a class="btn btn-warning mx-2" href="{{route('photos.edit', $data->id)}}">Modifier</a>
                        <form action="{{route('photos.destroy', $data->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
              </tr>
                @endforeach
    
            </tbody>
          </table>
</section>

@endsection
