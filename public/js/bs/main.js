

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
  function show_object(obj){
    $('#objImage').attr("src",obj.bs_obj.image);
    $('#objComment').html(obj.bs_obj.comment);
    $('.objNameRus').html(obj.bs_obj.name_rus);
    $('#objId').html(obj.bs_obj.id);
    $('#objName').html(obj.bs_obj.name);
    $('#objAddress').html(obj.bs_obj.address);
    $('#objImagePath').html(obj.bs_obj.image);
    $('#objCreator').html(obj.bs_obj.creator);
    $('#objModifer').html(obj.bs_obj.last_modifer);
    $('#objCreatedAt').html(obj.bs_obj.created_at);
    $('#objUpdatedAt').html(obj.bs_obj.updated_at);
  }


  window.onload = function () { 
    //Инициализация ajax, чтобы корректно обрабатывались csrf-token
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    //Обработка нажатия пункта левого меню 
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

    //Обработа клика по строке таблицы ObjectList 
    var ol = document.getElementById('objects_list');
      if(ol){
      document.querySelector('#objects_list').onclick = function(ev) {
        var id = 'id='+ev.target.parentElement.cells[0].innerHTML;
              $.ajax({
                 type:'POST',
                 url:'/superroot/getobject',
                 data: id,
                 success:function(data) {
                   show_object(data);
                 },
                 error:function(){
                  console.log('error in /superroot/getobject');
                 }
            });
       }
      }
  }

