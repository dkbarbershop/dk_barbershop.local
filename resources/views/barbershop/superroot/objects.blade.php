<!-- SuperRoot objects -->
@extends('barbershop.layouts.bs')
@section('content')
 <p hidden id="active_menu_item">menu_item_1</p>
<div class="p-1 dk-context-top-div">
	<div class="h-100 dk-div-border">
		@include('barbershop.superroot.object_content')
	</div>
</div>
<div class="text-center dk-context-button-div">
	@include('barbershop.bs_content_buttons')
</div>
<div class="p-1 dk-context-bottom-div">
	<div class="h-100 dk-div-border dk-overflow-auto">
		@include('barbershop.superroot.objects_list')
	</div>	
</div>
@endsection
