@section('scripts_end')
<script src="{!! asset('bower_components/bootstrap-multiselect/dist/js/bootstrap-multiselect.js') !!}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#{!! $id !!}').multiselect({
                                       buttonWidth: '400px', 
                                       includeSelectAllOption: true,
                                       enableFiltering: true
                                       });
    });
</script>
@append