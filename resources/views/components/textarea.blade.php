<div class="form-group">
    <label for="{{ $field }}">{{ $label }}</label>
    <textarea name="{{ $field }}" id="{{ $field }}" class="form-control ">
        @isset($value) {{ old($field) ? old($field):$value }}
        @else {{ old($field) }}
        @endisset
    </textarea>
    @error($field)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>