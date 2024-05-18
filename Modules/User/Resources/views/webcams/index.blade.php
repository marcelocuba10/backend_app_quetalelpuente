@extends('user::layouts.adminLTE.app')
@section('content')

<section class="table-components">
    <div class="container-fluid">
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="title d-flex align-items-center flex-wrap mb-30">
              <h2 class="mr-40">Webcams</h2>
              @can('webcams-create')
                <a href="{{ url('/user/webcams/create') }}" class="main-btn info-btn btn-hover btn-sm"><i class="lni lni-plus mr-5"></i></a>
              @endcan 
            </div>
          </div>
          <div class="col-md-4">
            <div class="right">
              <div class="table-search d-flex">
                <form action="{{ url('/user/webcams/search') }}">
                  <input style="background-color: #fff;" id="search" type="text" name="search" value="{{ $search ?? '' }}" placeholder="Buscar..">
                  <button type="submit"><i class="lni lni-search-alt"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tables-wrapper">
        <div class="row">
            <div class="col-lg-12">
              <div class="card-style mb-30">
                <div class="table-wrapper table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><h6>#</h6></th>
                        <th><h6>Título</h6></th>
                        <th><h6>URL</h6></th>
                        <th><h6>Type</h6></th>
                        <th><h6>Status</h6></th>
                        <th><h6>Acciones</h6></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($webcams as $webcam)
                        <tr>
                            <td class="text-sm"><h6 class="text-sm">#{{ ++$i }}</h6></td>
                            <td class="min-width"><p>{{ $webcam->title }}</p></td>
                            <td class="min-width"><p>{{ $webcam->url }}</p></td>
                            <td class="min-width"><p>{{ $webcam->type }}</p></td>
                            <td class="min-width">
                              @if ($webcam->status == 1)
                                <p><span class="status-btn primary-btn">Habilitado</span></p>
                              @else
                                <p><span class="status-btn light-btn">Deshabilitado</span></p>
                              @endif
                            </td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <div class="action">
                                        <a href="{{ route('notifications.show', $webcam->id) }}">
                                            <button class="text-active">
                                                <i class="lni lni-eye"></i>
                                            </button>
                                        </a>
                                    </div>
                                    @can('notification-edit')
                                    <div class="action">
                                        <a href="{{ route('notifications.edit', $webcam->id) }}">
                                            <button class="text-info">
                                                <i class="lni lni-pencil"></i>
                                            </button>
                                        </a>
                                    </div>
                                    @endcan
                                    @can('notification-delete')
                                    <form method="POST" action="{{ route('notifications.destroy', $webcam->id) }}">
                                        @csrf
                                        <div class="action">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="text-danger">
                                              <i class="lni lni-trash-can"></i>
                                            </button>
                                        </div>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      <!-- end table row -->
                    </tbody>
                  </table>
                  <!-- end table -->
                  @if (isset($search))
                    {!! $notifications-> appends($search)->links() !!} <!-- appends envia variable en la paginacion-->
                  @else
                    {!! $notifications-> links() !!}    
                  @endif
                </div>
              </div>
              <!-- end card -->
            </div>
            <!-- end col -->
          </div>
        <!-- end row -->
      </div>
      <!-- ========== tables-wrapper end ========== -->
    </div>
    <!-- end container -->
  </section>

@endsection