@extends('mainlayout')
@section('content')

@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
        {{Session::get('message')}}
    </p>
@endif


<h1>Community</h1>

<p>{{ link_to_route('community.create', 'Add new Community') }}</p>

<div class="col-sm-8 ">
    <div class= "table-responsive">
        <table class="table table-bordered table-condensed">
            <tbody>
                <tr>
                    <td bgcolor="#d9edf7"><b>ID</b></td> <td>{{ $community->community_id }}</td>
                </tr>
                <tr>
                    <td bgcolor="#d9edf7"><b>Community Name</b></td>  <td>{{ $community->community_name }}</td>
                    </tr>
                <tr>
                    <td bgcolor="#d9edf7"><b>Subdistrict</b></td>  <td>{{ $community->subdistrict->subdistrict }}</td>
                    </tr>
                <tr>
                    <td bgcolor="#d9edf7" ><b>Population</b></td>   <td>{{ $community->population }}</td>   
                    </tr>
                <tr>
                    <td bgcolor="#d9edf7"><b>Longitude</b></td>  <td>{{ $community->longitude }}</td>   
                    </tr>
                <tr>
                    <td bgcolor="#d9edf7"><b>Latitude</b></td>        <td>{{ $community->latitude }}</td>   
                    </tr>
                <tr>
                    <td bgcolor="#d9edf7"><b>No Of Households</b></td>        <td>{{ $community->household }}</td>   
                    </tr>
                            
            </tbody>

          
        </table>
        
    </div>
</div>
<div class="row">
    <div class="col-sm-6">        
    <p>

        {{-- link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-default']) --}}

        {{ Form::open(array('method' => 'DELETE', 
                            'route' => array('community.destroy', $community->community_id))) }}  
        {{link_to_route('community.edit', 'Edit',
                            array($community->community_id), array('class' => 'btn btn-info ')) }}
        {{ link_to_route('community.index', 'Show All', $community->community_id, array('class' => 'btn btn-default')) }} 
        
        {{ Form::submit('Delete', array('class'=> 'btn btn-danger '))  }}        
        {{-- Form::button('<i class="glyphicon glyphicon-trash"></i>', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs'))  --}}
        {{ Form::close() }} 
        
    </p>
    </div>
</div>
@stop