@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-2" style=""></div>
        <div class="col-lg-10">
            <h3 class="text-center">
                <span style="font-weight: normal;">Cadastrar novo usuário</span>
            </h3>
            <div class="card mb-2">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="form19" class="text-dark">Nome</label>
                                    <input type="text" class="form-control" id="form14" placeholder="Ex: Minha casa">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="form19" class="text-dark">E-mail</label>
                                    <input type="text" class="form-control" id="form14">
                                    <small class="form-text text-muted text-right"></small>
                                </div>
                                <div class="form-group col-md-6" style="">
                                    <label for="form19" class="text-dark">Senha</label>
                                    <input type="text" class="form-control" id="form14">
                                    <small class="form-text text-muted text-right"></small>
                                </div>
                                <div class="form-group col-md-6" style="">
                                    <label for="form19" class="text-dark">Confirmar Senha</label>
                                    <input type="text" class="form-control" id="form14">
                                    <small class="form-text text-muted text-right"></small>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection