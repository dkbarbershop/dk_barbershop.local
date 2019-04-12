@extends('barbershop.layouts.bs')
{{--@section('content')--}}
 <!-- <p hidden id="active_menu_item">menu_item_1</p> -->
@if ($error === 'unrole_user')
<h1 class="text-danger">Ваши привилегии не известны</h1>
@endif
{{--@endsection--}}
