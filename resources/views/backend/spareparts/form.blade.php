
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
    {{-- START code --}}
    <div class="form-group">
        <label class="required">@lang('inputs.code')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="text" class="form-control" name="code" required value="{{ $row->code ?? old('code') }}"  placeholder="@lang('inputs.code')">
        </div>
        <x-validation-error input='code' />
    </div>
    {{-- END code --}}
</div>


<div class="col-md-6">
    {{-- START models --}}
    <div class="form-group">
        <label>الموديل</label>
        <select class="select2 form-control" id="models" name="model_id" data-placeholder="--- إختر الموديل ---" required>
            <option></option>
            @foreach ($models as $id => $name)
                <option value="{{ $id }}" @selected(isset($row) && $row->model_id == $id)>{{ $name }}</option>
            @endforeach
        </select>
        <x-validation-error input='model_id' />
    </div>
    {{-- END models --}}
</div>


<div class="col-md-6">
    {{-- START tax --}}
    <div class="form-group">
        <label class="required">@lang('inputs.tax')</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-pencil"></i> </span>
            </div>
            <input type="number" class="form-control" name="tax" required value="{{ $row->tax ?? old('tax') }}"  placeholder="@lang('inputs.tax')">
        </div>
        <x-validation-error input='tax' />
    </div>
    {{-- END tax --}}
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

<div class="col-md-12">
    <div class="form-group">
        <label class="">@lang('inputs.image')</label>
        <div class="input-group">
            @if (isset($row))
                <div class="input-group-prepend">
                    @include('backend.includes.buttons.input-buttons', ['url' => $row->image, 'not_found' => 'Not Found'])
                </div>
            @endif
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input cursor-pointer form-control" accept="image/*">
                <label class="custom-file-label" for="upload-image"><i class="fa fa-upload"></i> Choose file</label>
            </div>
        </div>
        <x-validation-error input='image' />
    </div>
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
