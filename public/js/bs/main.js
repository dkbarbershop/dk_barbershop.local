  let files;
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
    //Обработка нажатия на строку списка 
    if(document.getElementById('list')){   
      document.querySelector('#list').onclick = function(ev) {
        leftMennuClick(ev);
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

    //*********************************************
    //Обработчик клавиши открытия файла
    var inputs = document.querySelectorAll('.inputfile');
    Array.prototype.forEach.call(inputs, function(input){
      var label  = input.nextElementSibling,
          labelVal = label.innerHTML;

      input.addEventListener('change', function(e){
        var fileName = '';
        if( this.files && this.files.length > 1 )
          fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
        else
          fileName = e.target.value.split( '\\' ).pop();

        if( fileName )
          /*label.querySelector( 'span' ).innerHTML = fileName.substring(0,80);*/
          label.querySelector( 'span' ).innerHTML = fileName;
        else
          label.innerHTML = labelVal;
      });
    });
  }
//*********************************************
function on_click_exit_app(){
 event.preventDefault();
    document.getElementById('logout-form').submit();
}
//*********************************************
function on_click_exit(){
  $('#exampleModal').modal('show');
}
//*********************************************
function btn_about_click(){
  $('#about').modal('show');  
}
//*********************************************
//Функция обработки клика на  списке объектов//левом меню
function leftMennuClick(ev){
  var this_id = ev.target.parentElement.cells[0].innerHTML
  var id = 'id='+ this_id;
      $.ajax({
         type:'POST',
         url:'/superroot/getobject',
         data: id,
         success:function(data) {
           show_object(data);
           /*highlight($(this));*/
         },
         error:function(){
          console.log('error in /superroot/getobject');
         }
    });
    //Подсвечиваем активную строку
    $('#list tr').removeClass('active_row');
    $(ev.target.parentElement).addClass('active_row');   
}
//*********************************************
function show_object(obj){
  /*console.log(obj);*/
  $('#objImage').attr("src",obj.bs_obj.image_src);
  $('#сomment').html(obj.bs_obj.comment);
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
//*********************************************
//Функция обработки клика кнопки "Новая запись"
function btnNewRecordClick(){
  /*$('#btn_select_image').html('Обзор 350х150');*/
  switch ($('#btn-new_record').html()){
    case 'Новая запись':{
      setButtons();
      switch ($('#page').html()){
        case 'objects':
          setEmptyEditObjectContent();
        break
       }
      }   
    break
    case 'Сохранить':{
      if (confirm("Сохранить данные?")){    
        switch ($('#page').html()){
          case 'objects':{
            if(saveObject()){
              setButtonsToDefault();
              setDefaultObjectContent();
            }
          }
          break
        } 
      }
    }
    break
  }
}
//*********************************************
//Функция обработки клика кнопки "Редактировать"
function btnEditClick(){
 switch ($('#page').html()){ 
  case 'objects':
      editObject();
    break
  }
}
//*********************************************
//Функция обработки клика кнопки "Удалить"
function btnDelClick(){
  switch ($('#page').html()){
    case 'objects':
      delObject();
    break
  } 
}
//*********************************************
//Функция обработки клика кнопки "Печать"
function btnPrintClick(){
  alert('Нажата кнопка "Печать"');
}
//*********************************************
//Установка кнопок в дефолтное состояние
function setButtonsToDefault(){
  $('#btn-new_record').removeClass('d-none');
  $('#btn-edit').removeClass('d-none');
  $('#btn-del').removeClass('d-none');
  $('#btn-print').removeClass('d-none');

  $('#btn-new_record').html('Новая запись');
  $('#btn-edit').html('Редактировать');
  $('#btn-del').html('Удалить');
  $('#btn-print').html('Печать');

  $('#list').removeClass('disabled_arrea');
}
//*********************************************
function setEmptyEditObjectContent(){
  /*setButtons();*/
  $('.dk-text-info').addClass('d-none');
  $('.dk-input-field').removeClass('d-none');
  $('.dk-input-field').val('');
  $('.dk-td-input').removeClass('px-2');
}
//*********************************************
function setButtons(){
  $('#btn-new_record').html('Сохранить');
  $('#btn-edit').html('Отмена');
  $('#btn-print').addClass('d-none');
  $('#btn-del').addClass('d-none');
  $('#list').addClass('disabled_arrea'); 
  $('#btn_select_image').html('Обзор 350х150');
}
//*********************************************
function setDefaultObjectContent(){
  $('.dk-text-info').removeClass('d-none');
  $('.dk-input-field').addClass('d-none');
  $('.dk-td-input').addClass('px-2'); 
}
//*********************************************
//Функция сохранения нового объекта
function saveObject(){ 
  /*console.log('this is saveObject');*/
 let form = document.forms.input_form,
   formData = new FormData(form);
   formData.append('name',$('#name').val());
   formData.append('name_rus',$('#name_rus').val());
   formData.append('address',$('#address').val());
   formData.append('comment',$('#new_comment').val());

   /*console.log(formData);*/

    $.ajax({
      type:'POST',
      url:'/superroot/object',
      data    : formData,
      dataType: 'json',
      processData: false, 
      contentType: false,
      success: function(resp_data){
        /*console.log(resp_data);*/
        saveObjectSuccess(resp_data.id,resp_data.name,resp_data.name_rus,resp_data.address);
        return true;
      },
      error :function(resp_data) {
        /*console.log(resp_data);*/
        let message = '';
        errors = resp_data.responseJSON.errors;
        Object.keys(errors).forEach(function(key){
          message += errors[key]+'\r\n';
        });
        alert(message);
        return false;
      }
  });
}
//*********************************************
//Функция сохранения отредактированного объекта
function saveEditedObject(){ 
 let form = document.forms.input_form,
      obj_id = $('#objId').html(),
     formData = new FormData(form);
     formData.append('name',$('#name').val());
     formData.append('name_rus',$('#name_rus').val());
     formData.append('address',$('#address').val());
     formData.append('comment',$('#new_comment').val());
     formData.append('_method','PUT');//Это важно!!! Сюда добавляем 'PUT' а в
     //ajx запросе поле type ставим 'POST'
 
    $.ajax({
      type:'POST',
      url:'/superroot/object/'+obj_id,
      data    : formData,
      dataType: 'json',
      processData: false, 
      contentType: false,
      success: function(resp_data){
        /*console.log(resp_data);*/
        editObjectSuccess(resp_data);
        return true;
      },
      error :function(resp_data) {
        console.log(resp_data);
        let message = '';
        errors = resp_data.responseJSON.errors;
        Object.keys(errors).forEach(function(key){
          message += errors[key]+'\r\n';
        });
        alert(message);
        return false;
      }
  });
}
//*********************************************
function saveObjectSuccess(id,name,name_rus,address){
     let table = document.getElementById('list');
     let row_count = table.rows.length;
     $('#list tbody').append(
      '<tr id="row'+row_count+'">'+
      '<td class="d-none">'+id+'</td>'+
      '<td>'+row_count+'</td>'+
      '<td>'+name+'</td>'+
      '<td>'+name_rus+'</td>'+
      '<td>'+address+'</td>'+
      '</tr>'
      );

      //Перемещаем вертикальный ползунок вниз
      var block = document.getElementById('div_list');
      block.scrollTop = block.scrollHeight;
      let c_row = '#row'+row_count;
      //Подсвечиваем активную строку
      $(c_row).children('td').eq(2).trigger('click'); 

      setButtonsToDefault();
      setDefaultObjectContent();
      $("#file").val("");
      alert('Сохранено');
}
//**********************************************
function delObject(){
   switch ($('#btn-del').html()){
    case 'Удалить':{
      deleteObject();
    }
    break
    case 'Отмена':{
      setButtonsToDefault();
      setDefaultObjectContent();
    }
    break
   }
}
//**********************************************
//Редактирование объекта
function editObject(){
  switch ($('#btn-edit').html()){
    case 'Редактировать':{
      setContentToObjEdit();
    }
    break
    case 'Отмена':{
      setButtonsToDefault();
      setDefaultObjectContent();    
    }
    break
    case 'Сохранить':{
       if (confirm("Сохранить отредактированные данные?")){
          if(saveEditedObject()){
            setButtonsToDefault();
            setDefaultObjectContent();
          }
        }   
    }
    break
  }
}
//**********************************************
//Установка состояния кнопок при нажатии на кнопку с надписью 
//"Редактировать"[объект] 
function setContentToObjEdit(){
  //Установка кнопок
  $('#btn-new_record').addClass('d-none');
  $('#btn-print').addClass('d-none');
  $('#btn-edit').html('Сохранить');
  $('#btn-del').html('Отмена');
  $('#list').addClass('disabled_arrea');

  //Установка контента
  setEmptyEditObjectContent();
  loadDataToObjectContent();
}
//**********************************************
//Непосредственное удаление объекта
function deleteObject(){
  if(confirm('Удалить объект?\n'+$('.objNameRus').html()+' ['+$('#objName').html()+']')){
  let obj_id    = $('#objId').html(),
      obj_name  = 'name='+$('#objName').html();
    $.ajax({
      type:'DELETE',
      url:'/superroot/object/'+obj_id,
      data: obj_name,
      success: function(){
        //Удаляем текущую строку из таблицы списка
        var active_row_id = $('.active_row').attr('id');
        $('#'+active_row_id).remove();
        alert('Запись успешно удалена');
        //Если вдруг захочется подсветить следующую/предидущую строки ...
        //var x = active_row_id.substring(active_row_id.length-1,active_row_id.length);
      },
      error :function() {
        alert('Ошибка при удалении записи\nfunction delObject()');
      }
    });
  }
}
//**********************************************
//Загрузка данных  в контент редактирования объекта
function loadDataToObjectContent(){
  $('.dk-text-info-edit').removeClass('d-none');
  $('#name').val($('#objName').html());
  $('#name_rus').val($('.objNameRus').html());
  $('#address').val($('#objAddress').html());
  /*$('#new_comment').val($('#comment').html());*/
  $('#new_comment').val($('#сomment').val());
}
//**********************************************
function editObjectSuccess(resp_data){
  setButtonsToDefault();
  setDefaultObjectContent();
  loadEditDataToObjectContent(resp_data);
  $("#file").val("");
  alert('Сохранено');
}
//**********************************************
function loadEditDataToObjectContent(resp_data) {
  let active_row_id = $('.active_row').attr('id');
  $('#'+active_row_id+' :nth-child(3)').html(resp_data['name_rus']);
  $('#'+active_row_id+' :nth-child(4)').html(resp_data['name']);
  $('#'+active_row_id+' :nth-child(5)').html(resp_data['address']);
  $('#'+active_row_id).children('td').eq(2).trigger('click'); 
}

