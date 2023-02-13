
@once
    @push('style')
        <style>
            {{-- CSS Style --}}
        </style>
    @endpush
@endonce


<div class='row'>
    <div class="col-md-4">
    {{-- START clients --}}
    <div class="form-group">
        <label>@lang('inputs.select-data', ['data' => trans('menu.the client')])</label>
        <select class="select2 form-control" id="clients" name="client_id" data-placeholder="--- @lang('inputs.select-data', ['data' => trans('menu.the client')]) ---" required>
            <option></option>
            @foreach ($clients as $id => $name)
                <option value="{{ $id }}" @selected(isset($row) && $row->client_id == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <x-validation-error input='client_id' />
    </div>
    {{-- END clients --}}
</div>


<div class="col-md-4">
    {{-- START cities --}}
    <div class="form-group">
        <label>@lang('inputs.select-data', ['data' => 'المدينة'])</label>
        <select class="select2 form-control" id="cities" name="city_id" data-placeholder="--- @lang('inputs.select-data', ['data' => 'المدينة']) ---" required>
            <option></option>
            @foreach ($cities as $id => $name)
                <option value="{{ $id }}" @selected(isset($row) && $row->city_id == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <x-validation-error input='city_id' />
    </div>
    {{-- END cities --}}
</div>


<div class="col-md-4">
    {{-- START models --}}
    <div class="form-group">
        <label>@lang('inputs.select-data', ['data' => 'الموديل'])</label>
        <select class="select2 form-control" id="models" name="model_id" data-placeholder="--- @lang('inputs.select-data', ['data' => 'الموديل']) ---" required>
            <option></option>
            @foreach ($models as $id => $name)
                <option value="{{ $id }}" @selected(isset($row) && $row->model_id == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <x-validation-error input='model_id' />
    </div>
    {{-- END models --}}
</div>


<div class="col-md-4">
    {{-- START plateNo --}}
    <div class="form-group">
        <label class="required">@lang('inputs.plateNo')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="plateNo" required value="{{ $row->plateNo ?? old('plateNo') }}"  placeholder="@lang('inputs.plateNo')">
        </div>
        <x-validation-error input='plateNo' />
    </div>
    {{-- END plateNo --}}
</div>


<div class="col-md-4">
    {{-- START contactNo --}}
    <div class="form-group">
        <label class="">@lang('inputs.contactNo')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="contactNo"  value="{{ $row->contactNo ?? old('contactNo') }}"  placeholder="@lang('inputs.contactNo')">
        </div>
        <x-validation-error input='contactNo' />
    </div>
    {{-- END contactNo --}}
</div>


<div class="col-md-4">
    {{-- START year --}}
    <div class="form-group">
        <label class="">@lang('inputs.year')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="year"  value="{{ $row->year ?? old('year') }}"  placeholder="@lang('inputs.year')">
        </div>
        <x-validation-error input='year' />
    </div>
    {{-- END year --}}
</div>


<div class="col-md-4">
    {{-- START color --}}
    <div class="form-group">
        <label class="">@lang('inputs.color')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="color"  value="{{ $row->color ?? old('color') }}"  placeholder="@lang('inputs.color')">
        </div>
        <x-validation-error input='color' />
    </div>
    {{-- END color --}}
</div>


<div class="col-md-4">
    {{-- START odoMeterKm --}}
    <div class="form-group">
        <label class="required">@lang('inputs.odoMeterKm')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="odoMeterKm" required value="{{ $row->odoMeterKm ?? old('odoMeterKm') }}"  placeholder="@lang('inputs.odoMeterKm')">
        </div>
        <x-validation-error input='odoMeterKm' />
    </div>
    {{-- END odoMeterKm --}}
</div>


<div class="col-md-4">
    {{-- START vin --}}
    <div class="form-group">
        <label class="">@lang('inputs.vin')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="vin"  value="{{ $row->vin ?? old('vin') }}"  placeholder="@lang('inputs.vin')">
        </div>
        <x-validation-error input='vin' />
    </div>
    {{-- END vin --}}
</div>


<div class="col-md-12">
    {{-- START details --}}
    <div class="form-group">
        <label class="">@lang('inputs.details')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="details"  value="{{ $row->details ?? old('details') }}"  placeholder="@lang('inputs.details')">
        </div>
        <x-validation-error input='details' />
    </div>
    {{-- END details --}}
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
