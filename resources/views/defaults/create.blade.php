<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Create New {!! $title !!}</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger col-lg-9 col-lg-offset-2">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
          {!! Form::open(['url' => $resource, 'files'=>true]) !!}
            @include('defaults.form')
						<div class="form-group">
							<div class="col-lg-2 col-lg-offset-2">
								<button type="submit" class="btn btn-primary">Create</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>