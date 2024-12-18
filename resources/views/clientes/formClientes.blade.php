@extends('main')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">Clientes</li>
        <li class="breadcrumb-item"><a href="{{route('clientes.index')}}">Lista Clientes</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{!empty($cliente->id)?'Alterar Cliente : '.$cliente->nome:'Cadastro'}}</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <form action="{{!empty($cliente->id) ? route('clientes.update', $cliente->id) : route('clientes.store')}}" method="POST">
                @csrf
                @if (!empty($cliente->id))
                    @method('PUT')
                @endif

                <div class="row">

                    <div class="col-md-6 p-2">
                        <label for="nome" class="form-label">Nome</label>
                        <input 
                            type="text" 
                            name="nome"
                            class="form-control" 
                            value="{{old('nome')??$cliente->nome??''}}">
                    </div>

                    <div class="col-md-6 p-2">
                        <label for="email" class="form-label">Email</label>
                        <input 
                            name="email"
                            type="email" 
                            class="form-control" 
                            value="{{old('email')??$cliente->email??''}}">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                                <path d="M11 2H9v3h2z"/>
                                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                            </svg>
                            Salvar
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection