<ul class="nav nav-tabs nav-pills flex-column pt-2 pl-0 dk-left-nv"  id="dk-left-menu" role="tablist">
      @if ( $user_role == 'SuperRoot')
       @include ('barbershop.superroot.left_menu') 
      @endif
      @if ( $user_role == 'Director')
       @include ('barbershop.director.left_menu') 
      @endif
      @if ( $user_role == 'Administrator')
       @include ('barbershop.administrator.left_menu') 
      @endif
      @if ( $user_role == 'HairDresser')
       @include ('barbershop.hairdresser.left_menu') 
      @endif
      @if ( $user_role == 'User')
       @include ('barbershop.user.left_menu') 
      @endif
    <li class="nav-item">
        <a class="nav-link" href="#myModal"  data-toggle="tab" onclick="on_click_exit()" data-target="#exampleModal"  aria-controls="messages" aria-selected="false" id="menu_item_exit">Выход</a>
    </li>
</ul>
@include ('barbershop.layouts.exit_window')                  