<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                <!-- dashboard -->

                  <li>

                      <a href="{{ URL::route('dashboard') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  {{-- Common App --}}
                  <li {{ (Request::is('commonapp*')  ? ' class="sub-menu"' : '') }}class="sub-menu">

                      <a href="#">
                          <i class="fa fa-tasks"></i>
                          <span>Common app</span>
                      </a>
                      <ul class="sub">

        <!-- sub menu for episode -->
                        


                        <li {{ (Request::is('commonapp/app*')  ? ' class="sub-menu"' : '') }}>
                            <a href="javascript:;">
                              <span>App Name</span>
                            </a>
                            <ul class="sub">
                              <li {{ (Request::is('commonapp/app/index') ? ' class="active open"' : '') }}><a href="{{ route('commonapp.app.index') }}">App List</a></li>                            
                              <li {{ (Request::is('commomapp/app/create') ? ' class="active open"' : '') }}><a href="{{ route('commonapp.app.create') }}">Create app</a></li>
                            </ul>
                        </li>
        <!-- end of sub menu for episode -->
                        
        <!-- sub menu for episode -->
                        <li class="sub-menu">
                            <a href="javascript:;">
                              <span>Year</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{ route('commonapp.year.index') }}">Year List</a></li>
                              <li><a href="{{ route('commonapp.year.create') }}">Add Year</a></li>
                            </ul>
                        </li>
        <!-- end of sub menu for episode -->

        <!-- sub menu for episode -->
                        <li class="sub-menu">
                            <a href="javascript:;">
                              <span>Episode</span>
                            </a>
                            <ul class="sub">
                              <li><a href="{{ route('commonapp.episode.index') }}">Episode list</a></li>
                              <li><a href="{{ route('commonapp.episode.create') }}">Add Episode</a></li> 
                            </ul>
                        </li>
        <!-- end of sub menu for episode -->
                      </ul>
                  </li>
                

        <!-- GCM index -->

                  <li>
                        
                          <a href="{{ route('commonapp.gcm.index') }}"><i class="fa fa-truck"> GCM CODE</i></a> 
                         
                  </li>

                  {{-- Roles & Permissions --}}
                  <li>

                      <a href="#">
                          <i class="fa fa-gears"></i>
                          <span>Roles & Permissions</span>
                      </a>
                  </li>


                  









              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>