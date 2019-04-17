

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
    var ol = document.getElementById('list');
      if(ol){
      document.querySelector('#list').onclick = function(ev) {
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
      //Обработка клика кнопки "Новая запись" 
      document.querySelector('#btn-new_record').onclick = function(ev) {
        btnNewRecordClick();
      }
      //Обработка клика кнопки "Редактировать" 
      document.querySelector('#btn-edit').onclick = function(ev) {
        btnEditClick();
      }
      //Обработка клика кнопки "Удалить" 
      document.querySelector('#btn-del').onclick = function(ev) {
        btnDelClick();
      }
      //Обработка клика кнопки "Печать" 
      document.querySelector('#btn-print').onclick = function(ev) {
        btnPrintClick();
      }
  }
//Функция обработки клика кнопки "Новая запись"
function btnNewRecordClick(){
  switch ($('#btn-new_record').html()){
    case 'Новая запись':
      switch ($('#page').html()){
        case 'objects':
          setNewObjectContent();
        break
      }   
    break
    case 'Сохранить':
      setButtonsToDefault();
    break
  }
}
//Функция обработки клика кнопки "Редактировать"
function btnEditClick(){
  switch ($('#btn-edit').html()){
    case 'Отмена':
      setButtonsToDefault();
    break
  }
}
//Функция обработки клика кнопки "Удалить"
function btnDelClick(){
  alert('btnDelClick');
}
//Функция обработки клика кнопки "Печать"
function btnPrintClick(){
  alert('btnPrintClick');
}
function setButtonsToDefault(){
  $('#btn-new_record').html('Новая запись');
  $('#btn-edit').html('Редактировать');
  $('#btn-print').removeClass('d-none');
  $('#btn-del').removeClass('d-none');
  $('#list').removeClass('disabled_arrea');
}
function setNewObjectContent(){
  $('#btn-new_record').html('Сохранить');
  $('#btn-edit').html('Отмена');
  $('#btn-print').addClass('d-none');
  $('#btn-del').addClass('d-none');
  $('#list').addClass('disabled_arrea');  
}