@extends('layouts.frontend')

@section('meta_tags')
<title>{{$company_details->title}}</title>
<meta property="og:site_name" content=">Preveri Podjetje - Anonimno oceni zaposlitev">
<meta property="og:url" content="{{route('podjetja').'/'.$company_details->slug}}">
<meta name="description" content="Matična številka: {{$company_details->reg_no}}, Naslov: {{$company_details->street.' '.$company_details->house_no.', '.$company_details->postal_code.' '.$company_details->post_office}}, Regija: {{$company_details->region->name}}">

@if($company_details->status == 0)
<meta name="robots" content="noindex, follow">

@endif

@endsection

@section('content')

<div class="company_banner company_single_banner">
    <div class="card text-white">
        <div class="container"><img alt="Banner" src="{{ asset('images/company profile1.jpg') }}" width="100%" class="card-img"></div>
    </div>
</div>
<div id="overlay">
	<div class="cv-spinner"></div>
</div>

<section class="breadcrum">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<!--<h2>Podatki o podjetju</h2>-->
				<a href="{{route('home')}}">&#8962; Domača &rarr;</a>
				<a href="{{route('podjetja')}}">Vsa Podjetja &rarr;</a>
				<a href="#">Podatki o podjetju</a>
			</div>
		</div>
	</div>
</section>

