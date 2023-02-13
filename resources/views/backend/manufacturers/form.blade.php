
@once
    @push('style')
        <style>
            {{-- CSS Style --}}
        </style>
    @endpush
@endonce


<div class='row'>


<div class="col-md-12">
    <div class="nav-vertical">
        <ul class="nav nav-tabs nav-only-icon nav-top-border no-hover-bg nav-justified">
            @foreach (config('languages') as $name => $lang)
                <li class="nav-item">
                    <a class="nav-link {{ $loop->first ? "active" : "" }}" id="{{ $lang }}-name-tab" data-toggle="tab" aria-controls="{{ $lang }}" href="#name-{{ $lang }}" aria-expanded="true"> {{ $name }} </a>
                </li>
            @endforeach
        </ul>

        <div class="tab-content px-1 my-2">
            @foreach (config('languages') as $name => $lang)
                <div role="tabpanel" class="tab-pane tap- {{ $loop->first ? "active" : "" }}" id="name-{{ $lang }}" aria-expanded="true" aria-labelledby="{{ $lang }}-name-tab">
                    <div class="form-group">
                        <label class="required">@lang('inputs.name') / {{ $name }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="name[{{ $lang }}]" value="{{ isset($row) ? $row->getName($lang) : old("name.$lang") }}" placeholder="@lang('inputs.name') / {{ $name }}">
                        </div>
                        <x-validation-error input="name-{{ $lang }}" />
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


    <div class="col-md-12">
        {{-- START active --}}
        <div class="form-group">
            <div>
                <label class="">@lang('inputs.active')</label>
                <input type="checkbox" name="active" value="1" class="switchery" @checked($row->active ?? (old('active')))>
            </div>
            <x-validation-error input='active' />
        </div>
        {{-- END active --}}
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
