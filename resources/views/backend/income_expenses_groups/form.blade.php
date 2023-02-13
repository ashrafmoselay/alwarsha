
@once
    @push('style')
        <style>
            {{-- CSS Style --}}
        </style>
    @endpush
@endonce


<div class='row'>
    <div class="col-md-12">
    {{-- START name --}}
    <div class="form-group">
        <label class="required">@lang('inputs.name')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="name" required value="{{ $row->name ?? old('name') }}"  placeholder="@lang('inputs.name')">
        </div>
        <x-validation-error input='name' />
    </div>
    {{-- END name --}}
</div>



</div>


@once
    @push('script')
        <script>
            $(function() {
                {{-- JS Code --}}
            })
        </script>
    @endpush
@endonce
