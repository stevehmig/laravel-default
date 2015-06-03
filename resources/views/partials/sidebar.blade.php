	
      <!-- Left column -->
      <a href="#"><strong>Menu</strong></a>  
      
      <hr>

      <ul class="list-unstyled">
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#adminMenu">
          <h5>Admin <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="adminMenu">
			    <li><a href="{{ URL::to('users') }}"><i class="glyphicon glyphicon-user"></i> Users</a></li>
                <li><a href="{{ URL::to('projects') }}"><i class="glyphicon glyphicon-home"></i>Projects</a></li>
				<li><a href="{{ URL::to('shapefiles') }}"><i class="glyphicon glyphicon-paperclip"></i>Shapefiles</a></li>
				<li><a href="{{ URL::to('roles') }}"><i class="glyphicon glyphicon-record"></i>Roles</a></li>
                <li><a href="{{ URL::to('codetypes') }}"><i class="glyphicon glyphicon-cog"></i> Reference Codes</a></li>
                <li><a href="{{ URL::to('checks') }}"><i class="glyphicon glyphicon-th-list"></i> Survey Forms</a></li>
            </ul>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#surveyMenu">
          <h5>Surveyors <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="surveyMenu">
			    <li><a href="{{ URL::to('locations') }}"><i class="glyphicon glyphicon-tower"></i> Locations</a></li>
				<li><a href="{{ URL::to('features') }}"><i class="glyphicon glyphicon-th-list"></i> Survey</a></li>
            </ul>
        </li>
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#clientMenu">
          <h5>Reports <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="clientMenu">
				<li><a href="#"><i class="glyphicon glyphicon-file"></i> Reports </a></li>
                <li class="active"> <a href="#"><i class="glyphicon glyphicon-exclamation-sign"></i> Priorities </a></li>
                <li><a href="#"><i class="glyphicon glyphicon-usd"></i> Costs </a></li>
            </ul>
        </li>
	</ul>
