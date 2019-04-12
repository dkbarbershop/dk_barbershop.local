@extends('barbershop.layouts.bs')
<p hidden id="active_menu_item">menu_item_1</p>
@section('content')
<div class="p-1 dk-context-top-div">
	@include ('barbershop.superroot.object_content')
</div>
<div class="text-center dk-context-button-div">
	@include ('barbershop.bs_content_buttons') 
</div> 
<div class="p-1 dk-context-bottom-div" >
    <div class="h-100 dk-div-border dk-overflow-auto">
    	@include ('barbershop.superroot.objects_list') 
    </div>
</div>
@endsection