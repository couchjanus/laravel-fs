 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- CSRF Token -->
  
 <meta name="csrf-token" content="{{ csrf_token() }}">

 <meta name="description" content="">
 <meta name="author" content="Janus">
 
 <link rel="icon" href="/favicon.ico">

 <title>{{ config('app.name', 'Janus Nic') }}</title>

 <!-- Styles -->
 <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
 <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
