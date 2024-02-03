@extends('layouts.app')

@section('content')
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <alert-component type="danger" :details="[]" title="Erro ao tentar cadastrar a marca" v-if="false"></alert-component>
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Login</h4>
                                <p class="mb-0">Digite seu e-mail e senha para entrar</p>
                            </div>
                            <div class="card-body">
                                <login-component/>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Não tenho uma conta?
                                    <a href="{{ route('users.create') }}" class="text-primary text-gradient font-weight-bold">Inscrever-se</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signin-ill.jpg');
                    background-size: cover;">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Parlador Ideal"</h4>
                            <p class="text-white position-relative">Visa facilitar a troca de ideias libertárias do grupo colaboradores.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
