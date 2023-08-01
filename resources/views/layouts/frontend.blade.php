<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#000000">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet ">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="canonical" href="{{\Request::url()}}" />

    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>-->

    @yield('meta_tags')
    <meta property="og:type" content="website" />
    <meta property="fb:app_id" content="1318003075732247" />
    <meta property="og:image:type" content="image/png">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:image:width" content="240" />
    <meta property="og:image:height" content="55" />
    <meta name="robots" content="noindex, nofollow" />

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

    <script src="{{ asset('js/moment.min.js') }}"></script>
    @if(Route::currentRouteName()=='podjetja')
    <script src="{{ asset('js/select_podjetje.min.js') }}"></script>
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    @elseif(Route::currentRouteName()=='home')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	<!--<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">-->
	<link rel="stylesheet" href="{{ asset('css/rtop.videoPlayer.1.0.0.min.css') }}" />

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
	
    @endif
	<link rel="stylesheet" href="{{ asset('css/gallery-carousel.css') }}">	
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	<script src="{{ asset('js/gallery-carousel.js') }}"></script>
	<script src="{{ asset('js/owl.carousel.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
	
	<!-- jquery is required (any version) -->
	<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}"></script>
	
	<!-- required video player js source -->
	<script src="{{ asset('js/rtop.videoPlayer.1.0.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>

     <!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/sl_SI/sdk.js#xfbml=1&version=v16.0&appId=1318003075732247&autoLogAppEvents=1" nonce="MwCmaJqN"></script> -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8N189G5F63"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-8N189G5F63');
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "item": {
            "@id": "https://preveri-podjetje.si",
            "name": "Domov"
            }
        },
        {
            "@type": "ListItem",
            "position": 2,
            "item": {
            "@id": "https://preveri-podjetje.si/o-nas",
            "name": "O Nas"
            }
        },
        {
            "@type": "ListItem",
            "position": 3,
            "item": {
            "@id": "https://preveri-podjetje.si/podjetja",
            "name": "Podjetja"
            }
        },
        {
            "@type": "ListItem",
            "position": 4,
            "item": {
            "@id": "https://preveri-podjetje.si/novice",
            "name": "Novice"
            }
        },
         {
            "@type": "ListItem",
            "position": 5,
            "item": {
            "@id": "https://preveri-podjetje.si/novice/Kako-uporabljati-portal-preveri-podjetje-si",
            "name": "Kako uporabljati portal preveri-podjetje.si"
            }
        }
        
        
        ]
    }
    </script>
	
<body>
    <div id="fb-root"></div>
    <div class="{{Route::currentRouteName()}}">
        <!-- Nav Bar Start -->
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <div class="navbar-brand">
                    <a aria-current="page" class="active" href="{{route('home')}}">
                        <img src="{{ asset('images/logo.png') }}" alt="preveri podjetje logo" width="100"></a>
                </div>
                <button aria-label="Toggle navigation" type="button" class="navbar-toggler">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="me-2 navbar-nav">
                        <li class="nav-item {{ request()->is('podjetja') || request()->is('podjetja/*') ? 'active' : '' }}"><a class="" href="{{route('podjetja')}}">Kakšna so podjetja?</a></li>
                        <li class="nav-item {{ request()->is('novice') || request()->is('novice/*') ? 'active' : '' }}"><a class="" href="{{route('novice')}}">Novice</a></li>
                        <div>
						<li class="nav-item"><a href="https://www.facebook.com/preveri.podjetje/" target="_blank"><img src="{{ asset('images/facebook.png') }}" class="img-responsive" alt="facebook logo"></a></li>
						<li class="nav-item"><a href="https://www.instagram.com/preveripodjetje/" target="_blank"><img src="{{ asset('images/instagram.png') }}" class="img-responsive" alt="instagram logo"></a></li>
						<li class="nav-item"><a href="https://www.youtube.com/@preveripodjetje" target="_blank"><img src="{{ asset('images/youtube.png') }}" class="img-responsive" alt="youtube logo"></a></li>
						<li class="nav-item"><a href="https://www.linkedin.com/in/zaposlitev/" target="_blank"><img src="{{ asset('images/linked-in.png') }}" class="img-responsive" alt="linkedin logo"></a></li>
						</div>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Nav Bar End -->

        <!--  Page Content Start -->
        @yield('content')
        <!--  Page Content End -->

        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-muted card-footer">
                            <a aria-current="page" class="active" href="/"><img src="{{ asset('images/logo.png') }}" alt="preveri podjetje logo"></a>
                            <p>Korak do boljše zaposlitve !</p>
                            </p>
                            <div class="row">
                                <div class="col-md-12">
