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
                        <li class="breadcrumb-item active">Activity Logger</li>
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
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>category type</th>

                                </tr>
                                </thead>
                                <tbody>
                                @php $count = 1 @endphp
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$category->category_name}}</td>
                                        <td>{{$category->category_type}}</td>
                                        <td><a href="{{route('add-edit',$category->id)}}" class="btn btn-default">edit</a></td>

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
    <!-- /.content -->
@endsection
@push('script')
    <script>

    </script>
@endpush

