
@once
    @push('style')
        <style>
            {{-- CSS Style --}}
        </style>
    @endpush
@endonce


<div class='row'>
    <div class="col-md-6">
    {{-- START spareparts --}}
    <div class="form-group">
        <label>@lang('inputs.select-data', ['data' => trans('menu.spareparts')])</label>
        <select class="select2 form-control" id="spareparts" name="sparepart_id" data-placeholder="--- @lang('inputs.select-data', ['data' => trans('menu.spareparts')]) ---" required>
            <option></option>
            @foreach ($spareparts as $id => $name)
                <option value="{{ $id }}" @selected(isset($row) && $row->sparepart_id == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <x-validation-error input='sparepart_id' />
    </div>
    {{-- END spareparts --}}
</div>


<div class="col-md-6">
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


<div class="col-md-6">
    {{-- START cost --}}
    <div class="form-group">
        <label class="required">@lang('inputs.cost')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="cost" required value="{{ $row->cost ?? old('cost') }}"  placeholder="@lang('inputs.cost')">
        </div>
        <x-validation-error input='cost' />
    </div>
    {{-- END cost --}}
</div>


<div class="col-md-6">
    {{-- START price --}}
    <div class="form-group">
        <label class="required">@lang('inputs.price')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="price" required value="{{ $row->price ?? old('price') }}"  placeholder="@lang('inputs.price')">
        </div>
        <x-validation-error input='price' />
    </div>
    {{-- END price --}}
</div>


<div class="col-md-6">
    {{-- START lowest_price --}}
    <div class="form-group">
        <label class="required">@lang('inputs.lowest_price')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="lowest_price" required value="{{ $row->lowest_price ?? old('lowest_price') }}"  placeholder="@lang('inputs.lowest_price')">
        </div>
        <x-validation-error input='lowest_price' />
    </div>
    {{-- END lowest_price --}}
</div>


<div class="col-md-6">
    {{-- START quantity --}}
    <div class="form-group">
        <label class="required">@lang('inputs.quantity')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="quantity" required value="{{ $row->quantity ?? old('quantity') }}"  placeholder="@lang('inputs.quantity')">
        </div>
        <x-validation-error input='quantity' />
    </div>
    {{-- END quantity --}}
</div>


<div class="col-md-6">
    {{-- START location --}}
    <div class="form-group">
        <label class="">@lang('inputs.location')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="location"  value="{{ $row->location ?? old('location') }}"  placeholder="@lang('inputs.location')">
        </div>
        <x-validation-error input='location' />
    </div>
    {{-- END location --}}
</div>


<div class="col-md-6">
    {{-- START notify_limit --}}
    <div class="form-group">
        <label class="required">@lang('inputs.notify_limit')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="notify_limit" required value="{{ $row->notify_limit ?? old('notify_limit') }}"  placeholder="@lang('inputs.notify_limit')">
        </div>
        <x-validation-error input='notify_limit' />
    </div>
    {{-- END notify_limit --}}
</div>


<div class="col-md-12">
    {{-- START starting_stock --}}
    <div class="form-group">
        <label class="required">@lang('inputs.starting_stock')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="starting_stock" required value="{{ $row->starting_stock ?? old('starting_stock') }}"  placeholder="@lang('inputs.starting_stock')">
        </div>
        <x-validation-error input='starting_stock' />
    </div>
    {{-- END starting_stock --}}
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
