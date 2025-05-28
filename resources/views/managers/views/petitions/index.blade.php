@extends('layouts.managers')

@section('content')


<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="project-nav">

                <div id="divActions">
                        @include ('managers.partials.sections.actions')
                </div>

                <div class="d-flex align-items-center content-filter form-filter">
                        <div class="switch">

                            <div class="mx-4 input-group search-area d-lg-inline-flex">
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
                                </div>
                                <input type="text" name="search" id="search"  class="form-control" placeholder="Busqueda...">
                            </div>

                            <a class="view-grid" data-toggle="modal" data-target="#exampleFilter">
                                <svg class="primary-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" >
                                    <path d="M8 1H4C2.34315 1 1 2.34315 1 4V8C1 9.65685 2.34315 11 4 11H8C9.65685 11 11 9.65685 11 8V4C11 2.34315 9.65685 1 8 1Z" fill="#008bce"></path>
                                    <path d="M20 1H16C14.3431 1 13 2.34315 13 4V8C13 9.65685 14.3431 11 16 11H20C21.6569 11 23 9.65685 23 8V4C23 2.34315 21.6569 1 20 1Z" fill="#008bce"></path>
                                    <path d="M8 13H4C2.34315 13 1 14.3431 1 16V20C1 21.6569 2.34315 23 4 23H8C9.65685 23 11 21.6569 11 20V16C11 14.3431 9.65685 13 8 13Z" fill="#008bce"></path>
                                    <path d="M20 13H16C14.3431 13 13 14.3431 13 16V20C13 21.6569 14.3431 23 16 23H20C21.6569 23 23 21.6569 23 20V16C23 14.3431 21.6569 13 20 13Z" fill="#008bce"></path>
                                </svg>
                            </a>
                        </div>
                </div>

        </div>

        <div id="divContents">
            @include ('managers.partials.sections.contents')
        </div>
    </div>
</div>



<div class="modal fade" id="exampleSearch" style="display: none;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleFilter" style="display: none;" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Filtrar</h5>
                <button type="button" class="close" data-dismiss="modal"><span>×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <div class="form-group">
                            <div class="align-items-center">
                                    {!! Form::select('dependencie', $dependencies, null , ['class' => 'full-width select','type' => 'text' ,'id' => 'inlineFormCustomSelect' , 'data-init-plugin' => 'select2']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnFilter"  class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
</div>


@endsection




@push('scripts')

    <script>

            $("#btnFilter").click(function() {


                var dependencie = $('#inlineFormCustomSelect').val();
                $('#exampleFilter').modal('hide');

                $.ajax({
                        url: "/manager/petitions/filters",
                        type: "POST",
                        datatype: "html",
                        data: {
                            _token: $('meta[name=csrf-token]').attr('content'),
                            dependencie : dependencie,
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
                        url: "/manager/petitions/actions",
                        type: "POST",
                        datatype: "html",
                        data: {
                            _token: $('meta[name=csrf-token]').attr('content'),
                            dependencie : dependencie,
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

            function clearMassage() {
                $("#observation").val("");
                $("#document").val("");
            };

            $("#search").keypress(function(e) {

                    if(e.which == 13) {

                        var search = $('#search').val();

                        $.ajax({
                                url: "/manager/petitions/search",
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
                                url: "/manager/petitions/search/actions",
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
                        url: "/manager/petitions/search",
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
                    url: "/manager/petitions/search/actions",
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

