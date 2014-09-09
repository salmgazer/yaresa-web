@extends('mainlayout')
@section('content')


<h1>Create New Community</h1>

{{ Form::open(array('route' => 'community.store', 'class'=>'form-horizontal', 'role'=>'form')) }}
    <ul>
{{--
        <div class="form-group">
            

            {{ Form::label('community_id', 'Community ID:', array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-6">
            {{ Form::text('community_id', '' ,array('class' => 'form-control') ) }}
        	</div>
        </div>
        --}}

        <div class="form-group">
            {{ Form::label('community_name', 'Community Name:', array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-6">
            {{ Form::text('community_name','',array('class' => 'form-control') ) }}
        </div>
        </div>

        <div class="form-group">
            {{ Form::label('subdistrict_id', 'Sub District:', array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-6">            
            {{ Form::select('subdistrict_id', $subdistricts, null, array('class' => 'form-control') ) }}
        </div>
        </div>


        <div class="form-group">
            {{ Form::label('latitude', 'Latitude:', array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-6">
            {{ Form::text('latitude','',array('class' => 'form-control') ) }}
        </div>
        </div>

        <div class="form-group">
            {{ Form::label('longitude', 'Longitude:', array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-6">
            	{{ Form::text('longitude','',array('class' => 'form-control') ) }}
            </div>
        </div>
		<div class="form-group">
            {{ Form::label('population', 'Population Size:', array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-6">
            {{ Form::text('population','',array('class' => 'form-control') ) }}
        </div>
        </div>
		<div class="form-group">
            {{ Form::label('household', 'Number of Households:', array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-6">
            {{ Form::text('household','',array('class' => 'form-control') ) }}
        </div>
        </div>


        <div>
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}            
            {{ link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-default']) }}
        </div>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop