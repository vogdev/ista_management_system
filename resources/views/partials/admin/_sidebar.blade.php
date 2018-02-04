<div class="side-menu">
  <aside class="menu">
    <ul class="menu-list">
      <li><a href="{{ route('admin.dashbaord')}}" class="{{ Request::is('admin') ? 'active-a' : '' }}"><span class="icon"><i class="fa fa-sliders"></i></span>  Dashboard</a></li>
      <li><a href="{{ route('admin.classrooms.index')}}"  class="{{ Request::is('admin/classrooms*') ? 'active-a' : '' }}"><span class="icon"><i class="fa fa-building"></i></span>  Filières</a></li>
      <li><a href="{{ route('admin.users.index')}}"  class="{{ Request::is('admin/users*') ? 'active-a' : '' }}"><span class="icon"><i class="fa fa-graduation-cap"></i></span>  Formateurs et Formatrices</a></li>
      <li><a href="{{route('admin.students.index')}}"  class="{{ Request::is('admin/students*') ? 'active-a' : '' }}"><span class="icon"><i class="fa fa-users"></i></span> Stagiaires</a></li>
    </ul>
  </aside>
</div>