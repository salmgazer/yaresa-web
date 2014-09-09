@extends('mainlayout')
@section('content')







	<div class="row clearfix">
		<div class="col-lg-12 column">
			<form role="form"  class="form-inline">
				
				<div class="form-group">
				
			
					 <label for="reportingDate">Reporting Date</label>
				
			
				<input type="text" name="reportingDate" id="reportingDate">

				<script type="text/javascript">
				$( "#reportingDate" ).datepicker();
				</script>
			</div>

                
            
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>


				
				</div>
				
		<button type="submit" class="btn btn-default">Submit</button>
			</form>



<!-- --------------------------------------------------- ----------------- -->
			
			<div class= "panel panel-default">
			<div class="panel-heading">Number of Childern under 18 months:</div>
			<div class="panel-body">
				<div class="table-responsive">
			<table class="table table-hover table-condensed success">
				<thead>
					<tr>
						<th>
							Subdistrict
						</th>
						<th>
							Community
						</th>
						<th>
							Number of children
						</th>
					</tr>
				</thead>
				<tbody>					
					@foreach($OneAndHalfYrOlds as $rec) 
					<tr>
						<td>
							
							{{ $rec->subdistrict }}
						</td>
						<td>
							{{ $rec->community_name }}													
						</td>					
						<td>
							{{ $rec->NoOfChildren }}													
						</td>					
					</tr>
				@endforeach

			
					
				</tbody>
			</table>
			</div>
			</div>
		</div>

<!-- --------------------------------------------------- ----------------- -->
			
			<div class= "panel panel-default">
			<div class="panel-heading">Number of Childern under 18 months without vaccination records:</div>
			<div class="panel-body">
				<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>
							Subdistrict
						</th>
						<th>
							Community
						</th>
						<th>
							No of children-Never Vaccinated
						</th>
					</tr>
				</thead>
				<tbody>					
					@foreach($UnvaccinatedKids as $rec) 
					<tr>
						<td>
							
							{{ $rec->subdistrict }}
						</td>
						<td>
							{{ $rec->community_name }}													
						</td>					
						<td>
							{{ $rec->NoOfChildren }}													
						</td>					
					</tr>
				@endforeach

			
					
				</tbody>
			</table>
					</div>
			</div>
		</div>

<!--  --------------------------------------------------- ----------------- -->
			
<!-- do another table showing how many days late for each child  -->
		<div class= "panel panel-default">
			<div class="panel-heading">Late vaccinations (Childern under 18 months):</div>
			<div class="panel-body">
				<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>
							Subdistrict
						</th>
						<th>
							Community
						</th>
						<th>
							No of children 
						</th>						
					</tr>
				</thead>
				<tbody>					
					@foreach($NoOfChildrenLateVaccines as $rec) 
					<tr>
						<td>
							
							{{ $rec->subdistrict }}
						</td>
						<td>
							{{ $rec->community_name }}													
						</td>					
						<td>
							{{ $rec->NoOfChildren }}													
						</td>					
					</tr>
				@endforeach

			
					
				</tbody>
			</table>
					</div>
			</div>
		</div>

<!--  --------------------------------------------------- ----------------- -->

			<div class="row clearfix">
				<div class="col-md-12 column">
					<p> what is in this space </p>
				</div>
			</div>
		</div>
	</div>

@stop