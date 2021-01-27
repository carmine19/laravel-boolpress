@extends('layouts.dashboard')

@section('content')


  <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Tutti le categorie</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $ele)
                            <tr>
                                <td>
                                    {{ $ele->id }}
                                </td>
                                <td>
                                    {{ $ele->name }}
                                </td>
                                <td>
                                    <a href="{{route('admin.categories.show', ['category' => $ele->id])}}"
                                        class="btn btn-success">
                                        Visualizza
                                     </a>
                                    <a href="{{route('admin.categories.edit', ['category' => $ele->id])}}"
                                        class="btn btn-warning">
                                        Modifica
                                     </a>
                                    <form method="POST" class="d-inline-block"
                                    action="{{route('admin.categories.destroy' , ['category' => $ele->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Cancella
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                </table>
                <div class="col-lg-12">
                    <a href="{{route('admin.categories.create')}}" class="btn btn-info">Aggiungi categoria</a>
                </div>
            </div>
        </div>
    </div>


@endsection

