@extends('mainlayout')
@section('content')
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
        {{Session::get('message')}}
    </p>
@endif

<h1>CHOs</h1>

<p>
    {{ link_to_route('Chos.create', 'Add new cho', null, array('class' => 'btn btn-default')) }} 
    {{ link_to_route('Chos.index', 'Show All', null, array('class' => 'btn btn-default')) }} 
</p>
@if ($chos->count())
      
{{-- *******************search form******************************** --}}


<form id="custom-search-form" class="form-search form-horizontal pull-right" 
    action="{{ URL::action('ChosController@search') }}" method="get">
    
    <div class="input-append spancustom">
        <input type="text"class="search-query"
            name="str" placeholder="Search...">
        <button type="submit"class="btn"><i class="glyphicon glyphicon-search"></i>
        </button>
    </div>
</form>

{{-- *************************************************** --}}
{{ $chos->addQuery('order',$order)->addQuery('sort', $sort)->links()  }}

<div class= "table-responsive">
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>{{link_to_route('Chos.index','ID', array('sort' => 'cho_id'))}}
                    <a href="{{route('Chos.index', array('sort' => $sort, 'order' => 'asc'))}}">
                    </a>
                    <a href="{{route('Chos.index', array('sort' => $sort, 'order' => 'desc'))}}">
                    </a>
                </th>                
                <th>{{link_to_route('Chos.index','CHO Name', array('sort' => 'cho_name'))}}</th>  
                <th>{{link_to_route('Chos.index','CHO Zone', array('sort' => 'subdistrict'))}}</th>  {{-- NB: subdistrict is not in primary table --}}
                <th></th>  
                <th></th> 
                <th></th>        
            </tr>
        </thead>

        <tbody>
            @foreach ($chos as $cho)
                <tr>
                    <td>{{ $cho->cho_id }}</td>
                    <td>{{ $cho->cho_name }}</td>
                    <td>{{ $cho->subdistrict['subdistrict'] }}</td>
                   
                    <td>
                        <a class="btn btn-xs btn-success" href="{{ URL::to('cho/' . $cho->cho_id) }}">
                                                   <i class="glyphicon glyphicon-eye-open"></i>View</a>
                    </td>
                    <td>
            {{-- 
                        link_to_route('Chos.edit', 'Edit',
                            array($cho->cho_id), array('class' => 'btn btn-info btn-xs')) 
            --}}
                        
                        <a href="{{ action('ChosController@edit', array($cho->cho_id)) }}"
                            class="btn btn-info btn-xs">
                            <i class="glyphicon glyphicon-pencil"></i>Edit</a>

                        </td>

                    <td>
                        
            
                      {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('Chos.destroy', $cho->cho_id))) }}  
                  
                        {{-- Form::submit('Delete', array('class'=> 'btn btn-danger btn-xs'))  --}}
                        {{ Form::button('<i class="glyphicon glyphicon-trash"></i>Delete', array('type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick'=>'if(!confirm("Are you sure to delete this item?"))
                        {
                        return false;};'    ))  }}
                        {{ Form::close() }}   
            



                    </td>    
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
    {{ $chos->links() }}  {{-- works properly because of parameteres added in teh top version of links --}}
</div>
@else
    There are no Chos
@endif

@stop