<!--                                    <div class="fb-share-button" -->
<!--data-href="https://preveri-podjetje.si/" data-size="large"-->
<!--data-layout="button_count">-->
<!--                                </div>-->
 <a href="https://www.facebook.com/sharer.php?u={{route('home')}}" target="_blank">
                    <button aria-label="facebook" class="react-share__ShareButton" style="background-color: transparent; border: none; padding: 0 0 0 1.3em; font: inherit; color: inherit; cursor: pointer;"><img alt="Card_image_cap" src="{{asset('images/fb_share.png')}}" style="width:109px !important"></button>
                </a>
                                </div>
                                </div>
                                
                        
                           <!--  <div class="row">
                                <div class="col-md-12">
                                    <div class="fb-like" data-href="https://preveri-podjetje.si/" data-width="280" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                                </div>
                                <div class="col-md-12" style="margin-top: 16px;">

                                    <div class="fb-page" data-href="https://www.facebook.com/preveri.podjetje/" data-tabs="" data-width="280" data-height="" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false">
                                        <blockquote cite="https://www.facebook.com/preveri.podjetje/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/preveri.podjetje/">Preveri Podjetje</a></blockquote>
                                    </div>
                                </div>
                            </div> -->

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h3>Bližnjice</h3>
                        <ul class="nav flex-column">
                            <a class="" href="{{route('o-nas')}}">O nas</a>
                            <a class="" href="{{route('pogoji-uporabe')}}">Pogoji uporabe</a>
                            <a class="" href="{{route('politika-zasebnosti')}}">Politika zasebnosti</a>
                            <a class="" href="{{route('piskotki')}}">Piškotki</a>
                        </ul>
                    </div>
                    <div class="col-sm-5">
                        <h3>Prijava na novice</h3>
                        <p>
                        <p>S prijavo na novice se strinjate z našimi pogoji uporabe.</p>
                        </p>
                        <div class="newsletter_alert"></div>

                        <!-- News Letter Form -->
                        {{ Form::open(['route' => 'add_newsletter_data', 'method' => 'post', 'id'=>'newsletter_form']) }}

                        <input id="newsletter_Email" name="email" placeholder="Vnesi e-naslov" type="email" class="form-control noEnterSubmit" autocomplete="off" aria-invalid="false">

                        <button type="button" class="btn btn-warning" id="submit_newsletter_form">Potrdi</button>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        <!-- Cookies Consent Start-->
        <div class="CookieConsent" id="cookieNotice">
            <div>
                <p>Spletno mesto uporablja piškotke, s katerimi izboljšujemo uporabniško izkušnjo. <a class="" href="{{ route('piskotki') }}"> Preberi več</a></p>
                <button style="background: rgb(255, 212, 45) none repeat scroll 0% 0%; border: 0px none; border-radius: 0px; box-shadow: none; color: black; cursor: pointer; flex: 0 0 auto; padding: 5px 10px;" class="" onclick="acceptCookieConsent();" aria-label="Accept cookies">Strinjam se</button>
            </div>
        </div>
        <!-- Cookies Consent End-->
		
		<div class="modal view-modal" id="welcomeModal" role="dialog" tabindex="-1">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">&nbsp;</h5><button class="close_welcome_modal">×</button>
					</div>
					<div class="modal-body">
						<p><span>ALI SI ŽE OCENIL<br>SVOJO ZAPOSLITEV ?</span>VAŠE MNENJE JE POMEMBNO ! NE SKRBI,<br>VSE JE ANONIMNO</p>
						<div class="ratings">
							<i style="font-style: normal;">★</i>
							<i style="font-style: normal;">★</i>
							<i style="font-style: normal;">★</i>
							<i style="font-style: normal;">★</i>
							<i style="font-style: normal;">★</i>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal view-modal" id="signNewsletterModal" role="dialog" tabindex="-1">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">&nbsp;</h5><button class="close">×</button>
					</div>
					<div class="modal-body">
					    
					    <h3>Prijava na novice</h3>
                        <p>
                        <p>S prijavo na novice se strinjate z našimi pogoji uporabe.</p>
                        </p>
                        <div class="newsletter_alert"></div>

                        <!-- News Letter Form -->
                        {{ Form::open(['route' => 'add_newsletter_data', 'method' => 'post', 'id'=>'newsletter_form']) }}

                        <input id="newsletter_Email" name="email" placeholder="Vnesi e-naslov" type="email" class="form-control noEnterSubmit" autocomplete="off" aria-invalid="false">

                        <button type="button" class="btn btn-warning" id="submit_newsletter_form">Potrdi</button>

                        {{ Form::close() }}
					
					</div>
				</div>
			</div>
		</div>
		
    </div>
</body>

</html>
@include('layouts.comment_modal')
@include('layouts.scripts')