  function on_click_exit_app(){
   event.preventDefault();
      document.getElementById('logout-form').submit();
  }
  function on_click_exit(){
   	$('#exampleModal').modal('show');
  }
  function btn_about_click(){
  	$('#about').modal('show');	
  }
  window.onload = function () { 
     /*var bs_ul = document.getElementById('dk-left-menu');*/
     var  left_menu_items = document.getElementsByClassName('dk-menu-item'),
          active_item_name= document.getElementById('active_menu_item'),
          ai;

      
    if (! active_item_name){
      ai = document.getElementById('menu_item_exit');
    }else{
      ai = document.getElementById(active_item_name.innerHTML);
    }  

     for (i = 0; i < left_menu_items.length; i++) { 
      left_menu_items[i].classList.remove("active");
    }

    ai.classList.add("active");
  }
