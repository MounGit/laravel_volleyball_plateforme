@extends('template.main')

@section('content')

    <section class="container my-5">
        <h2 class="text-center">Joueurs</h2>


        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif


        <div class="d-flex justify-content-center my-5">
            <a class="btn btn-success" href="{{ route('joueurs.create') }}">Ajouter un joueur</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Équipes</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueur as $data)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->firstname }}</td>
                        <td>
                            @if ($data->equipe == null)
                                <p>pas d'équipe</p>
                            @else
                                <a href="{{ route('equipes.show', $data->equipe->id) }}">{{ $data->equipe->name }}</a>
                            @endif

                        </td>

                        <td class="d-flex justify-content-around">
                            <a class="btn btn-primary" href="{{ route('joueurs.show', $data->id) }}">Détails</a>
                            <a class="btn btn-warning mx-2" href="{{ route('joueurs.edit', $data->id) }}">Modifier</a>
                            <form action="{{ route('joueurs.destroy', $data->id) }}" method="post">
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
