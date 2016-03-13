@extends('layouts.default')
    @section('content')
        @include('includes.alert')
        <section class="panel">
          <header class="panel-heading">
            <h1>Hello , <?php
                                $email  = Auth::user()->email;
                                $user = strstr($email, '@', true); // As of PHP 5.3.0
                                echo $user; // prints name
                              ?>  
             </h1>
             <span class="pull-right">
                  <a href="{{ URL::route('user.edit')}}" class="btn btn-success btn-sm btn-new-user">Edit Profile</a>
             </span>
          </header>
           <div class="panel_body">
             <h2>Your Email address is: <?php
                                $email  = Auth::user()->email;
                                echo $email;
                                ?>

             </h2>
             <h2>Your National Id is: <?php
                                $n_id  = Auth::user()->n_id;
                                echo $n_id;
                                ?>

             </h2>
           </div>
        </section>
         
@stop