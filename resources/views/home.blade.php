@extends('app')

@section('content')
<div class="container">
    @if($errors->has('middleware'))
      <div class="alert alert-danger col-md-10 col-md-offset-1">
        <strong>{!! $errors->first() !!}</strong>
      </div>
    @endif
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
