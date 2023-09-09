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
                              <tr>
                                  <td>Trident</td>
                                  <td>Internet
                                      Explorer 4.0
                                  </td>
                                  <td>Win 95+</td>
                                  <td> 4</td>
                                  <td>X</td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                      <!-- /.card-body -->
                  </div>
              </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@push('script')
    <script>

    </script>
@endpush

