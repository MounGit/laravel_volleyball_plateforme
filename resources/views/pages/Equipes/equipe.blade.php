@extends('template.main')

@section('content')

    <section class="container my-5">
        <h2 class="text-center">Équipes</h2>


        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif


        <div class="d-flex justify-content-center my-5">
            <a class="btn btn-success" href="{{ route('equipes.create') }}">Ajouter une équipe</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Nombre de joueurs</th>
                    <th scope="col">Av</th>
                    <th scope="col">Ctr</th>
                    <th scope="col">Arr</th>
                    <th scope="col">Rpc</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipe as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->city }}</td>
                        <td>
                            {{ count($data->joueurs) }}
                            /
                            {{ $data->max }}max</td>

                        @php
                            $av = 0;
                            $ctr = 0;
                            $arr = 0;
                            $rpc = 0;
                            
                            foreach ($data->joueurs as $item) {
                                if ($item->role->name == 'avant') {
                                    $av++;
                                } elseif ($item->role->name == 'centre') {
                                    $ctr++;
                                } elseif ($item->role->name == 'arrière') {
                                    $arr++;
                                } elseif ($item->role->name == 'remplaçant') {
                                    $rpc++;
                                }
                            }                            
                        @endphp

                        <td>{{ $av }}</td>
                        <td>{{ $ctr }}</td>
                        <td>{{ $arr }}</td>
                        <td>{{ $rpc }}</td>
                        <td class="d-flex justify-content-around">
                            <a class="btn btn-primary" href="{{ route('equipes.show', $data->id) }}">Détails</a>
                            <a class="btn btn-warning mx-2" href="{{ route('equipes.edit', $data->id) }}">Modifier</a>
                            <form action="{{ route('equipes.destroy', $data->id) }}" method="post">
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