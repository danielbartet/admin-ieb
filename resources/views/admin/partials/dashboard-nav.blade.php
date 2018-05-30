        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle buttonLara -->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  {!! HTML::show_gravatar('','','user-image') !!}
                  <span class="hidden-xs">
                    {!! HTML::show_username() !!}
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    {!! HTML::image(Gravatar::get(Auth::user()->email), Auth::user()->name, array('class' => 'img-circle', 'draggable' => 'false')) !!}
                    <p>
                      {{ (Auth::user()->name === Auth::user()->email) ? ((is_null(Auth::user()->first_name)) ? (Auth::user()->name) : (Auth::user()->first_name)) : (((is_null(Auth::user()->name)) ? (Auth::user()->email) : (Auth::user()->name))) }} - {{ Auth::user()->profile->career_title }}
                      <small>Member since {{ date("M. Y", strtotime(Auth::user()->created_at)) }}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/profile/{{Auth::user()->name}}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>