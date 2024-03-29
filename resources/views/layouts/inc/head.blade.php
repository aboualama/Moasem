<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>@yield('title') | {{ config('app.name') }} </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="@yield('keywords')" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ asset('web') }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('web') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('web') }}/css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="{{ asset('web') }}/js/jquery.min.js"></script>
<!-- //js -->  
<!-- cart -->
<script src="{{ asset('web') }}/js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="{{ asset('web') }}/js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smooth-scrolling -->
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".scroll").click(function(event){   
      event.preventDefault();
      $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    });
  });
</script>
<!-- //end-smooth-scrolling -->
<meta name="csrf-token" content="{{ csrf_token() }}">


@stack('css')

</head>