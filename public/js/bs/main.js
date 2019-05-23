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
          label.querySelector( 'span' ).innerHTML = fileName.substring(0,20);
        else
          label.innerHTML = labelVal;
      });
    });
    //*********************************************
    //Отправка данных
    /*$('#input_form').on('submit', function(event){
      submit_data(event);

      event.preventDefault();
      let formData = new FormData(this);
      console.log(formData);
    });*/
/*       $('#input_form').on('submit',
            e => {
                e.preventDefault();
                let formData = new FormData(e.currentTarget);
                console.log(formData);
                console.log(formData);
                $.ajax({
                    url:"{{ route('superroot.upload_file') }}",
                    method: 'post',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success:function(resp_data)
                    {
                      console.log(resp_data);
                    },
                    error:function(){
                      console.log('error');
                    }
                }).done(
                    data => {
                  
                    }
                ).fail(
                    e => {
                    
                    }
                )
            }
        )
*/

    //*********************************************
/*    $('input[type=file]').on('change', function(){
      window.files = this.files;
    });*/
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
  $('#objImage').attr("src",obj.bs_obj.image);
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
          setNewObjectContent();
        break
       }
      }   
    break
    case 'Сохранить':{
      //if (confirm("Сохранить данные?")){    
        switch ($('#page').html()){
          case 'objects':{
            if(saveObject()){
              setButtonsToDefault();
              setDefaultObjectContent();
            }
          }
          break
        } 
      //}
    }
    break
  }
}
//*********************************************
//Функция обработки клика кнопки "Редактировать"
function btnEditClick(){
  switch ($('#btn-edit').html()){
    case 'Отмена':{
      setButtonsToDefault();
      switch ($('#page').html()){
        case 'objects':
          setDefaultObjectContent();
        break
      }       
    }
    break
  }
}
//*********************************************
//Функция обработки клика кнопки "Удалить"
function btnDelClick(){
  alert('btnDelClick');
}
//*********************************************
//Функция обработки клика кнопки "Печать"
function btnPrintClick(){
  var block = document.getElementById("div_list");
  block.scrollTop = block.scrollHeight;
  /*block.scrollTop = 9999;*/
}
//*********************************************
function setButtonsToDefault(){
  $('#btn-new_record').html('Новая запись');
  $('#btn-edit').html('Редактировать');
  $('#btn-print').removeClass('d-none');
  $('#btn-del').removeClass('d-none');
  $('#list').removeClass('disabled_arrea');
}
//*********************************************
function setNewObjectContent(){
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
//Функция сохранения объекта
function saveObject(){ 

 let form = document.forms.input_form,
   formData = new FormData(form);
   formData.append('name',$('#name').val());
   formData.append('name_rus',$('#name_rus').val());
   formData.append('address',$('#address').val());
   formData.append('comment',$('#new_comment').val());

    $.ajax({
      type:'POST',
      url:'/superroot/object',
      data    : formData,
      dataType: 'json',
      processData: false, 
      contentType: false,
      success: function(resp_data){
        console.log(resp_data);
        //saveObjectSuccess(resp_data.id,resp_data.name,resp_data.name_rus,resp_data.address);
        return true;
      },
      error :function(resp_data) {
        console.log(resp_data);
/*        let message = '';
        errors = resp_data.responseJSON.errors;
        Object.keys(errors).forEach(function(key){
          message += errors[key]+'\r\n';
        });
        alert(message);
        return false;*/
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
      setButtonsToDefault();
      setDefaultObjectContent();
      alert('Сохранено');
      //Перемещаем вертикальный ползунок вниз
      var block = document.getElementById('div_list');
      block.scrollTop = block.scrollHeight;
      let c_row = '#row'+row_count;
      //Подсвечиваем активную строку
      $(c_row).children('td').eq(2).trigger('click'); 
}
//**********************************************
function submit_data(event){
  event.preventDefault();
  let formData = new FormData(event.currentTarget);
/*  var form = $("#input_form");
  var u_data = new FormData(form);*/
  console.log(formData);
/* 
  $.ajax({*/
   /*url:"{{ route('ajaxupload.action') }}",*/
/*   url:"{{ route('superroot.object') }}",
   method:"POST",
   data: u_data,
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(resp_data)
   {*/
  /*  console.log(resp_data);*/
 /*   $('#message').css('display', 'block');
    $('#message').html(data.message);
    $('#message').addClass(data.class_name);
    $('#uploaded_image').html(data.uploaded_image);*/
/*   },
    error:function(resp_data){
    message = '';
    errors = resp_data.responseJSON.errors;
    Object.keys(errors).forEach(function(key){
        message += errors[key]+'\r\n';
      });
    alert(message);
   }
  })*/
}
//**********************************************