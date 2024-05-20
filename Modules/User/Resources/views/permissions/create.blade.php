@extends('user::layouts.adminLTE.app')
@section('content')

<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Crear Nuevo Permiso</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- ========== title-wrapper end ========== -->

        <div class="form-layout-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <form method="POST" action="{{ url('/user/ACL/permissions/create') }}">
                            @include('user::permissions._partials.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection  
