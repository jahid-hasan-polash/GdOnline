@extends('layouts.default')
    @section('content')
        @include('includes.alert')
        <h1>Welcome , <?php
                            $email  = Auth::user()->email;
                    //       $domain = strstr($email, '@');
                    //        echo $domain; // prints @example.com
                            $user = strstr($email, '@', true); // As of PHP 5.3.0
                            echo $user; // prints name
                          ?>  
         </h1>
         <h2>Your Email address is: <?php
                            $email  = Auth::user()->email;
                            
                            echo $email;
                            ?>

         </h2>
         
@stop