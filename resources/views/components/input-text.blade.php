@props(['id', 'lable', 'name'])
<div class="mb-3">
    <label class="form-label" for="{{ $id ?? 'input-text' }}">{{ $lable ?? 'input-lable' }}</label>
    <input type="text" class="form-control @error('{{ $name }}') invalid-feedback @enderror"
        name="{{ $name ?? 'input-name' }}" id="{{ $id ?? 'input-text' }}" {{ $attributes }}>
    <div class="invalid-feedback">
        error
    </div>
</div>
