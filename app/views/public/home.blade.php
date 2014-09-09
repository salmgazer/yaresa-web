<!DOCTYPE html>
<html lang="en">

<head>

    @include('includes.head')
</head>

<body>
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  	               <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" {{ url("/")}}>mHealth Data</a>
            </div>
        </nav>

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="carousel slide" id="carousel-831377">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-831377">
					</li>
					<li data-slide-to="1" data-target="#carousel-831377">
					</li>
					<li data-slide-to="2" data-target="#carousel-831377">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img alt="" src="{{ asset('images/Healthcare-medical-apps.jpg')}}" />
						<div class="carousel-caption">
							<h4>
								Phone and apps
							</h4>
							<p>
								Use of mobiles in health delivery
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="{{ asset('images/immunization.jpg')}}" />
						<div class="carousel-caption">
							<h4>
								Immunization

							</h4>
							<p>
								Use of mobiles in health delivery
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="{{ asset('images/stethoscope.png')}}" />
						<div class="carousel-caption">
							<h4>
								Improved records
							</h4>
							<p>
								Use of mobiles in health delivery
							</p>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-831377" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-831377" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
			<hr>
			<div class="row clearfix">
				<div class="col-md-4 column">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">
								About
							</h3>
						</div>
						<div class="panel-body ">
							This web application complements the  Yaresa App. It is a dual purpose app that aids 
							community health nurses collect and report health data on individual community members 
							as well as provides continuing in-service audio-visual training for nurses out in the field. 
							Nurses working in rural areas collect paper based data and depend on their memory to follow up on 
							previous cases during home visit.
						</div>
						<div class="panel-footer panel">
							
						</div>
					</div>
				</div>
				<div class="col-md-4 column">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">
								Mobile App
							</h3>
						</div>
						<div class="panel-body">
							
							<a href="{{URL::to('/login')}}" class="btn btn-lg btn-info btn-block">Sign in</a>

							<p></p>
							<p> Obtain the complementary mobile app form the google play store or
								download it directly from here
							</p>
							<a  href="https://play.google.com/store/apps/details?id=com.ashesi.cs.mhealth.data">
								<img class="img-responsive" src="{{ asset('images/playstore.jpeg')}}" ></a>



						</div>
						<div class="panel-footer">
							
						</div>
					</div>
				</div>
				<div class="col-md-4 column">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">
								Help
							</h3>
						</div>
						<div class="panel-body">
							Login and explore. Do not delete support data. Send any comments and 
							suggestions for improvement to the team.
						</div>
						<div class="panel-footer">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('includes.tail')