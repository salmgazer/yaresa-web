@extends('mainlayout')
@section('content')
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
        {{Session::get('message')}}
    </p>
@endif

<h1>Communities</h1>

<p>
    {{ link_to_route('community.create', 'Add new Community', null, array('class' => 'btn btn-default')) }} 
    {{ link_to_route('community.index', 'Show All', null, array('class' => 'btn btn-default')) }} 
</p>
@if ($communities->count())
      
{{-- *******************search form******************************** --}}


<form id="custom-search-form" class="form-search form-horizontal pull-right" 
    action="{{ URL::action('CommunityController@search') }}" method="get">
    
    <div class="input-append spancustom">
        <input type="text"class="search-query"
            name="str" placeholder="Search...">
        <button type="submit"class="btn"><i class="glyphicon glyphicon-search"></i>
        </button>
    </div>
</form>

{{-- *************************************************** --}}
{{ $communities->addQuery('order',$order)->addQuery('sort', $sort)->links() }}


<div class= "table-responsive">
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>{{link_to_route('community.index','ID', array('sort' => 'community_id'))}}
                    <a href="{{route('community.index', array('sort' => $sort, 'order' => 'asc'))}}">
                    </a>
                    <a href="{{route('community.index', array('sort' => $sort, 'order' => 'desc'))}}">
                    </a>
                </th>
                <th>{{link_to_route('community.index','Community Name', array('sort' => 'community_name'))}}</th>
                <th>{{link_to_route('community.index','Subdistrict', array('sort' => 'subdistrict'))}}</th>  
                <th>{{link_to_route('community.index','Population', array('sort' => 'population'))}}</th>  
                <th></th>  
                <th></th> 
                <th></th>        
            </tr>
        </thead>

        <tbody>
            @foreach ($communities as $community)
                <tr>
                    <td>{{ $community->community_id }}</td>
                    <td>{{ $community->community_name }}</td>
                    <td>{{ $community->subdistrict['subdistrict'] }} {{--  $community->subdistrict->subdistrict --}}</td>    
                    <td>{{ $community->population }}</td>          
                    <td>
                        <a class="btn btn-xs btn-success" href="{{ URL::to('community/' . $community->community_id) }}">
                                                   <i class="glyphicon glyphicon-eye-open"></i>View</a>
                    </td>
                    <td>
            {{-- 
                        link_to_route('community.edit', 'Edit',
                            array($community->community_id), array('class' => 'btn btn-info btn-xs')) 
            --}}
                        
                        <a href="{{ action('CommunityController@edit', array($community->community_id)) }}"
                            class="btn btn-info btn-xs">
                            <i class="glyphicon glyphicon-pencil"></i>Edit</a>

                        </td>

                    <td>
                        
            
                      {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('community.destroy', $community->community_id))) }}  
                  
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
    {{ $communities->links() }}  {{-- works properly because of parameteres added in teh top version of links --}}
</div>
@else
    There are no communities
@endif

@stop