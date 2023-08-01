@extends('layouts.frontend')

@section('meta_tags')
<title>Preveri Podjetje - Vsa Podjetja</title>
<meta name="description" content="Primerjajte, kako zaposlujejo podjetja. Preberite komentarje in ocene o zadovoljstvu zaposlenih pri slovenskih delodajalcih.">
@endsection

@section('content')

 <div class="company_banner news_banner">
        <div class="card text-white">
            <div class="container">
                <h1 class="card-text">Dobro ocenjene zaposlitve</h1>
                <!--<p class="card-text"></p>-->
            </div>
        </div>
    </div>


<div id="overlay">
	<div class="cv-spinner"></div>
</div>
    
<section class="breadcrum">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<!--<h2>Dobro ocenjene zaposlitve</h2>-->
				<a href="{{route('home')}}">&#8962; Domača &rarr;</a>
				<a href="#">Dobro ocenjene zaposlitve</a>
			</div>
		</div>
	</div>
</section>

<div class="companyListing">
    
</div>

<style>
    .review_detail {
    color: #000;
}
</style>
@stop
