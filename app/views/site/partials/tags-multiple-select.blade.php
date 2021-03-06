@section('head')
{{ HTML::style('/css/multiselect.css'); }}
{{ HTML::script('/js/multiselect.js'); }}
<script type="text/javascript">
    $(document).ready(function() {
        $('#tags').multiselect({
            enableFiltering: true,
            numberDisplayed: 5,
            maxHeight: 360
        });
    });

    $(document).on('click', '.multiselect-group', function(event) {
        var checkAll = true;
        var $opts = $(this).parent().nextUntil(':has(.multiselect-group)');
        var $inactive = $opts.filter(':not(.active)');
        var $toggleMe = $inactive;
        if ($inactive.length == 0) {
            $toggleMe = $opts;
            checkAll = false;
        }
        $toggleMe.find('input').click();
        $(this).parent().find('input').prop('checked', checkAll);
    });
</script>
@stop

<select id="tags" name="tags[]" multiple class="auto-submit">
    @foreach($tagsselect['options'] AS $tag)
    <optgroup label="{{ $tag['parent'] }}">
        @foreach($tag['tags'] AS $subtagid => $subtag)
        <option value="{{ $subtagid }}"@if(isset($tagsselect['selected'][$subtagid])) selected@endif>{{ $subtag }}</option>
        @endforeach
    </optgroup>
    @endforeach
</select>