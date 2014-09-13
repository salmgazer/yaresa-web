
@extends('mainlayout')
@section('content')

<h1>Community Members</h1>

<p>Gender Breakdown</p>

@if ($communitiesByGenders)   {{-- ->count())   --}}

                        
<div class= "table-responsive">
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>Community Name</th>                
                <th>Males</th>  
                
                <th>Females</th>  
                <th>Total</th>        
            </tr>
        </thead>

        <tbody>
            @foreach ($communitiesByGenders as $communitiesByGender)
                <tr>
                    <td>{{ $communitiesByGender->community_name }}</td>
                    <td>{{ $communitiesByGender->Males }}</td>
                    
                    <td>
                        {{ $communitiesByGender->Females }}
                    </td>
                    <td>
                      {{ $communitiesByGender->theCount }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
    
</div>
@else
    There are no OPD Events
@endif

@stop