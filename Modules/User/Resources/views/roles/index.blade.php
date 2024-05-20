@extends('user::layouts.adminLTE.app')
@section('content')

  <section class="table-components">
    <div class="container-fluid">
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="title d-flex align-items-center flex-wrap mb-30">
              <h2 class="mr-40">Roles</h2>
              @can('role-create')
                <a href="{{ url('/user/ACL/roles/create') }}" class="main-btn info-btn btn-hover btn-sm"><i class="lni lni-plus mr-5"></i></a>
              @endcan 
            </div>
          </div>
          <div class="col-md-4">
            <div class="right">
              <div class="table-search d-flex">
                <form action="{{ url('/user/ACL/roles/search') }}">
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
            <div class="col-lg-8">
              <div class="card-style mb-30">
                <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                  <div class="left"></div>
                  <div class="right"></div>
                </div>
                <div class="table-wrapper table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th><h6>#</h6></th>
                        <th><h6>Nombre</h6></th>
                        {{-- <th><h6>Cliente</h6></th> --}}
                        <th><h6>Rol Predeterminado</h6></th>
                        <th><h6>Guard.</h6></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($roles as $role)
                      <tr>
                        <td class="min-width"><h6 class="text-sm">{{ ++$i }}</h6></td>
                        <td class="min-width"><p>{{ $role->name }}</p></td>
                        {{-- @if ($role->customer_name == null)
                          <td class="min-width"><p>Sistema</p></td>
                        @else
                          <td class="min-width"><p>{{ $role->customer_name }}</p></td>
                        @endif --}}
                        @if (strlen($role->customer_idReference) == 6)
                          <td class="min-width"><p>{{ $role->customer_idReference }}</p></td>
                        @else
                          <td class="min-width"><p>Sistema</p></td>
                        @endif
                        <td class="min-width">
                          <span class="status-btn @if($role->guard_name == 'web') info-btn @elseIf($role->guard_name == 'user') active-btn @endif">
                            {{ $role->guard_name }}
                          </span>
                        </td>
                        <td class="text-right">
                          <div class="btn-group">
                            <div class="action">
                              <a href="{{ url('/user/ACL/roles/show/'.$role->id) }}">
                                <button class="text-active">
                                  <i class="lni lni-eye"></i>
                                </button>
                              </a>
                            </div>

                            <div class="action">
                              <a href="{{ url('/user/ACL/roles/edit/'.$role->id) }}">
                                <!--show icon edit only if not default role system and if not is a super user -->
                                @if ($guard_name == 'web')
                                  <button class="text-info">
                                    <i class="lni lni-pencil"></i>
                                  </button>
                                @endif  
                              </a>
                            </div>
                           
                            @can('role-delete')
                            <form method="POST" action="{{ url('/admin/ACL/roles/delete/'.$role->id) }}">
                              @csrf
                              <div class="action">
                                <input name="_method" type="hidden" value="DELETE">
                                @if (!$role->system_role)
                                  <button type="submit" class="text-danger">
                                    <i class="lni lni-trash-can"></i>
                                  </button>
                                @endif
                              </div>
                            </form>
                            @endcan
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  @if (isset($search))
                    {!! $roles-> appends($search)->links() !!} <!-- appends envia variable en la paginacion-->
                  @else
                    {!! $roles-> links() !!}    
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