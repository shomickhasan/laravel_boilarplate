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
                                    <th>User Name</th>
                                    <th>Activity Name</th>
                                    <th>Activity Type</th>
                                    <th>Activity Message</th>
                                    <th>Model Name</th>
                                    <th>Date &Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $count = 1 @endphp
                                @foreach($activities as $activity)
                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{$activity->user->name}}</td>
                                        <td>{{$activity->activity_name}}</td>
                                        <td>{{$activity->activity_type}}</td>
                                        <td>{{$activity->message}}</td>
                                        <td>{{$activity->model_name}}</td>
                                        <td>{{$activity->created_at}}</td>
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

