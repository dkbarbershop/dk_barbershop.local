{{--@extends('barbershop.layouts.bs')--}}
@if ( $user_role == 'SuperRoot' )
	@include('barbershop.superroot.objects')
@endif

