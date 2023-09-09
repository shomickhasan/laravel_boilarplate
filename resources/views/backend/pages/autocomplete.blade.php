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
                <div class="col-md-10">
                        <input type="text" class="form-control" id="query">
                        <div id="autocomplete-results" class=""></div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@push('script')
    <script>
        $(document).ready(function(){
            let $autocompleteInput = $('#query');
            let $autocompleteResults = $('#autocomplete-results');
            $('#query').keyup(function (){
                let ths= $(this);
                let query = ths.val();
                //alert(query);
                if(query!==''){
                    $.ajax({
                        url: '{{ route("search") }}',
                        method: 'GET',
                        data: { query: query },
                        success: function (result) {
                            $autocompleteResults.empty();
                            if (result.data.length > 0) {
                                let $suggestionList = $('<ul class="list-group-item" style="cursor: pointer"></ul>');
                                $.each(result.data, function (index, item) {
                                    let $suggestionItem = $('<li class="list-group-item">' + item.name + '</li>');
                                    $suggestionList.append($suggestionItem);
                                    $autocompleteResults.append($suggestionList);
                                    $suggestionItem.click(function () {
                                        $autocompleteInput.val(item.name);
                                        $autocompleteResults.empty();
                                    });

                                });

                            }
                        }
                    })
                }
                else{
                    $autocompleteResults.empty();
                }
            });
        });
    </script>
@endpush
