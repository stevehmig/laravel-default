      	
      <!-- column 2 -->	
      <ul class="list-inline pull-right">
	     <li>Maybe some common controls can go here:</li>
         <li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
         <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a><ul class="dropdown-menu" role="menu"><li><a href="#">1. Is there a way..</a></li><li><a href="#">2. Hello, admin. I would..</a></li><li><a href="#"><strong>All messages</strong></a></li></ul></li>
         <li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
         <li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span> Add Widget</a></li>
      </ul>
      <strong>Page Name</strong>
      
      	<hr>
      
		<div class="row">
         	<div class="col-md-6"> 
				@include('widgets.buttongroup')
				<hr>
			    @include('widgets.tabs')     
				<hr>
				@include('widgets.listgroup')
				<hr>
			</div>
        	<div class="col-md-6">
				@include('widgets.table')
				<hr>
				@include('widgets.panelform')
			</div>
     
        </div><!--/row-->
		<hr>
		@include('widgets.comments')