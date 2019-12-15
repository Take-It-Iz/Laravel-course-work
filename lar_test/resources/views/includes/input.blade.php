<label for="{{ $fieldId }}">{{ $labelText }}</label>
<input type="text" value="{{ old($fieldId) }}" class="form-control
    {{ $errors->has($fieldId) ? 'is-invalid':'' }}"
    name="{{ $fieldId }}" id="{{ $fieldId }}" placeholder="{{ $placeHolderText }}"
    @isset($fieldValue)
        value="{{ old($fieldId) ? old($fieldId) : $fieldValue }}"
    @else
        value="{{ old($fieldId) }}"
    @endisset
    >
@include('includes/validationErr', ['errFieldName' => $fieldId])