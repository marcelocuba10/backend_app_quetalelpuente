  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper style-2">
    <div class="navbar-logo">
      <a href="{{ url('/') }}">
        <img src="{{ asset('public/images/logos/logo-brown.png') }}" alt="logo" style="width: 180px;"/>
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="nav-item {{ (request()->is('user/dashboard')) ? 'active' : '' }}">
          <a href="{{ url('/user/dashboard') }}">
            <span class="icon">
              <svg width="22" height="22" viewBox="0 0 22 22">
                <path d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
              </svg>
            </span>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item {{ (request()->is('user/webcams')) ? 'active' : '' }}">
          <a href="{{ url('/user/webcams') }}">
            <span class="icon">
              <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,23A1,1 0 0,1 11,22V19H7A2,2 0 0,1 5,17V7C5,5.89 5.9,5 7,5H21A2,2 0 0,1 23,7V17A2,2 0 0,1 21,19H16.9L13.2,22.71C13,22.9 12.75,23 12.5,23V23H12M13,17V20.08L16.08,17H21V7H7V17H13M3,15H1V3A2,2 0 0,1 3,1H19V3H3V15Z" />
              </svg>
            </span>
            <span class="text">Webcams</span>
          </a>
        </li>
        <li class="nav-item nav-item-has-children">
          <a aria-expanded="false" class="collapsed" id="ddlink_2" href="#" onclick="toggle('ddmenu_2', 'ddlink_2')">
            <span class="icon">
              <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" />
              </svg>
            </span>
            <span class="text">Ajustes</span>
          </a>
          <ul id="ddmenu_2" class="dropdown-nav" style="{{ (request()->is('user/users')) || (request()->is('user/users/*')) || (request()->is('user/ACL/*')) || (request()->is('user/parameters')) || (request()->is('user/parameters/*')) ? '' : 'display:none'}}">
            <li>
              <a href="{{ url('/user/users') }}" class="{{ (request()->is('user/users')) || (request()->is('user/users/*')) ? 'active' : '' }}">
                <span class="text">Administradores</span>
              </a>
            </li>
            @can('role-list','permission-list')
            <li>
              <a aria-expanded="false" class="collapsed" id="ddlink_3" href="#" onclick="toggle('ddmenu_3', 'ddlink_3')">
                <span class="text">ACL</span>
              </a>
              <ul id="ddmenu_3" class="dropdown-nav" style="{{ (request()->is('user/ACL/*')) ? '' : 'display:none' }}">
                @can('role-list')
                <li>
                  <a href="{{ url('/user/ACL/roles') }}" class="{{ (request()->is('user/ACL/roles')) || (request()->is('user/ACL/roles/*')) ? 'active' : '' }}"><span class="text">Roles</span></a>
                </li>
                @endcan
                @can('permission-list')
                <li>
                  <a href="{{ url('/user/ACL/permissions') }}" class="{{ (request()->is('admuserin/ACL/permissions')) || (request()->is('user/ACL/permissions/*')) ? 'active' : '' }}"><span class="text">Permisos</span></a>
                </li>
                @endcan
              </ul>
            </li>
            @endcan
          </ul>
        </li>
      </ul>
    </nav>
  </aside>
  <div class="overlay"></div>  

  <script type="text/javascript">
    function toggle(ddmenu_1, ddlink_1) {
      var n = document.getElementById(ddmenu_1);
      if (n.style.display != 'none'){
        n.style.display = 'none';
        document.getElementById(ddlink_1).setAttribute('aria-expanded', 'false');
      }else{
        n.style.display = '';
        document.getElementById(ddlink_1).setAttribute('aria-expanded', 'true');
      }
    }
    function toggle(ddmenu_3, ddlink_3) {
      var n = document.getElementById(ddmenu_3);
      if (n.style.display != 'none'){
        n.style.display = 'none';
        document.getElementById(ddlink_3).setAttribute('aria-expanded', 'false');
      }else{
        n.style.display = '';
        document.getElementById(ddlink_3).setAttribute('aria-expanded', 'true');
      }
    }
  </script>