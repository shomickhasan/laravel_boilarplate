@extends('backend.template.master')
@section('dynamic_title','Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Blank</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    @can('add user')
        <section class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">+Add New</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Role</th>
                                  <th>Created By</th>
                                  <th>...</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($users as $user)
                                  <tr>
                                      <td>{{$user->name}}</td>
                                      <td>{{$user->email}}</td>
                                      <td>
                                          @foreach($user->roles as $role)
                                              {{$role->name}}
                                          @endforeach
                                      </td>
                                      <td> 4</td>
                                      <td>X</td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
              </div>
            </div>
        </div>
    </section>
    @endcan
    <!-- /.content -->
@endsection
@push('script')
    <script>

    </script>
@endpush

