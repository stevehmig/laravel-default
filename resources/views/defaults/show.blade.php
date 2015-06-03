@section('content')
<div class="row">
  <div class="col-md-9"> 
    {!! Form::open(array('url'=> $resource . '/' . $content->id, 'method' => 'put','files'=>true)) !!}
    <h2>Edit {!! $title . ': ' . $content->list_description !!}</h2> 
      {!! Form::close() !!}
    
	@foreach($content->getShowData() as $key=>$attribute)
		@if($key != 'image_id')
			{!! $content->getLabel($key) . ': ' . $attribute !!}<br>
		@endif
	@endforeach

		<button class="btn btn-default" 
		        onClick="location.href='{{ URL::to($resource . '/' . $content->id . '/edit') }}'">
		Edit</button>
</div>
</div>
@stop
