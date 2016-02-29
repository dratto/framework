@extends('template')


@section('content')

        <!--Testando comentarios-->
        @foreach($pessoas as $pessoa => $p)
            <h3>{{ $p['nome'] }}</h3>
            <h6>{{ $p['idade'] }}</h6>
        @endforeach

@endsection