<div class="company_single_main_detail">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="company_profile_image"><img alt="{{$company_details->title}}" src="{{ backend_asset('company_images/'.$company_details->logo) }}" width="40%" class="card-img"></div>
            </div>
            <div class="col-sm-9">
                <div class="company_profile_data">
                    <h1 class="card-title">{{$company_details->title}}</h1>
                    @if($company_details->website != '')
                    <p class="yellowcolor">
                        {{$company_details->website_info}}
                        <a href="{{$company_details->website}}" class="yellowcolor" rel="nofollow" target="blank">{{$company_details->website}}</a></p>
                    @endif
                    <!--<p>{{$company_details->category}}</p>-->
                    <p>
                    <div class="dv-star-rating" style="display: inline-block; position: relative;">



                        @for($i=1; $i<=$ratingcount; $i++) @if($company_details->rating < $i) <label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i>
                                </label>
                                @else

                                <label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i>
                                </label>

                                @endif
                                @endfor

                    </div>
                    </p>
					<div class="company_share_comment_sec">
						<a href="https://www.facebook.com/sharer.php?u={{route('podjetja').'/'.$company_details->slug}}" target="_blank">
							<button aria-label="facebook" class="react-share__ShareButton" ><img alt="Card_image_cap" src="{{asset('images/fb.png')}}" width="40px">Deli</button>
						</a>
						<button type="button" class="companyaddcomment btn btn-secondary" data-toggle="modal" data-target="#myModal"><span>+</span> DODAJ KOMENTAR</button>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="picture_other_detail">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-body">
                    <div class="stats_detail">
                        <div class="card-title">
                            @if($company_details->total_comments > 0)
                            <a href="#komentar">Komentar</a>
                            @else
                            Komentar
                            @endif
                            
                            </div>
                        <p class="card-text">
                            @if($company_details->total_comments > 0)
                            <a href="#komentar" style="color: black;">
                                {{$company_details->total_comments}}
                                </a>
                               @else
                               {{$company_details->total_comments}}
                               @endif
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-body">
                    <div class="stats_detail" style="height: 57px;">
                        <div class="card-title">
                                @if($total_salaries > 0)
                                    <a href="#placa">Plača</a>
                                @else
                                   Plača
                                @endif
                            </div>
                        <p class="card-text">
                             @if($total_salaries > 0)
                                <a href="#placa" style="color: black;">{{$total_salaries}}</a>
                                 @else
                                 {{$total_salaries}}
                                  @endif
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-body">
                    <div class="stats_detail" style="height: 57px;">
                        <div class="card-title">Statistika</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="basic_information_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <div class="stats_detail">
                        <h2 class="card-title">Osnovni podatki</h2>
                        <p>Matična številka: {{$company_details->reg_no}}</p>
                        <p>Pravnoorganizacijska oblika: {{$company_details->legal_organizational_form}}</p>
                        <p>Naslov: {{$company_details->street.' '.$company_details->house_no.', '.$company_details->postal_code.' '.$company_details->post_office}}</p>
                        <p>Regija: {{$company_details->region->name}}</p>
                        <p>Kategorija: {{$company_details->category}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($company_details->extra_message_status == 1)
<div class="basic_information_sec opinion">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body margin-low">
                    <div class="stats_detail">
                        <h2 class="card-title">{{$company_details->extra_message}} <span class="companyaddcomment" data-toggle="modal" data-target="#myModal" style="cursor:pointer;position:relative;">{{$company_details->extra_message1}}</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if($company_details->description_status == 1)
<div class="pictures_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-body">
                    <div class="stats_detail">
                        <h2 class="card-title">Pismo delodajalca - replika</h2>
                        <p>{!!$company_details->description!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gallery_sec">
    <div class="container-fluid">
        <div class="row">
			<div class="owl-carousel owl-theme owl-4" style="transition: none 0s ease 0s; overflow: unset; ">
			    @foreach($company_details->pictures as $singlePicture)
                @if($singlePicture->status == 1)
				<div class="item">
					<a href="{{backend_asset('company_images/'. $singlePicture->picture)}}" data-fancybox="gallery" class="gallery-container">
						<img src="{{backend_asset('company_images/'. $singlePicture->picture)}}" class="img-fluid">
					</a>
				</div>
				@endif
				@endforeach
			</div>
			
			
        </div>
    </div>
</div>

@endif

<div class="new_comment_sec" id="komentar">
	<div class="container">
		<div class="col-sm-12">
			<div class="card card-body">
				<h2 class="card-title">Hitri pregled - ocena zaposlitve</h2>
				<div class="question_answers">
				   
				</div>
			
				
			</div>
		</div>
	</div>
</div>

<div class="new_comment_sec" id="placa">
	<div class="container">
		<div class="col-sm-12">
			<div class="card card-body">
				<h2 class="card-title">Hitri pregled - delovno mesto in plača</h2>
				<div class="salaries_data">

				   
				</div>
			
				
			</div>
		</div>
	</div>
</div>

<div class="comment_sec">
    
   
</div>

 @foreach($company_details->comments as $singleCompanyComments)

 @php $Response = $singleCompanyComments->full_response @endphp
                        <div class="modal view_modal" id="view_model{{$singleCompanyComments->id}}" role="dialog" tabindex="-1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Podrobnosti komentarja</h5><button class="close">×</button>
                                    </div>
                                    <div class="modal-body reduced">
										<ul>
											<p>Kdaj ste nazadnje delali v tem podjetju ? <b>{{$Response['last_time_worked']}}</b></p>
											<p>Kako ocenjujete zaposlitev ? <b>{{$Response['company_rate']==null ? '--' : $Response['company_rate']}}</b> </p>
											<p>Ali je plačilo pošteno ? <b>{{$Response['paid_fairly']}}</b></p>
											<p>Ali dobivate redno plačilo ? <b>{{$Response['regular_salary']}}</b></p>
											<p>Ali imate možnost napredovanja pri plači ? <b>{{$Response['full_amount_salary']}}</b> </p>
											<p>Katere možnosti zaposlitve podjetje ponuja ? (izberete lahko več odgovorov) <b>{{ $Response['regular_fairly']==null ? '--' : implode(', ',$Response['regular_fairly']) }}</b> </p>
											<p>Katero obliko zaposlitve imate? <b>{{$Response['employement_type']==null ? '--' : $Response['employement_type'] }}</b></p>
											<p>Višina mesečne neto plače v EUR (izberi/napiši določen znesek) <b>{{$Response['amount']==null ? '--' : $Response['amount'] }}</b></p>
											<p>Na katerem delovnem mestu ste zaposleni ? <b>{{$Response['position']==null ? '--' : $Response['position'] }}</b></p>
											<p>V kateri regiji ste zaposleni ? <b>{{$Response['region_live']}}</b></p>
											<p>Koliko ur na dan ste povrečno v službi ? <b>{{$Response['spend_hours']}}</b></p>
											<p>Ali delate za vikende ? (sobota ali nedelja) <b>{{$Response['weekend_works']}}</b></p>
											<p>Kako ste zadovoljni s svojo plačo ? (ocena 1-10) <b>{{$Response['annual_satisfaction']}}</b></p>
											<p>Kako ste zadovoljni z delom direktorja ? (ocena 1-10) <b>{{$Response['director_rate']}}</b></p>
											<p>Na kratko opišite podjetje <b>{{$Response['describe_company']==null ? '--' : $Response['describe_company']}}</b></p>
											<p>Kako ste zadovoljni z vodenjem podjetja ? (ocena 1-10) <b>{{$Response['management_rate']}}</b></p>
											<p>Kaj bi predlagali vodstvu ? <b>{{$Response['management_advice']==null ? '--' : $Response['management_advice']}}</b></p>
											<p>Kako ste zadovoljni z lastnikom podjetja ? (ocena 1-10) <b>{{isset($Response['ceo_rate']) ? $Response['ceo_rate'] : '--'}}</b></p>
											<p>Kako ste zadovoljni s sodelavci ? (ocena 1-10) <b>{{$Response['colleague_rate']}}</b></p>
											<p>Koliko delovnih izkušenj imate ? <b>{{$Response['experience']}}</b></p>
											<p>Ali ima podjetje svetlo prihodnost ? <b>{{$Response['bright_future']}}</b> </p>
											<p>Kakšno je vaše delo ? <b>{{$Response['your_job']}}</b></p>
											<p>Ali je vaše delovno okolje pozitivno ? <b>{{$Response['environment_positive']}}</b></p>
											<p>Kaj bi pohvalili ? <b>{{$Response['good_stuff']==null ? '--' : $Response['good_stuff'] }}</b></p>
											<p>Ali radi prihajate na delo ? <b>{{$Response['generally_satisfied']}}</b></p>
											<p>Ali podjetje plačuje potne stroške ? <b>{{$Response['travel_expenses']}}</b></p>
											<p>S čim niste zadovoljni v podjetju ? <b>{{$Response['bad_things']==null ? '--' : $Response['bad_things'] }}</b></p>
											<p>Ali vam podjetje plačuje izobraževanja ? (učenje tujih jezikov, pridobitev certifikatov …) <b>{{$Response['paid_prof']}}</b></p>
											<p>Ali imate plačane nadure ? <b>{{isset($Response['imate_place']) ? $Response['imate_place'] : '--'}}</b></p>
										</ul>
                                    </div>
                                    <div class="modal-footer"></div>
                                </div>
                            </div>
                        </div>
        @endforeach

<div class="single_news">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
				<a class="back_login" href="{{route('home')}}">Nazaj na glavno stran</a>
			</div>
		</div>
	</div>
</div>

@stop