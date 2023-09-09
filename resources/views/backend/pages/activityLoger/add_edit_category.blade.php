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
                        <li class="breadcrumb-item active">Add Edit Same form</li>
                    </ol>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form action="{{ isset($category) ? route('store_update',$category->id) : route('store_update')}}" method="post" class="p-3">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input type="text" class="form-control" name="category_name" value="{{isset($category) ? $category->category_name :""}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Category Type</label>
                                        <input type="text" class="form-control" name="category_type" value="{{isset($category) ? $category->category_type :""}}">
                                    </div>

                                    <div class="form-group">
                                        <input  type="submit" value="save change" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@push('script')
    <script>

    </script>
@endpush

