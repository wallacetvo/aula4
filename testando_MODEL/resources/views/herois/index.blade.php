@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista Heróis</div>
                <div class="card-body">
                    <div class="row">
                        @forelse ($herois as $heroi)
                        <form action="/herois" method="post">
                            @method('DELETE')
                            @csrf

                            <div class="card" style="width: 10.5rem;">
                                <img src="{{$heroi->foto}}" class="card-img-top" alt="{{$heroi->name}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$heroi->name}}</h5>
                                    <a href="/herois/detalhe/{{$heroi->id}}" class="btn btn-primary btn-block">Detalhes</a>

                                    <input type="hidden" name="id" value="{{$heroi->id}}">
                                    <input type="submit" class="btn btn-danger btn-block" value="Excluir"/>
                                </div>
                            </div>
                        </form>
                        @empty
                            <h5>Os meus heróis morreram de overdose...</h5>
                        @endforelse
                    </div>

                    {{$herois->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
