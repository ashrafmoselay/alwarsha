
@once
    @push('style')
        <style>
            {{-- CSS Style --}}
        </style>
    @endpush
@endonce


<div class='row'>
    <div class="col-md-4">
    {{-- START transaction_date --}}
    <div class="form-group">
        <label class="required">@lang('inputs.transaction_date')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="date" class="form-control" name="transaction_date" required value="{{ $row->transaction_date ?? old('transaction_date') }}"  placeholder="@lang('inputs.transaction_date')">
        </div>
        <x-validation-error input='transaction_date' />
    </div>
    {{-- END transaction_date --}}
    </div>

    <div class="col-md-4">
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


    <div class="col-md-4">
        {{-- START amount --}}
        <div class="form-group">
            <label class="required">@lang('inputs.amount')</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
                </div>
                <input type="number" class="form-control" name="amount" required value="{{ $row->amount ?? old('amount') }}"  placeholder="@lang('inputs.amount')">
            </div>
            <x-validation-error input='amount' />
        </div>
        {{-- END amount --}}
    </div>


<div class="col-md-4">
    <div class="form-group">
        @php
            $list = [
                'income'=>'إيرادات',
                'expense'=>'نفقات'
            ];
        @endphp
        <label>نوع المعاملة</label>
        <select class="form-control" id="type" name="type" data-placeholder="--- إختر نوع المعاملة ---" required>
            <option></option>
            @foreach ($list as $k => $v)
                <option value="{{ $k }}" @selected(isset($row) && $row->type == $k)>{{ $v }}</option>
            @endforeach
        </select>
        <x-validation-error input='type' />
    </div>
</div>

<div class="col-md-4">
    {{-- START shopes --}}
    <div class="form-group">
        <label>@lang('inputs.select-data', ['data' => trans('menu.shopes')])</label>
        <select class="select2 form-control" id="shopes" name="shope_id" data-placeholder="--- @lang('inputs.select-data', ['data' => trans('menu.shopes')]) ---" required>
            <option></option>
            @foreach ($shopes as $id => $name)
                <option value="{{ $id }}" @selected(isset($row) && $row->shope_id == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <x-validation-error input='shope_id' />
    </div>
    {{-- END shopes --}}
</div>


<div class="col-md-4">
    {{-- START groups --}}
    <div class="form-group">
        <label>المجموعه</label>
        <select class="select2 form-control" id="groups" name="group_id" data-placeholder="--- @lang('inputs.select-data', ['data' => trans('menu.groups')]) ---" required>
            <option></option>
            @foreach ($groups as $id => $name)
                <option value="{{ $id }}" @selected(isset($row) && $row->group_id == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <x-validation-error input='group_id' />
    </div>
    {{-- END groups --}}
</div>

<div class="col-md-12">
    {{-- START vat_value --}}
    <div class="form-group">
        <label class="required">@lang('inputs.vat_value')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="vat_value" required value="{{ $row->vat_value ?? old('vat_value') }}"  placeholder="@lang('inputs.vat_value')">
        </div>
        <x-validation-error input='vat_value' />
    </div>
    {{-- END vat_value --}}
</div>

<div class="col-md-12">
    {{-- START comments --}}
    <div class="form-group mb-5">
        <label class=''>@lang('inputs.comments')</label>
        <textarea class="form-control" rows="5" name="comments" placeholder="@lang('inputs.comments')">{{ $row->comments ?? old('comments') }}</textarea>
        <x-validation-error input='comments' />
    </div>
    {{-- END comments --}}
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
