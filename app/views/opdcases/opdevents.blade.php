
@extends('mainlayout')
@section('content')

<h1>OPD Events</h1>

<p>OPD Events</p>

@if ($OPDEvents)   {{-- ->count())   --}}

                        
<div class= "table-responsive">
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th>Case Category</th>                
                <th>Case name</th>  
                
                <th>Community Name</th>  
                <th>Number of cases</th>        
            </tr>
        </thead>

        <tbody>
            @foreach ($OPDEvents as $OPDEvent)
                <tr>
                    <td>{{ $OPDEvent->opd_case_category }}</td>
                    <td>{{ $OPDEvent->opd_case_name }}</td>
                    
                    <td>
                        {{ $OPDEvent->community_name }}
                    </td>
                    <td>
                      {{ $OPDEvent->theCount }}
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