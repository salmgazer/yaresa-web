@extends('mainlayout')
@section('content')
@if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
        {{Session::get('message')}}
    </p>
@endif

<h1>CommunityMembers</h1>

<p>
    {{ link_to_route('CommunityMembers.create', 'Add new Community Member', null, array('class' => 'btn btn-default')) }} 
    {{ link_to_route('CommunityMembers.index', 'Show All', null, array('class' => 'btn btn-default')) }} 
</p>
@if ($communitymembers->count())
      
{{-- *******************search form******************************** --}}


<form id="custom-search-form" class="form-search form-horizontal pull-right" 
    action="{{ URL::action('CommunityMembersController@search') }}" method="get">
    
    <div class="input-append spancustom">
        <input type="text"class="search-query"
            name="str" placeholder="Search...">
        <button type="submit"class="btn"><i class="glyphicon glyphicon-search"></i>
        </button>
    </div>
</form>

{{-- *************************************************** --}}
{{ $communitymembers->addQuery('order',$order)->addQuery('sort', $sort)->links()  }}

<div class= "table-responsive">
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>{{link_to_route('CommunityMembers.index','ID', array('sort' => 'communitymember_id'))}}
                    <a href="{{route('CommunityMembers.index', array('sort' => $sort, 'order' => 'asc'))}}">
                    </a>
                    <a href="{{route('CommunityMembers.index', array('sort' => $sort, 'order' => 'desc'))}}">
                    </a>
                </th>                
                <th>{{link_to_route('CommunityMembers.index','Community', array('sort' => 'community'))}}</th>  
                <th>{{link_to_route('CommunityMembers.index','Birthdate', array('sort' => 'birthdate'))}}</th>
                <th>{{link_to_route('CommunityMembers.index','Gender', array('sort' => 'gender'))}}</th>
                <th></th>  
                <th></th> 
                <th></th>        
            </tr>
        </thead>

        <tbody>
            @foreach ($communitymembers as $communitymember)
                <tr>
                    <td>{{ $communitymember->community_member_id }}</td>
                    <td>{{ $communitymember->community->community_name }}</td>  {{-- this sort of ref seems to work here! --}}
                    <td>{{ $communitymember->birthdate }}</td>
                   <td>{{ $communitymember->gender }}</td>
                    <td>
                        <a class="btn btn-xs btn-success" href="{{ URL::to('communitymember/' . $communitymember->communitymember_id) }}">
                                                   <i class="glyphicon glyphicon-eye-open"></i>View</a>
                    </td>
                    <td>
            {{-- 
                        link_to_route('CommunityMembers.edit', 'Edit',
                            array($communitymember->communitymember_id), array('class' => 'btn btn-info btn-xs')) 
            --}}
                        
                        <a href="{{ action('CommunityMembersController@edit', array($communitymember->communitymember_id)) }}"
                            class="btn btn-info btn-xs">
                            <i class="glyphicon glyphicon-pencil"></i>Edit</a>

                        </td>

                    <td>
                        
            
                      {{ Form::open(array('method' 
                    => 'DELETE', 'route' => array('CommunityMembers.destroy', $communitymember->communitymember_id))) }}  
                  
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
    {{ $communitymembers->links() }}  {{-- works properly because of parameteres added in teh top version of links --}}
</div>
@else
    There are no communitymembers
@endif

@stop