@extends('user::layouts.adminLTE.app')
@section('content')

<section class="table-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="title d-flex align-items-center flex-wrap mb-30">
              <h2 class="mr-40">Usuarios</h2>
              @can('user-create')
                <a href="{{ route('users.create') }}" class="main-btn info-btn btn-hover btn-sm"><i class="lni lni-plus mr-5"></i></a>
              @endcan  
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-4">
            <div class="right">
              <div class="table-search d-flex st-input-search">
                <form action="/user/users/search">
                  <input style="background-color: #fff;" id="search" type="text" name="search" value="{{ $search ?? '' }}" placeholder="Buscar usuario..">
                  {{-- <button type="submit"><i class="lni lni-search-alt"></i></button> --}}
                </form>
              </div>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>

      <!-- ========== title-wrapper end ========== -->

      <!-- ========== tables-wrapper start ========== -->
      <div class="tables-wrapper">
        <div class="row">
            <div class="col-lg-12">
              <div class="card-style mb-30">
                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
              <div class="left">
                {{-- <div class="dataTable-dropdown">
                  <label>
                      <select class="dataTable-selector">
                          <option value="5">5</option>
                          <option value="10" selected="">10</option>
                          <option value="15">15</option>
                          <option value="20">20</option>
                          <option value="25">25</option>
                      </select> items por pgina
                  </label>
                </div> --}}
              </div>
              <div class="right">
              </div>
            </div>
                <div class="table-wrapper table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><h6>#</h6></th>
                        <th><h6>Nombre</h6></th>
                        <th><h6>Cod Referencia</h6></th>
                        <th><h6>Status</h6></th>
                        <th><h6>Email</h6></th>
                        <th><h6>Acciones</h6></th>
                      </tr>
                      <!-- end table row-->
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-sm"><h6 class="text-sm">{{ ++$i }}</h6></td>
                            <td class="min-width"><p>{{ $user->name }}</p></td>
                            <td class="min-width"><p>{{ $user->idReference }}</p></td>
                            <td class="min-width">
                              @if ($user->status == 1)
                                <p><span class="status-btn success-btn">Activado</span></p>
                              @else
                                <p><span class="status-btn active-btn">Desactivado</span></p>
                              @endif
                            </td>
                            <td class="min-width"><p><i class="lni lni-envelope mr-10"></i>{{ $user->email }}</p></td>
                            <td class="text-right">
                                <div class="btn-group">
                                    <div class="action">
                                        <a href="{{ route('users.show', $user->id) }}">
                                            <button class="text-active">
                                                <i class="lni lni-eye"></i>
                                            </button>
                                        </a>
                                    </div>
                                    @can('user-edit')
                                    <div class="action">
                                        @if ($currentUserId != $user->id)
                                          <a href="{{ route('users.edit', $user->id) }}">
                                              <button class="text-info">
                                                  <i class="lni lni-pencil"></i>
                                              </button>
                                          </a>
                                        @endif  
                                    </div>
                                    @endcan
                                    {{-- @can('user-delete')
                                    @if ($currentUserId != $user->id)
                                      <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                          @csrf
                                          <div class="action">
                                              <input name="_method" type="hidden" value="DELETE">
                                              <button type="submit" class="text-danger">
                                                <i class="lni lni-trash-can"></i>
                                              </button>
                                          </div>
                                      </form>
                                    @endif  
                                    @endcan --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                      <!-- end table row -->
                    </tbody>
                  </table>
                  <!-- end table -->
                  @if (isset($search))
                    {!! $users-> appends($search)->links() !!} <!-- appends envia variable en la paginacion-->
                  @else
                    {!! $users-> links() !!}    
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