@props([
    'slide'=>false,
	'title',
])
<!DOCTYPE html>
<!-- 
Template Name: Movie Pro
Version: 1.0.0
Author: Webstrot

-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx">
<!--[endif]-->


<!-- Mirrored from www.webstrot.com/html/moviepro/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Apr 2024 03:23:50 GMT -->
<head>
	<meta charset="utf-8" />
	<title>{{ $title }}</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta name="description" content="Movie Pro" />
	<meta name="keywords" content="Movie Pro" />
	<meta name="author" content="" />
	<meta name="MobileOptimized" content="320" />
	<!--Template style -->
	<x-clients.css></x-clients.css>

</head>

<body>
	<!-- preloader Start -->
	<div id="preloader">
		<div id="status">
			<img src="/assets/client/images/header/horoscope.gif" id="preloader_image" alt="loader">
		</div>
	</div>
	
	<!-- prs navigation Start -->
    <x-clients.header>

    </x-clients.header>
	<!-- prs navigation End -->


	<!-- prs Slider Start -->
	{{$slot}}

	<x-clients.footer></x-clients.footer>
	
	<!--main js file start-->
	<x-clients.script></x-clients.script>
	<!--main js file end-->
</body>


<!-- Mirrored from www.webstrot.com/html/moviepro/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Apr 2024 03:24:00 GMT -->
</html>