@extends('layouts.frontend')
@section('meta_tags')
<title>Preveri Podjetje - O nas</title>

<meta name="description" content="Portal Preveri Podjetje omogoča anonimno ocenjevanje in preverjanje najbolj uporabnih informacij o delovnih mestih, plači, kulturi podjetij.">

@endsection
@section('content')

<section class="breadcrum">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<!--<h2>o nas</h2>-->
				<a href="{{route('home')}}">&#8962; Domača &rarr;</a>
				<a href="#">o nas</a>
			</div>
		</div>
	</div>
</section>

<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                {!! $setting->about_us !!}

            </div>
        </div>
    </div>
</div>

@stop