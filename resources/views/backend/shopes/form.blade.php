
@once
    @push('style')
        <style>
            {{-- CSS Style --}}
        </style>
    @endpush
@endonce


<div class='row'>
    <div class="col-md-6">
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


<div class="col-md-6">
    {{-- START contact_person --}}
    <div class="form-group">
        <label class="">@lang('inputs.contact_person')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="contact_person"  value="{{ $row->contact_person ?? old('contact_person') }}"  placeholder="@lang('inputs.contact_person')">
        </div>
        <x-validation-error input='contact_person' />
    </div>
    {{-- END contact_person --}}
</div>


<div class="col-md-6">
    {{-- START contact_no --}}
    <div class="form-group">
        <label class="">@lang('inputs.contact_no')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="contact_no"  value="{{ $row->contact_no ?? old('contact_no') }}"  placeholder="@lang('inputs.contact_no')">
        </div>
        <x-validation-error input='contact_no' />
    </div>
    {{-- END contact_no --}}
</div>


<div class="col-md-6">
    {{-- START email --}}
    <div class="form-group">
        <label class="">@lang('inputs.email')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="email"  value="{{ $row->email ?? old('email') }}"  placeholder="@lang('inputs.email')">
        </div>
        <x-validation-error input='email' />
    </div>
    {{-- END email --}}
</div>


<div class="col-md-6">
    {{-- START license_no --}}
    <div class="form-group">
        <label class="">@lang('inputs.license_no')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="license_no"  value="{{ $row->license_no ?? old('license_no') }}"  placeholder="@lang('inputs.license_no')">
        </div>
        <x-validation-error input='license_no' />
    </div>
    {{-- END license_no --}}
</div>


<div class="col-md-6">
    {{-- START vat_number --}}
    <div class="form-group">
        <label class="">@lang('inputs.vat_number')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="vat_number"  value="{{ $row->vat_number ?? old('vat_number') }}"  placeholder="@lang('inputs.vat_number')">
        </div>
        <x-validation-error input='vat_number' />
    </div>
    {{-- END vat_number --}}
</div>


<div class="col-md-12">
    {{-- START address --}}
    <div class="form-group">
        <label class="">@lang('inputs.address')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="address"  value="{{ $row->address ?? old('address') }}"  placeholder="@lang('inputs.address')">
        </div>
        <x-validation-error input='address' />
    </div>
    {{-- END address --}}
</div>


<div class="col-md-6">
    <div class="form-group">
        <label class="">@lang('inputs.logo')</label>
        <div class="input-group">
            @if (isset($row))
                <div class="input-group-prepend">
                    @include('backend.includes.buttons.input-buttons', ['url' => $row->logo, 'not_found' => 'Not Found'])
                </div>
            @endif
            <div class="custom-file">
                <input type="file" name="logo" class="custom-file-input cursor-pointer form-control" accept="image/*">
                <label class="custom-file-label" for="upload-image"><i class="fa fa-upload"></i> Choose file</label>
            </div>
        </div>
        <x-validation-error input='logo' />
    </div>
</div>


<div class="col-md-6">
    <div class="form-group">
        <label class="">@lang('inputs.seal')</label>
        <div class="input-group">
            @if (isset($row))
                <div class="input-group-prepend">
                    @include('backend.includes.buttons.input-buttons', ['url' => $row->seal, 'not_found' => 'Not Found'])
                </div>
            @endif
            <div class="custom-file">
                <input type="file" name="seal" class="custom-file-input cursor-pointer form-control" accept="image/*">
                <label class="custom-file-label" for="upload-image"><i class="fa fa-upload"></i> Choose file</label>
            </div>
        </div>
        <x-validation-error input='seal' />
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
