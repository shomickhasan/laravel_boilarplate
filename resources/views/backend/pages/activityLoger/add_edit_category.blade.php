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

                            <div class="form-group" data-select2-id="29">
                                <label>Disabled Result</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                    <option selected="selected" data-select2-id="11">Alabama</option>
                                    <option data-select2-id="35">Alaska</option>
                                    <option disabled="disabled" data-select2-id="36">California (disabled)</option>
                                    <option data-select2-id="37">Delaware</option>
                                    <option data-select2-id="38">Tennessee</option>
                                    <option data-select2-id="39">Texas</option>
                                    <option data-select2-id="40">Washington</option>
                                </select>
                                <span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="10" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-9ww5-container"><span class="select2-selection__rendered" id="select2-9ww5-container" role="textbox" aria-readonly="true" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
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

