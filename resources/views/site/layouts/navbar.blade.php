<header class="u-clearfix u-header u-header" id="sec-648d">
  <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <a href="/" class="u-image u-logo u-image-1">
          <img src="{{ asset('/public/images/logos/indexa-logo.png') }}" class="u-logo-image u-logo-image-1">
      </a>
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;" wfd-invisible="true">
              <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                  href="#">
                  <svg>
                      <use xlink:href="#menu-hamburger"></use>
                  </svg>
                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink">
                      <defs>
                          <symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;">
                              <rect y="1" width="16" height="2"></rect>
                              <rect y="7" width="16" height="2"></rect>
                              <rect y="13" width="16" height="2"></rect>
                          </symbol>
                      </defs>
                  </svg>
              </a>
          </div>
          <div class="u-nav-container" wfd-invisible="true">
              <ul class="u-nav u-unstyled u-nav-1">
                    @auth
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{{ url('/user/dashboard') }}" style="padding: 10px 20px;">{{auth()->user()->name}}</a>
                        </li>
                    @endauth
                    @guest
                        <li class="u-nav-item">
                            <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{{ url('/user/login') }}" style="padding: 10px 20px;">Iniciar Sesión</a>
                        </li>
                    @endguest
              </ul>
          </div>
          <div class="u-nav-container-collapse" wfd-invisible="true">
              <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                  <div class="u-sidenav-overflow">
                      <div class="u-menu-close"></div>
                      <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                            @auth
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{{ url('/user/dashboard') }}" style="padding: 10px 20px;">{{auth()->user()->name}}</a>
                                </li>
                            @endauth
                            @guest
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="{{ url('user/login') }}" style="padding: 10px 20px;">Iniciar Sesión</a>
                                </li>
                            @endguest
                      </ul>
                  </div>
              </div>
              <div class="u-black u-menu-overlay u-opacity u-opacity-70" wfd-invisible="true"></div>
          </div>
      </nav>
  </div>
</header>