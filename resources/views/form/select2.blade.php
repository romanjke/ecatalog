<div class="form-group{{ $errors->has($field) ? ' has-error' : '' }}">
    {{ Form::label($field, $field_name, ['class' => 'col-md-2 control-label']) }}

    <div class="col-md-10">

        {{ Form::select($field, [], $field_value, array_merge([
            'class' => 'select2 form-control',
            'data-api-url' => $api_url,
            'data-text-field' => $text_field,
            'data-id-field' => $id_field
        ], $attributes)) }}

        @if ($errors->has($field))
            <span class="help-block">
                <strong>{{ $errors->first($field) }}</strong>
            </span>
        @endif
    </div>
</div>