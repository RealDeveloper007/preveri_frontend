@extends('layouts.frontend')
@section('meta_tags')
<title>Preveri Podjetje - pogoji-uporabe</title>

<meta name="description" content="pogoji-uporabe details">

@endsection
@section('content')

<section class="breadcrum">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<!--<h2>pogoji uporabe</h2>-->
				<a href="{{route('home')}}">&#8962; Domača &rarr;</a>
				<a href="#">pogoji uporabe</a>
			</div>
		</div>
	</div>
</section>

<div class="service">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            {!! $setting->terms_condition !!}

            </div>
        </div>
    </div>
</div>

@stop