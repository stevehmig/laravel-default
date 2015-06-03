<div class="form-group {!! ($errors->has()) ? 'has-error' : '' !!}">
  <label class="col-lg-2 control-label">{!! $model_name::getLabel($key) !!}</label>
  <div class="col-lg-9">
    {!! Form::text($id, null, ['class' => 'form-control', 'placeholder' => $label]) !!}
  </div>
  <div class="col-lg-9 col-lg-offset-2">
  {!! $errors->first($id, '<span class="help-block">:message</span>') !!}
  </div>
</div>