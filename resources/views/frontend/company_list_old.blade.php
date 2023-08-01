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
						  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
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
{{ Form::open(['route' => 'podjetja', 'method' => 'post', 'id'=>'advance_filter_companies_form']) }}

	<button class="close-advanced-search" type="button">×</button>
	<h3>search options</h3>
	
	<h5>by star ratings</h5>			
	<div class="ratings">
		<span>★</span>
		<span>★</span>
		<span>★</span>
		<span>★</span>
		<span>★</span>
		<input type="hidden" name="rating">
	</div>
		
	<h5>by comments</h5>
	<div class="select-cnt">
		<select name="type" required>
		<option value=''>Select..</option>
			<option value='0'>With Comment</option>
			<option value='1'>Without Comment</option>
		</select>
	</div>
	
	<h5>by region</h5>
	<div class="select-cnt">
		<select class="js-data-example-region-ajaxs" name="region" required>
			<option value=''>Region...</option>
		</select>
		<div class="select-arrow">
		</div>
	</div>
	
	<h5>by category</h5>
	<div class="select-cnt">
		<select class="js-data-example-category-ajaxs" name="category" required>
			<option value=''>Category...</option>
		</select>
		<div class="select-arrow">
		</div>
	</div>
	
	<button type="button" class="btn btn-warning" id="advance_filter">Search</button>
	{{ Form::close() }}
</div>

<div id="overlay">
		<div class="cv-spinner"></div>
	</div>
    
<div class="companyListing">
    
</div>
@stop
