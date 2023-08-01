@extends('layouts.frontend')

@section('meta_tags')
<title>Preveri Podjetje - Vsa Podjetja</title>
<meta name="description" content="Primerjajte, kako zaposlujejo podjetja. Preberite komentarje in ocene o zadovoljstvu zaposlenih pri slovenskih delodajalcih.">
@endsection

@section('content')

<div class="company_banner new">
	<div class="card text-white">
		<div class="container">
			<div class="SearchBar">
				{{ Form::open(['route' => 'podjetja', 'method' => 'post', 'id'=>'filter_companies_form']) }}

				<div class="grouped-button">

					<div class="select-cnt">
						<select class="js-data-example-ajaxs" name="title" required>
							<option value=''>Search...</option>
						</select>
						<div class="select-arrow">
						</div>
					</div>

					<button type="button" class="btn btn-secondary" id="filter_companies">Iskanje →</button>
				</div>

				<div class="advanced">
					<a href="#">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
							<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
						</svg>
						Advanced Search
					</a>
				</div>

				{{ Form::close() }}

			</div>
		</div>
	</div>
</div>

<section class="breadcrum">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<!--<h2>Vsa Podjetja</h2>-->
				<a href="{{route('home')}}">&#8962; Domača &rarr;</a>
				<a href="#">Vsa Podjetja</a>
			</div>
		</div>
	</div>
</section>

<div class="advanced-search">
	{{ Form::open(['route' => 'podjetja', 'method' => 'get', 'id'=>'advance_filter_companies_form']) }}

	<input type="hidden" name="search_type" value="advance_search">

	<button class="close-advanced-search" type="button">×</button>
	<h3>search options</h3>

	<h5>by star ratings</h5>
	<div class="rating">
		<span class="star" name="1">★</span>
		<span class="star" name="2">★</span>
		<span class="star" name="3">★</span>
		<span class="star" name="4">★</span>
		<span class="star" name="5">★</span>
		<input type="hidden" name="rating">
	</div>

	<h5>by comments</h5>
	<div class="select-cnt">
		<select name="type">
			<option value='0'>With Comment</option>
			<option value='1'>Without Comment</option>
		</select>
	</div>

	<h5>by region</h5>
	@php
	$Region = '';
	@endphp
	<div class="select-cnt">
		<select class="js-data-example-region-ajaxs" name="region">
			<option value='' disabled selected>Select...</option>
			@foreach($regions as $singleRegion)
			@if(request()->has('region'))
			@if(request()->get('region') == $singleRegion->id)
			$Region = $singleRegion->name;

			<option value='{{$singleRegion->id}}' selected>{{$singleRegion->name}}</option>
			@else
			<option value='{{$singleRegion->id}}'>{{$singleRegion->name}}</option>
			@endif
			@else
			<option value='{{$singleRegion->id}}'>{{$singleRegion->name}}</option>
			@endif
			@endforeach

		</select>
		<div class="select-arrow">
		</div>
	</div>

	<h5>by category</h5>
	<div class="select-cnt">
		<select class="js-data-example-category-ajaxs" name="category">
				<option value='' disabled selected>Select...</option>
			@foreach($category as $singleCategory)
			@if(request()->has('category'))
			@if(request()->get('category') == $singleCategory->id)
			$Region = $singleCategory->name;

			<option value='{{$singleCategory->id}}' selected>{{$singleCategory->title}}</option>
			@else
			<option value='{{$singleCategory->id}}'>{{$singleCategory->title}}</option>
			@endif
			@else
			<option value='{{$singleCategory->id}}'>{{$singleCategory->title}}</option>
			@endif
			@endforeach
		</select>
		<div class="select-arrow">
		</div>
	</div>
	<!-- <button type="button" class="btn btn-warning" id="advance_filter">Search</button> -->

	<div class="search-buttons">
		<button type="submit" class="btn btn-warning" id="advance_filter">Search</button>
		<a href="javascript:void(0)" class="ResetFilter"><button type="button" class="btn btn-danger">Reset Filter</button></a>
	</div>

	{{ Form::close() }}
</div>

<div id="overlay">
	<div class="cv-spinner"></div>
</div>

<div class="display-record">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="display-records">
					<!-- Search Data -->
					@if(request()->has('rating'))
					<span><strong>Star Ratings :</strong>&nbsp;</span>

					@if(request()->get('rating') == 1)

					<abbr class="dv-star-rating question_ratings">
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
					</abbr>

					@elseif(request()->get('rating') == 2)

					<abbr class="dv-star-rating question_ratings">
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
					</abbr>

					@elseif(request()->get('rating') == 3)

					<abbr class="dv-star-rating question_ratings">
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
					</abbr>

					@elseif(request()->get('rating') == 4)

					<abbr class="dv-star-rating question_ratings">
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
					</abbr>

					@elseif(request()->get('rating') == 5)

					<abbr class="dv-star-rating question_ratings">
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>
					</abbr>

					@else

					<abbr class="dv-star-rating question_ratings">
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
						<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>
					</abbr>

					@endif

					@endif

					@if(request()->has('type'))

					<span><strong>Comment Type :</strong> {{request()->get('type') == 0 ? 'With Comment' : 'Without Comment'}}</span>
					@endif

					@if(request()->has('region'))

					<span><strong>Region :</strong> {{request()->get('region') == '' ? 'No Region Selected' :  region_check(request()->get('region'))  }}</span>
					@endif

					@if(request()->has('category'))

					@php $category = isset($list[0]->category) ? $list[0]->category : '' @endphp

					<span><strong>Category :</strong> {{request()->get('category') == '' ? 'No Category Selected' : $category }}</span>



					@endif

				</div>
			</div>
		</div>
	</div>
</div>
<div class="companyListing">

	<div class="container">
		<div class="row">
			@forelse($list as $singleCompany)
			<div class="col-sm-3">
				<div class="company_detail">
					<div class="card card-body">
						<div class="review_image">
							<img alt="" src='{{backend_asset("company_images/".$singleCompany->logo)}}' width="20%" class="card-img-top">
						</div>
						<div class="review_detail">
							<h5 class="card-title">{{$singleCompany->title}}</h5>
							<a href="{{route('podjetja').'/'.$singleCompany->slug}}"><button class="btn btn-warning">Preberi več </button></a>
						</div>
					</div>
				</div>
			</div>
			@empty
			<p class="no-records">No Company found</p>
			@endforelse
		</div>
	</div>


	{!! $list->appends($_GET)->links() !!}

</div>
@stop

<style>
	.rating {
		unicode-bidi: bidi-override;
		direction: rtl;
	}

	.rating>span {
		position: relative;

		color: #999;
		font-size: 2rem;
		margin: 0 0.2rem;
		line-height: 1.8rem;
		cursor: pointer;
		/*width: 1.1em;*/
	}

	.rating>span:hover,
	.rating>span:hover~span {
		color: transparent;
	}

	.rating>span:hover:before,
	.rating>span:hover~span:before {
		content: "\2605";
		position: absolute;
		left: 0;
		color: gold;
		cursor: pointer;
	}

	.star.selected {
		color: gold;
	}
</style>