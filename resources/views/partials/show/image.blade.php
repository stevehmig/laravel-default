
<div id="carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  @foreach($content->images()->lists('name') as $index => $image)
    <li data-target="#carousel" data-slide-to="{!!$index!!}" @if($index == 0) {{ ' class="active"' }} @endif></li>
   @endforeach
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
	@foreach($content->images()->lists('name') as $index => $image)
    <div class="item @if($index == 0) {{ 'active' }} @endif">
      <img class="img-responsive center-block" src="{!! asset('images/'.$image .'_web.jpg')!!}" alt="" />
	   <div class="carousel-caption">
          <h3> </h3>
      </div>
    </div>
	@endforeach
  </div>
 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->
@section('scripts_end')
<script>
 $('.carousel').carousel({
    interval: false
})
</script>
@stop