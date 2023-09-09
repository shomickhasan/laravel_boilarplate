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
               <h3>Start your code here and lets enjoy</h3>
                <h1 id="myip"></h1>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@push('script')
    <script>
        let data
        $.getJSON('https://api.db-ip.com/v2/free/self', function(data) {
             data= JSON.stringify(data, null, 2)
           // document.getElementById('myip').innerHTML=
        });
        console.log(data)
    </script>
@endpush

