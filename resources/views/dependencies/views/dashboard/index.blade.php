@extends('layouts.dependencies')

@section('content')

<div class="container-fluid dash-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="project-nav">

            <div id="divActions">
                    @include ('dependencies.partials.sections.actions')
            </div>

            <div class="d-flex align-items-center content-filter form-filter">
                <div class="switch">

                    <div class="mx-4 input-group search-area d-lg-inline-flex">
                        <div class="input-group-append">
                            <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                        </div>
                        <input type="text" name="search" id="search"  class="form-control" placeholder="Busqueda...">
                    </div>
                </div>
        </div>

        </div>

        <div id="divContents">
            @include ('dependencies.partials.sections.contents')
        </div>
    </div>
</div>



@endsection


@push('scripts')

    <script>

            $("#search").keypress(function(e) {

                    if(e.which == 13) {

                        var search = $('#search').val();

                        $.ajax({
                                url: "/dependencie/petitions/search",
                                type: "POST",
                                datatype: "html",
                                data: {
                                    _token: $('meta[name=csrf-token]').attr('content'),
                                    search : search,
                                },
                                success: function(data) {
                                    $("#divContents").empty().html(data);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    if (jqXHR.status == 500) {
                                        alert('Internal error: ' + jqXHR.responseText);
                                    } else {
                                        alert('Unexpected error.');
                                    }
                                }
                        });

                        $.ajax({
                                url: "/dependencie/petitions/search/actions",
                                type: "POST",
                                datatype: "html",
                                data: {
                                    _token: $('meta[name=csrf-token]').attr('content'),
                                    search : search,
                                },
                                success: function(data) {
                                    $("#divActions").empty().html(data);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    if (jqXHR.status == 500) {
                                        alert('Internal error: ' + jqXHR.responseText);
                                    } else {
                                        alert('Unexpected error.');
                                    }
                                }
                        });



                    }
            });


            $("#search").change(function(){

                var search = $('#search').val();

                $.ajax({
                        url: "/dependencie/petitions/search",
                        type: "POST",
                        datatype: "html",
                        data: {
                            _token: $('meta[name=csrf-token]').attr('content'),
                            search : search,
                        },
                        success: function(data) {
                            $("#divContents").empty().html(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            if (jqXHR.status == 500) {
                                alert('Internal error: ' + jqXHR.responseText);
                            } else {
                                alert('Unexpected error.');
                            }
                        }
                });

                $.ajax({
                    url: "/dependencie/petitions/search/actions",
                    type: "POST",
                    datatype: "html",
                    data: {
                        _token: $('meta[name=csrf-token]').attr('content'),
                        search : search,
                    },
                    success: function(data) {
                        $("#divActions").empty().html(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        if (jqXHR.status == 500) {
                            alert('Internal error: ' + jqXHR.responseText);
                        } else {
                            alert('Unexpected error.');
                        }
                    }
            });


            });


    </script>

@endpush

