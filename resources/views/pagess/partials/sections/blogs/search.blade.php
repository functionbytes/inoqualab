
<div class="widget__search "  >
    {!! Form::open(['route' => ['blogs.filters'], 'class' => 'search-form', 'id' => 'formFilter', 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
    {{ csrf_field() }}
        <input type="search" id="search"  name="search" autocomplete="off" placeholder="Buscar …" >
        {!! Form::close() !!}
</div>

@push('scripts')

<script>
    $(document).ready(function() {

        $("#search").keypress(function(e) {
            if (e.which == 13) {

                $('#formFilter').submit();
            }
        });


        $("#searchButton").click(function() {
            $('#formFilter').submit();
        });

    });

</script>

@endpush
