<div class='row'>
    <div class="col-md-7">
        @php
            $typeList = ['شركة','حكومة','فرد'];
        @endphp
        <div class="form-group">
            <label class="control-label required">تصنيف العميل</label><br>
            <div class="controls">
                <select class="form-control select2" data-placeholder="تصنيف العميل" name="type" required>
                @foreach ($typeList as $type)
                    <option value="{{ $type }}" @selected(isset($row) && $type == $row->type)> {{ $type }} </option>
                @endforeach
                </select>
            </div>
            <x-validation-error input='type' />
        </div>

        {{-- START email --}}
        <div class="form-group">
            <label>@lang('inputs.email')</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input type="text" class="form-control" name="email" value="{{ $row->email ?? old('email') }}"  placeholder="@lang('inputs.email')">
            </div>
            <x-validation-error input='email' />
        </div>
        {{-- END email --}}

        {{-- START username --}}
        <div class="form-group">
            <label class="required">@lang('inputs.clientname')</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa-solid fa-user-secret"></i> </span>
                </div>
                <input type="text" class="form-control" name="username" required value="{{ $row->username ?? old('username') }}"  placeholder="@lang('inputs.clientname')">
            </div>
            <x-validation-error input='username' />
        </div>
        {{-- END username --}}

        {{-- START phone --}}
        <div class="form-group">
            <label class="required">@lang('inputs.phone')</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa-solid fa-phone-volume"></i> </span>
                </div>
                <input type="text" class="form-control" name="phone"  value="{{ $row->phone ?? old('phone') }}"  placeholder="@lang('inputs.phone')">
            </div>
            <x-validation-error input='phone' />
        </div>
        {{-- END phone --}}

        {{-- START contact_name --}}
        <div class="form-group">
            <label class="required">اسم المسؤول</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa-solid fa-phone-volume"></i> </span>
                </div>
                <input type="text" class="form-control" name="contact_name"  value="{{ $row->contact_name ?? old('contact_name') }}"  placeholder="اسم المسؤول">
            </div>
            <x-validation-error input='contact_name' />
        </div>
        {{-- END phone --}}

    </div>

    <div class="col-md-5">
        @include('backend.includes.forms.input-file', ['image' => isset($row) && $row->image ? url($row->image) : null, 'alt' => $row->name ?? null])
    </div>
</div>


@once
    @push('script')
        <script type="text/javascript" src="{{ assetHelper('customs/js/show-password.js') }}"></script>
    @endpush
@endonce
