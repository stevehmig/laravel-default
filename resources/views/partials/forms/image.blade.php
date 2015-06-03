		<div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
		  {!! Form::label('image','Add New Image: ')!!}
		  {!! Form::file('image') !!}
		  {!! $errors->first('image', '<span class="help-block">:message</span>') !!}
		</div>
		
		<div class="form-group {!! $errors->has('deleteimages') ? 'has-error' : '' !!}">
			@if (isset($contents))
					{!! Form::label('deleteimages[]','Current Images:')!!}
					<br>
					@foreach ($contents->images as $image)
						 <img src="{!! asset('images/'.$image->name.'_thumb.jpg')!!}" alt="" />
						 <input type="checkbox" name="deleteimages[]" value="{!!$image->id!!}"> Delete
						 <br><br>
					@endforeach
			@endif
		</div>