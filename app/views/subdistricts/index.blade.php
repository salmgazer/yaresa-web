{{-- /Applications/XAMPP/xamppfiles/htdocs/mywebs/laraveltest/mHealth/app/views/subdistricts/index.blade.php  --}}

@extends('mainlayout')
@section('content')

<h1>Sub Districts</h1>

<p>{{ link_to_route('subdistricts.create', 'Add new Sub Districts') }}</p>

@if ($subdistricts->count())

                        
<div class= "table-responsive">
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>ID</th>                
                <th>Subdistrict</th>  
                
                <th></th>  
                <th></th>        
            </tr>
        </thead>

        <tbody>
            @foreach ($subdistricts as $subdistrict)
                <tr>
                    <td>{{ $subdistrict->subdistrict_id }}</td>
                    <td>{{ $subdistrict->subdistrict }}</td>
                    
                    <td>{{ link_to_route('subdistricts.edit', 'Edit',
                            array($subdistrict->subdistrict_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                      {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('subdistricts.destroy', $subdistrict->subdistrict_id))) }}                       
                        {{ Form::submit('Delete', array('class'=> 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
    
</div>
@else
    There are no subdistricts
@endif

@stop