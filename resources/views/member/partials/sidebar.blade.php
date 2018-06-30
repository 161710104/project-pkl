<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
          <p class="app-sidebar__user-designation">Admin Cars-dream</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="{{ route('mobil.index') }}"><i class="app-menu__icon fa fa-car"></i><span class="app-menu__label">Mobil</span></a></li>
        <li><a class="app-menu__item" href="{{ route('detail_mobil.index') }}"><i class="app-menu__icon fa fa-automobile"></i><span class="app-menu__label"> Detail Mobil</span></a></li>
        <li><a class="app-menu__item" href="{{ route('beritas.index') }}"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label"> Berita</span></a></li>
      </ul>
    </aside>
    