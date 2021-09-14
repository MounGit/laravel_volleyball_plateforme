@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Continents</h2>


    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif


    <div class="d-flex justify-content-center my-5">
        <a class="btn btn-success" href="{{route('continents.create')}}">Ajouter un continent</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Nom</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($continent as $data)
                    <tr>
                    <th scope="row"></th>
                    <td>{{$data->name}}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="{{route('continents.show', $data->id)}}">Détails</a>
                        <a class="btn btn-warning mx-2" href="{{route('continents.edit', $data->id)}}">Modifier</a>
                        <form action="{{route('continents.destroy', $data->id)}}" method="post">
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
