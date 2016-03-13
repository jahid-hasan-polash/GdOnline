<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keyword" content="">
        <link rel="shortcut icon" href="img/favicon.png">
 
        <title>{{ $title }} - {{ Config::get('customConfig.siteName') }}</title>
        
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap-reset.css') }}
        {{ HTML::style('assets/font-awesome/css/font-awesome.css') }}
        {{ HTML::style('css/style.css') }}
        {{ HTML::style('css/style-responsive.css') }}
        @yield('style')
        {{ HTML::style('css/custom.css') }}

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          {{ HTML::script('js/html5shiv.js') }}
          {{ HTML::script('js/respond.min.js') }}
        <![endif]-->
    </head>

    <body class="register-body">

    <header class="header white-bg">
        <a href="{{route('dashboard')}}" class="logo" ><span>Gd Online</span></a>

        <div class="pull-right" style="padding-top:15px">
            <a href="{{route('login')}}" class="btn btn-danger">Login</a>
        </div>

    </header>
    <div class="container">
            {{ Form::open(array('route' => 'register', 'method' => 'post', 'class' => 'form-signin')) }}
            <h2 class="form-signin-heading">Register now</h2>
            <div class="login-wrap">
                    @include('includes.alert')

                    {{ Form::number('n_id', '', array('class' => 'form-control', 'placeholder' => 'National Id No', 'autofocus')) }}



                    {{ Form::text('username', '', array('class' => 'form-control', 'placeholder' => 'User name', 'autofocus')) }}



                    {{ Form::text('address', '', array('class' => 'form-control', 'placeholder' => 'Address', 'autofocus')) }}


                    {{ Form::text('phone', '', array('class' => 'form-control', 'placeholder' => 'Phone', 'autofocus')) }}



                    {{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address', 'autofocus')) }}




                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}



                    {{ Form::password('confirm_pass', array('class' => 'form-control', 'placeholder' => 'Confirm Password')) }}


                    {{ Form::submit('Go', array('class' => 'btn btn-lg btn-login btn-block')) }}
            </div>

        

          {{ Form::close() }}

      </div>

    <!-- js placed at the end of the document so the pages load faster -->
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

    </body>
</html>
