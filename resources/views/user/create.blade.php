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
                        <user-create/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection