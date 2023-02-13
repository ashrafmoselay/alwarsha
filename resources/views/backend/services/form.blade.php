
@once
    @push('style')
        <style>
            {{-- CSS Style --}}
        </style>
    @endpush
@endonce


<div class='row'>
    <div class="col-md-6">
    {{-- START title --}}
    <div class="form-group">
        <label class="required">@lang('inputs.title')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="title" required value="{{ $row->title ?? old('title') }}"  placeholder="@lang('inputs.title')">
        </div>
        <x-validation-error input='title' />
    </div>
    {{-- END title --}}
    </div>


    <div class="col-md-6">
        {{-- START departments --}}
        <div class="form-group">
            <label>@lang('inputs.select-data', ['data' => trans('menu.department')])</label>
            <select class="select2 form-control" id="departments" name="department_id" data-placeholder="--- @lang('inputs.select-data', ['data' => trans('menu.departments')]) ---" required>
                <option></option>
                @foreach ($departments as $id => $name)
                    <option value="{{ $id }}" @selected(isset($row) && $row->department_id == $id)>{{ $name }}</option>
                @endforeach
            </select>
            <x-validation-error input='department_id' />
        </div>
        {{-- END departments --}}
    </div>

<div class="col-md-12">
    {{-- START description --}}
    <div class="form-group mb-5">
        <label class=''>@lang('inputs.description')</label>
        <textarea class="form-control" rows="5" name="description" placeholder="@lang('inputs.description')">{{ $row->description ?? old('description') }}</textarea>
        <x-validation-error input='description' />
    </div>
    {{-- END description --}}
</div>

<div class="col-md-6">
    {{-- START service_price --}}
    <div class="form-group">
        <label class="required">@lang('inputs.service_price')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="service_price" required value="{{ $row->service_price ?? old('service_price') }}"  placeholder="@lang('inputs.service_price')">
        </div>
        <x-validation-error input='service_price' />
    </div>
    {{-- END service_price --}}
</div>

<div class="col-md-6">
    {{-- START min_price --}}
    <div class="form-group">
        <label class="required">@lang('inputs.min_price')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="min_price" required value="{{ $row->min_price ?? old('min_price') }}"  placeholder="@lang('inputs.min_price')">
        </div>
        <x-validation-error input='min_price' />
    </div>
    {{-- END min_price --}}
</div>

<div class="col-md-6">
    {{-- START durationPeriodValue --}}
    <div class="form-group">
        <label class="required">@lang('inputs.durationPeriodValue')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="durationPeriodValue" required value="{{ $row->durationPeriodValue ?? old('durationPeriodValue') }}"  placeholder="@lang('inputs.durationPeriodValue')">
        </div>
        <x-validation-error input='durationPeriodValue' />
    </div>
    {{-- END durationPeriodValue --}}
</div>


<div class="col-md-6">
    {{-- START durationPeriodType --}}
    <div class="form-group">
        <label class="required">@lang('inputs.durationPeriodType')</label>
        <select class="form-control" name="durationPeriodType" required>
            @php
                $list = ['دقائق','ساعات','أيام','أسبوع','شهر'];
            @endphp
            @foreach ($list as $name)
                <option value="{{ $name }}" @selected(isset($row) && $row->durationPeriodType == $name)>{{ $name }}</option>
            @endforeach
        </select>
        <x-validation-error input='durationPeriodType' />
    </div>
    {{-- END durationPeriodType --}}
</div>


<div class="col-md-6">
    {{-- START warrantyPeriodValue --}}
    <div class="form-group">
        <label class="">@lang('inputs.warrantyPeriodValue')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="warrantyPeriodValue"  value="{{ $row->warrantyPeriodValue ?? old('warrantyPeriodValue') }}"  placeholder="@lang('inputs.warrantyPeriodValue')">
        </div>
        <x-validation-error input='warrantyPeriodValue' />
    </div>
    {{-- END warrantyPeriodValue --}}
</div>


<div class="col-md-6">
    {{-- START warrantyPeriodType --}}
    <div class="form-group">
        <label class="required">@lang('inputs.warrantyPeriodType')</label>
        <select class="form-control" name="warrantyPeriodType" required>
            @php
                $list = ['أيام','أسبوع','شهر','سنة'];
            @endphp
            @foreach ($list as $name)
                <option value="{{ $name }}" @selected(isset($row) && $row->warrantyPeriodType == $name)>{{ $name }}</option>
            @endforeach
        </select>
        <x-validation-error input='warrantyPeriodType' />
    </div>
    {{-- END warrantyPeriodType --}}
</div>


    <div class="col-md-6">
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



    <div class="col-md-6">
        {{-- START allowPriceChangeInTicket --}}
        <div class="form-group">
            <div>
                <label class="">@lang('inputs.allowPriceChangeInTicket')</label>
                <input type="checkbox" name="allowPriceChangeInTicket" value="1" class="switchery" @checked($row->allowPriceChangeInTicket ?? (old('allowPriceChangeInTicket')))>
            </div>
            <x-validation-error input='allowPriceChangeInTicket' />
        </div>
        {{-- END allowPriceChangeInTicket --}}
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
