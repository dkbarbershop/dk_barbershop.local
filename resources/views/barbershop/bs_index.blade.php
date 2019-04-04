{{--@extends('barbershop.layouts.bs')--}}
@if ( $user_role == 'SuperRoot' )
	@include('barbershop.superroot.objects')
@endif
@if ( $user_role == 'Director' )
	@include('barbershop.director.results')
@endif
@if ( $user_role == 'Administrator' )
	@include('barbershop.administrator.main')
@endif
@if ( $user_role == 'HairDresser' )
	@include('barbershop.hairdresser.main')
@endif
@if ( $user_role == 'User' )
	@include('barbershop.user.main')
@endif

@if ( $user_role == NULL )
	@include('barbershop.layouts.bs')
@endif