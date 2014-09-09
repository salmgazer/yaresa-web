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
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        {{-- <form role="form"> --}}
                            {{ Form::open(array('url' => 'login')) }}
                            <h1>Login</h1>

                            <!-- if there are login errors, show them here -->
                            <p>
                                {{ $errors->first('username') }}
                                {{ $errors->first('password') }}
                                
                            </p>
                            
                        
                            <fieldset>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" 
                                    name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="{{ Input::old('username') }}">
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                
                                <button type="submit" class= "btn btn-lg btn-success btn-block">Submit!</button>
                                <a href="{{URL::to('/')}}" class="btn btn-lg btn-default btn-block">Cancel</a>
                            </fieldset>
                        {{ Form::close() }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('includes.tail')