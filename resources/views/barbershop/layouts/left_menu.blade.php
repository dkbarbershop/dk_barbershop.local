<!-- layouts.left-menu -->
<ul class="nav nav-tabs nav-pills flex-column pt-2 pl-0 dk-left-nv"  id="dk-left-menu" role="tablist">
  @if ( $user_role == 'SuperRoot')
   @include ('barbershop.superroot.left_menu') 
  @endif
  <li class="nav-item">
    <a class="nav-link" href="#myModal"  data-toggle="tab" onclick="on_click_exit()" data-target="#exampleModal"  aria-controls="messages" aria-selected="false" id="menu_item_exit">Выход</a>
  </li>
</ul>

<!-- <nav class=" nav-pills">
<ul class="nav nav-tabs flex-column" id="dk-left-menu">
  <li class="nav-item">
    <a class="nav-link active" href="{{ url('/') }}" role="tab" aria-controls="pills-home" aria-selected="true">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/superroot/object') }}" role="tab" aria-controls="pills-home" aria-selected="true">Пункт2</a>
  </li> 
   <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Disabled</a>
  </li>
</ul>
</nav> -->

@include ('barbershop.layouts.exit_window')  
