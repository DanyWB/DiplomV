  <!-- ***** Header Area Start ***** -->

  <div class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="{{ route('home.index') }}" class="logo">
                          <img src="{{ asset('assets/images/logo.png') }}" alt="">
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Search End ***** -->
                      <div class="search-input">
                          <form id="search" action="#">
                              <input type="text" placeholder="Поиск.." id='searchText' name="searchKeyword"
                                  onkeypress="handle" />
                              <i class="fa fa-search"></i>
                          </form>
                      </div>
                      <!-- ***** Search End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="{{ route('home.index') }}"
                                  class="{{ str_contains(Route::currentRouteName(), 'home.index') ? 'active' : '' }}">Главная</a>
                          </li>
                          <li><a href="{{ route('forum.index') }}"
                                  class="{{ str_contains(Route::currentRouteName(), 'forum') ? 'active' : '' }}">Форум</a>
                          </li>
                          <li><a href="{{ route('article.index') }}"
                                  class="{{ str_contains(Route::currentRouteName(), 'news') ? 'active' : '' }}">Новости</a>
                          </li>
                          <li><a href="{{ route('guid.index') }}"
                                  class="{{ str_contains(Route::currentRouteName(), 'guids') ? 'active' : '' }}">Руководства</a>
                          </li>
                          <li><a href="{{ route('profile.edit') }}"
                                  class="{{ str_contains(Route::currentRouteName(), 'profile') ? 'active' : '' }}">Профиль
                                  <img src="{{ asset('assets/images/profile-header.jpg') }}" alt=""></a></li>
                      </ul>
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </div>
