@extends('layouts.frontend')
@section('meta_tags')
<title>Preveri Podjetje - politika-zasebnosti</title>

<meta name="description" content="politika-zasebnosti details">

@endsection
@section('content')

<section class="breadcrum">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<!--<h2>politika zasebnosti</h2>-->
				<a href="{{route('home')}}">&#8962; Domača &rarr;</a>
				<a href="#">politika zasebnosti</a>
			</div>
		</div>
	</div>
</section>

<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            {!! $setting->privacy_policy !!}

            </div>
        </div>
    </div>
</div>

@stop