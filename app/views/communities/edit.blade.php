@extends('mainlayout')
@section('content')


<h1>Create New Community</h1>
{{-- in the edit mode, pass null as the default value of the field, so that the old value will be set--}}

{{ Form::model($community, array('method' => 'PATCH', 'route' =>array('community.update', $community->community_id), 'class'=>'form-horizontal', 'role'=>'form'  ))  }}
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
            {{ Form::text('community_name',null,array('class' => 'form-control') ) }}
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
            {{ Form::text('latitude',null,array('class' => 'form-control') ) }}
        </div>
        </div>

        <div class="form-group">
            {{ Form::label('longitude', 'Longitude:', array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-6">
            	{{ Form::text('longitude',null,array('class' => 'form-control') ) }}
            </div>
        </div>
		<div class="form-group">
            {{ Form::label('population', 'Population Size:', array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-6">
            {{ Form::text('population',null,array('class' => 'form-control') ) }}
        </div>
        </div>
		<div class="form-group">
            {{ Form::label('household', 'Number of Households:', array('class'=>'col-sm-2 control-label')) }}
            <div class="col-sm-6">
            {{ Form::text('household',null,array('class' => 'form-control') ) }}
        </div>
        </div>


        <div>
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{-- link_to_route('community.show', 'Cancel', $community->community_id, array('class' => 'btn')) --}}
            {{ link_to_route('community.index', 'Cancel', $community->community_id, array('class' => 'btn btn-default')) }}
        </div>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop