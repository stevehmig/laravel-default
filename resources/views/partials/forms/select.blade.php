<div class="form-group {!! $errors->has($id) ? 'has-error' : '' !!}">
  {!! Form::label($id, $label) !!}
  {!! Form::select($id, $list, null, array('class' => config('classes.formControl'))) !!}
  {!! $errors->first($id, '<span class="help-block">:message</span>') !!}
</div>
