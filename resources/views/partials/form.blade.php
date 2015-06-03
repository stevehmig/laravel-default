@if($type == 'select')
	@include('partials.forms.select')
@elseif($type == 'text')
	@include('partials.forms.text')
@elseif($type == 'textarea')
	@include('partials.forms.textarea')
@elseif($type == 'image')
	@include('partials.forms.image')
@elseif($type == 'checkbox')
	@include('partials.forms.checkbox')
  @include('partials.forms.multiselect-js')
@endif