
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>404 Page Not Found</title>

<link type="text/css" rel="stylesheet" href="{{asset('css/404.css')}}" />
<style>

@font-face { 
font-family: HelveticaNowText-Bold; src: url('/public/HelveticaNowText-Bold.ttf');
 }

@font-face {
  font-family: HelveticaNowText-Medium;
  src: url('/public/HelveticaNowText-Medium.ttf');
};

@font-face {
  font-family: HelveticaNowText-Regular;
  src: url('/public/HelveticaNowText-Regular.ttf');
};
</style>

<style>

body {background-image:radial-gradient(rgba(255,255,255,.6) 55%, rgba(222,222,222, 1)), url('public/images/pattern.jpeg'); background-attachment: fixed;}
h1 {text-shadow: 4px 4px 0 #ffc700; font-size:11.25em!important;font-family:'Helvetica Now Text'!important; font-weight:600!important; width:100%; letter-spacing:-10px;}
h2, p, .notfound a {font-family:'Helvetica Now Text'!important;}
h2 {font-size:60px!important;margin:0!important;letter-spacing:-1px;}
.notfound .notfound-404 {
    height: 230px!important;
}
#notfound .notfound {
	max-width:100%!important;
}
p{font-size:20px!important;letter-spacing:-1px;}
p span {display: block;}
.notfound a {
	text-transform:none;
	font-weight:500;
	font-size:16px;
	color:#000;
	border:4px solid transparent;
	padding:13px 25px;
}
.notfound a:hover, .notfound a:focus {border-color:#ffc700!important;background:#fff;}

@media(max-width:767px){
	.notfound .notfound-404 { height: 140px!important;}
	h1 {font-size:6.8em!important;letter-spacing:-6px;}
	h2 {font-size:28px!important;}
	p{font-size:16px!important;letter-spacing:-.4px; padding: 0 2em; margin:.3em 0 1.3em!important;}
	p span {display: inline;}
	.notfound a { font-size: 14px; padding: 10px 20px;}
}
</style>

<meta name="robots" content="noindex, follow">
</head>
<body>
<div id="notfound">
<div class="notfound">
<div class="notfound-404">
<h1>Oops !</h1>
</div>
<h2>404 - Page not found</h2>
<p>The page you are looking for might have been removed had its<span>name changed or is temporarily unavailable.</span></p>
<a href="{{route('home')}}">Go To Home Page</a>
</div>
</div>


</body>
</html>
