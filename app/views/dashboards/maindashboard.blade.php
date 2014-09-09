@extends('mainlayout')
@section('content')



<h1>mHealth Web Application</h1>


	<div class="row clearfix">
		<div class="col-md-6 column">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						OPD
					</h3>
				</div>
				<div class="panel-body">
					OPD summaries
					<table class="table table-condensed table-striped">
						<tr>
							<td class="nna_shaded">No. of OPD cases in 7days</td>
							<td>{{ $NoOfOpdCases7days; }} </td>
						</tr>
						<tr>
							<td class="nna_shaded">No. of OPD cases in 30days</td>
							<td>{{ $NoOfOpdCases30days; }} </td>
						</tr>
						<tr>
							<td class="nna_shaded"></td>
							<td> </td>
						</tr>
						<tr>
							<td class="nna_shaded"></td>
							<td> </td>
						</tr>
					</table>
				</div>
				<div class="panel-footer">
					Panel footer
				</div>
			</div>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						Vaccinations
					</h3>
				</div>
				<div class="panel-body">
					Vacinations summaries
				</div>
				<div class="panel-footer">
					Panel footer
				</div>
			</div>
		</div>
		<div class="col-md-6 column">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						Health Promotion
					</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
				<div class="panel-footer">
					Panel footer
				</div>
			</div>
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						Family Planning
					</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
				<div class="panel-footer">
					Panel footer
				</div>
			</div>
		</div>
	</div>




@stop