@extends('user::layouts.adminLTE.app')
@section('content')

    <section class="section">
        <div class="container-fluid">
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Editar Registro</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-layout-wrapper">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-style mb-30">
                        <form method="POST" action="{{ url('/user/webcams/update/'.$webcam->id) }}">
                            @csrf
                            @method('PUT') 
                            @include('user::webcams._partials.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection  
