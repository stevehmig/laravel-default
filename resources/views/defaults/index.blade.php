<strong>{{$title}}</strong><hr>

<div class="row">
  <div class="col-md-9"> 
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<th>Name</th>
			</thead>
			<tbody>
			@foreach ($contents as $content)
				<tr>
					<td><a href="{{$resource}}/{{ $content->id }}">{{ $content->list_description }}</a></td>
				</tr>	
			@endforeach
			</tbody>
		</table> 
	</div>
	 <button class="btn btn-primary" onClick="location.href='{{ URL::to($resource . '/create') }}'">New</button>
  </div>
</div> 
