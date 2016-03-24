<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

                <!-- dashboard -->

                  <li>

                      <a href="{{ URL::route('admin.dashboard') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                <!-- create gd -->
                  <li>

                      <a href="{{ URL::route('admin.gdShow') }}">
                          <i class="fa fa-tasks"></i>
                          <span>Watch Your GD</span>
                      </a>
                  </li>

                  {{-- Create Officer --}}
                  <li>

                      <a href="{{ URL::route('admin.createOfficer') }}">
                          <i class="fa fa-plus"></i>
                          <span>Create Officer</span>
                      </a>
                  </li>


                  









              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>