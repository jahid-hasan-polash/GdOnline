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
                <!-- create gd -->
                  <li>

                      <a href="{{ URL::route('gd.create') }}">
                          <i class="fa fa-tasks"></i>
                          <span>Create GD</span>
                      </a>
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