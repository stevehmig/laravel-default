@extends('app')

@section('content')
  <div class="container">
    @if($errors->has('middleware'))
      <div class="alert alert-danger col-md-10 col-md-offset-1">
        <strong>{!! $errors->first() !!}</strong>
      </div>
    @endif
    @include('defaults.' .explode(".",Route::current()->getName())[1], ['title'=>$title, 'modelname'=>$model_name, 'model'=>$model, 'resource'=>explode(".",Route::current()->getName())[0], 'contents'=>$content, 'checkboxes'=>$checkbox])
  </div>
@stop
