@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <login-component>
            <form method="POST" action="{{ route('auth.signin') }}">
                @csrf
                <div class="form-group">
                    <input-container-component title="E-mail" id="email" id-help="emailHelp" text-help="">
                        <input type="email" class="form-control" id="email" required aria-describedby="emailHelp" placeholder="E-mail" name="email">
                    </input-container-component>
                </div>
                <div class="form-group">
                    <input-container-component title="Senha" id="password" id-help="passwordHelp" text-help="">
                        <input type="password" class="form-control" id="password" required aria-describedby="passwordHelp" placeholder="Senha" name="password">
                    </input-container-component>
                </div>
                <div class="text-cente'r">
                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Logar</button>
                </div>
            </form>
        </login-component>
    </div>
@endsection
