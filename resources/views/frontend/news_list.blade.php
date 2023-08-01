@extends('layouts.frontend')
@section('meta_tags')
<title>Preveri Podjetje - Novice</title>
<meta name="description" content="Brezplačne novice portala Preveri Podjetje o zaposlitvenih praksah in uporabni nasveti, ki vam olajšajo zaposlitveno pot. ">
@endsection

@section('content')

    <div class="company_banner news_banner">
        <div class="card text-white">
            <div class="container">
                <h1 class="card-text">Novice</h1>
                <p class="card-text">Novice in raziskave</p>
            </div>
        </div>
    </div>
	
	<section class="breadcrum">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<!--<h2>Novice</h2>-->
				<a href="{{route('home')}}">&#8962; Domača &rarr;</a>
				<a href="#">Novice</a>
			</div>
		</div>
	</div>
	</section>

    <div class="companyListing news_listing">
        <div class="container">
            <div class="row">
                @foreach($list as $singleNews)
                <div class="col-sm-6">
                    <div class="company_detail">
                        <div class="card card-body">
                            <div class="review_image"><img alt="{{$singleNews->title}}" src="{{ backend_asset('news_images/'.$singleNews->image) }}" width="20%" class="card-img-top"></div>
                            <div class="review_detail">
								<a href="{{route('novice').'/'.$singleNews->slug}}">
                                    <h5 class="card-title">{{$singleNews->title}}</h5>
                                </a>
                                <p class="card-text">{{$singleNews->short_description}}</p>
                                <p class="card-text">&#128337;&nbsp;{{ date('M d, Y',strtotime($singleNews->date))}}</p>
								<a href="{{route('novice').'/'.$singleNews->slug}}"><button class="btn btn-warning">Preberi več </button></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                {{$list->links()}}
               
            </div>
        </div>
    </div>
   

@stop