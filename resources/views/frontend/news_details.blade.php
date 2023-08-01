@extends('layouts.frontend')

@section('meta_tags')
<title>{{$details->title}}</title>

	<meta property="og:site_name" content=">Preveri Podjetje - Anonimno oceni zaposlitev">
	<meta property="og:url" content="{{route('novice').'/'.$details->slug}}">
	<meta name="description" content="{{$details->short_description}}">
	
    @endsection

@section('content')

<section class="breadcrum margin-trim">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<!--<h2>Novice Podrobnosti</h2>-->
				<a href="{{route('home')}}">&#8962; Domača &rarr;</a>
			    <a href="{{route('novice')}}">Novice &rarr;</a>
				<a href="#">Novice Podrobnosti</a>
			</div>
		</div>
	</div>
</section>

<div class="single_news">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="single_news_details">
                    <h1>{{$details->title}}</h1>
						<p class="datetime">&#128337;&nbsp;{{ date('M d, Y',strtotime($details->date))}}</p>
                    <br>
                    <div class="right_side_class" data-toggle="modal" data-target="#signNewsletterModal">
						<a href="#" class="subscribe-btn">PRIJAVA NA NOVICE – BODITE NA TEKOČEM GLEDE ZAPOSLOVANJA</a>
                    </div>
                    <a href="https://www.facebook.com/sharer.php?u={{route('novice').'/'.$details->slug}}" target="_blank">
                    <button aria-label="facebook" class="react-share__ShareButton" ><img alt="Card_image_cap" src="{{asset('images/fb.png')}}" width="40px">Deli</button>
                    </a>
                    {!! $details->description !!}
                </div>
            </div>
        </div><a class="back_login" href="{{route('novice')}}">Nazaj na novice</a>
    </div>
</div>

@stop