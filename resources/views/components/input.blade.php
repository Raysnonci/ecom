<div class="form-group"> 
    <label for="{{ $field }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $field }}" class="form-control " id="{{ $id?? $field }}" aria-describedby="" placeholder="{{ $placeholder ?? '' }}"
    @isset($value) value="{{ old($field)? old($field):$value }}"
    @else value="{{ old($field) }}"
    @endisset
    >
    @error($field)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
