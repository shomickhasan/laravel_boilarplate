@extends('backend.template.master')
@section('dynamic_title','Dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Role</h1>
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
                            <a href="{{route('role.add')}}" class="btn btn-primary">Add Role</a>
                        </div>
                        <div class="card-body">
                            <form action="{{route('role.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Role Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                </div>
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                <h2>Permissions</h2>
                                <div class="row text-capitalize">
                                        @foreach($permission_group as $group)
                                        <div class="col-md-3 text-bold">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" value="" name="">{{$group->group_name}}
                                                    </label>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                            @php
                                                $permissions = App\Models\User::getPermission($group->group_name)
                                            @endphp
                                                <div class="col-md-9">
                                                    @foreach($permissions as $permissions)
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input" value="{{$permissions->id}}" name="permission[]">{{$permissions->name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                       @endforeach
                                </div>>



                                <div class="form-group">
                                    <input type="submit" value="save" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
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

