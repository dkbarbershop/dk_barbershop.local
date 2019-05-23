@extends('barbershop.layouts.bs')
@section('content')
<p hidden id="active_menu_item">menu_item_1</p>
<p hidden id="page">objects</p>
<form method="post" id = "input_form" enctype="multipart/form-data" class="m-0" >
<input name="_token" type="hidden" value="{{ csrf_token() }}">
	<div class="p-1 dk-context-top-div">
		@include ('barbershop.superroot.object_content')
	</div>
	<div class="text-center dk-context-button-div">
		@include ('barbershop.bs_content_buttons') 
	</div>
</form>
<div class="p-1 dk-context-bottom-div">
    <div class="h-100 dk-div-border dk-overflow-auto" id="div_list">
    	@include ('barbershop.superroot.objects_list') 
    </div>
</div>
@endsection