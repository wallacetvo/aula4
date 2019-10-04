@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atualiza Herói</div>

                <div class="card-body">
                    <form action="/herois" method="post" enctype="multipart/form-data">
                        @csrf

                        <form>
                            <div class="form-row">
                                <div class="col">
                                        <img src="{{$heroi->foto}}" alt="{{$heroi->name}}" style="max-width: 70%;">
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <p>Nome:</p>
                                        <input type="text" name="nome" id="nome">
                                    </div>
                                    <div class="form-group">
                                        <p>Identidade Secreta:</p>
                                        <input type="text" name="identidade" id="identidade">
                                    </div>
                                    <div class="form-group">
                                        <p>Origem:</p>
                                        <input type="text" name="origem" id="origem">
                                    </div>
                                    <div class="form-group">
                                        <p>Foto:</p>
                                        <input type="file" name="foto" id="foto">
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="form-group">
                        <input type="submit" value="Gravar">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
