@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <post-component/>
    </div>
    <div class="bg-info fixed-bottom shadow-lg border-top">
        <div class="container d-flex justify-content-center">
          <div class="row">
            <div class="px-0">
              <a class="btn btn-primary d-inline-flex align-items-center mt-1" data-bs-target="#modalNewPost" data-bs-toggle="modal" href="#">
                <span>Novo Post</span>
              </a>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
