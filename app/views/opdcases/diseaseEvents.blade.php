@extends('mainlayout')
@section('content')



<h1>Disease Events</h1>
@if ($notifableDiseases->count() )

@foreach ($notifableDiseases as $nd)
{{ $nd->opd_case_name }}
{{ $nd->SuspectedCases }}

@endforeach

@else
{{ "nothing to print" }}
@endif

@stop