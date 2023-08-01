@extends('layouts.frontend')
<!-- Main Page -- Meta Tags -->
@section('meta_tags')
<title>Test- Preveri Podjetje - Anonimno oceni zaposlitev</title>
<meta name="description" content="Preveri ali oceni delodajalce glede zaposlitve. Popolnoma anonimno in brez registracije !">
<meta name="keywords" content="preveri podjetje, zaposlitev,  ocena zaposlitve,  mnenje, ocena, anonimna ocena zaposlitve, preveri zaposlitev, delodajalec, zaposleni, delavec, delo, delovno mesto">
@endsection
@section('content')

<!-- Banner Area  -->
<div class="banner">
    <div class="card text-white">
        <img alt="Home Page Banner" src="{{ asset('images/meeting-conferences-package.jpg') }}" class="card-img">
        <div class="card-img-overlay">
            <div class="container">

                <h1 class="card-text"><span>Anonimno oceni zaposlitev</span>Preveri, kaj pravijo zaposleni

                    <!-- Search Companies Area -->
                    {{ Form::open(['route' => 'search_company', 'method' => 'POST','id'=>'filter_company_data_form']) }}

                    <div class="input-group add_search_data">
						<input type="text" name="title" autocomplete="off" placeholder="Primer: mercator" id="search" class="form-control noEnterSubmit" placeholder="Enter Blog Title Here" required>
                        <button type="button" class="btn btn-secondary" id="filter_company_data">Iskanje</button>
                    </div>
                    {{ Form::close() }}

                    <div class="text_description">
                        <p>Za lažje iskanje uporabite dolgi naziv podjetja</p>
                        <p>Dolgi naziv najdete na <a href="https://www.ajpes.si/" target="_blank" rel="nofollow">www.ajpes.si</a> </p>
                    </div>
                </h1>
            </div>
        </div>
    </div>

    <!-- Trigger Comment Modal  Start-->
    <button type="button" class="addcomment btn btn-secondary" data-toggle="modal" data-target="#myModal">Dodaj komentar</button>
    <button type="button" class="bottom_scroll"><img src="{{ asset('images/arrow_down_optimized.png') }}" alt="arrow_down"></button>
    <!-- Trigger Comment Modal  End-->

</div>

<!-- Spinner  Start-->
<div id="overlay">
    <div class="cv-spinner"></div>
</div>
<!-- Spinner End -->

<!-- Review Section Start-->
<div class="review">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card card-body">
                    <div class="review_image">
                        @if(isset($random_selected_company->logo))
                        <img src="{{ backend_asset('company_images/'.$random_selected_company->logo) }}" width="20%" class="card-img-top" alt="{{$random_selected_company->title}}">
                        @endif
                    </div>
                    <div class="review_detail">
                        <h5 class="card-title">Naključno izbrano podjetje</h5>
                        <p class="card-text">
                            @if(isset($random_selected_company->slug) && isset($random_selected_company->title))

                            <a href="{{route('podjetja').'/'.$random_selected_company->slug}}">{{$random_selected_company->title}} </a>
                            @endif
                        <div class="dv-star-rating" style="display: inline-block; position: relative;">
                            @for($i=1; $i<=$ratingcount; $i++) @if($random_selected_company->rating < $i) <label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(0,0,0);">
                                    <i style="font-style: normal;">★</i>
                                    </label>
                                    @else
                                    <label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i>
                                    </label>

                                    @endif
                                    @endfor
                        </div>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card card-body">
                    <div class="review_image">
                        @if(isset($last_comment->company->logo))
                        <img src="{{ backend_asset('company_images/'.$last_comment->company->logo) }}" width="20%" class="card-img-top" alt="{{$last_comment->company->title}}">
                        @endif
                    </div>
                    <div class="review_detail">
                        <h5 class="card-title">Zadnji komentar zaposlitve</h5>
                        <p class="card-text">
                            @if(isset($last_comment->company->slug) && isset($last_comment->company->title))
                            <a href="{{route('podjetja').'/'.$last_comment->company->slug}}">{{$last_comment->company->title}}
                                @endif
                            </a>
                        <div class="dv-star-rating" style="display: inline-block; position: relative;">
                            @for($i=1; $i<=$ratingcount; $i++) @if($last_comment->company->rating < $i) <label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(0,0,0);">
                                    <i style="font-style: normal;">★</i>
                                    </label>
                                    @else
                                    <label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);">
                                        <i style="font-style: normal;">★</i>
                                    </label>
                                    @endif
                                    @endfor
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-body">
                    <div class="review_image">
                        @if(isset($last_salary_comment->company->logo))
                        <img src="{{ backend_asset('company_images/'.$last_salary_comment->company->logo) }}" width="20%" class="card-img-top" alt="{{$last_salary_comment->company->title}}">
                        @endif
                    </div>
                    <div class="review_detail">
                        <h5 class="card-title">Zadnji komentar o plači</h5>
                        <p class="card-text">
                            @if(isset($last_salary_comment->company->slug) && isset($last_salary_comment->company->title))
                            <a href="{{route('podjetja').'/'.$last_salary_comment->company->slug}}">{{$last_salary_comment->company->title}} </a>
                            @endif
                        <div class="dv-star-rating" style="display: inline-block; position: relative;">

                            @for($i=1; $i<=$ratingcount; $i++) @if($last_salary_comment->company->rating < $i) <label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);">
                                    <i style="font-style: normal;">★</i>
                                    </label>
                                    @else
                                    <label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i>
                                    </label>
                                    @endif
                                    @endfor
                        </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Review Section End-->


<!-- Home Page Section Start-->
<div class="service">
    <div class="container">
        <ul class="owl-carousel owl-theme owl-1" style="transition: none 0s ease 0s; overflow: unset; ">
            @php $i = 0; @endphp
            @foreach($home_page_sections as $singleSection)
            <li data-index="{{$i}}" aria-hidden="true" class="item">
                <div class="card card-body">
                    <div class="carusal_image">
                        <img alt="{{$singleSection['title']}}" src="{{ backend_asset('home_images/'.$singleSection->image) }}" class="card-img-top">
                    </div>
                    <div class="carusal_text">
                        <h3 class="card-title">{{$singleSection['title']}}</h3>
                        <div class="short_desc" id="short_desc_{{$singleSection['id']}}">
                            {!! substr($singleSection->short_description,0,$singleSection->sub_str) !!}
                        </div>
                        <div class="short_full_desc hide" id="short_full_desc_{{$singleSection['id']}}">
                            {!! $singleSection->short_description !!}
                        </div>
                        <span class="short_desc_full_click show" id="short_desc_full_click_{{$singleSection['id']}}" style="cursor: pointer;">Preberi več</span>

                        <span class="short_desc_click hide" id="short_desc_click_{{$singleSection['id']}}" style="cursor: pointer;">Prikaži manj</span>
                    </div>
                </div>
            </li>
            @php $i++; @endphp
            @endforeach
        </ul>
    </div>
</div>
<!-- Home Page Section End-->


<!-- Top Companies Section Start-->
<div class="top_companies">
    <div class="container">
        <h3 class="card-title"><a href="{{route('dobra-zaposlitev')}}">Dobro ocenjene zaposlitve</a></h3>
        <ul class="owl-carousel owl-theme owl-2" style="transition: none 0s ease 0s; overflow: unset; ">
            @php $i = 0; @endphp
            @foreach($top_companies as $singleTopCompany)
            <li data-index="0" aria-hidden="true" class="item">
                <div class="card card-body">
                    <div class="carusal_image">
                        @if(isset($singleTopCompany['logo']))
                        <img alt="{{$singleTopCompany['title']}}" src="{{ backend_asset('company_images/'.$singleTopCompany['logo']) }}" class="card-img-top">
                        @endif
                    </div>
                    <div class="carusal_text">
                        <a href="{{route('podjetja').'/'.$singleTopCompany['slug']}}">
                            <h3 class="card-title">{{$singleTopCompany['title']}}</h3>
                        </a>
                        <div class="dv-star-rating" style="display: inline-block; position: relative;">
                            @for($i=1; $i<=$ratingcount; $i++) @if($singleTopCompany['rating'] < $i) <label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);">
                                <i style="font-style: normal;">★</i>
                                </label>
                                @else
                                <label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);">
                                    <i style="font-style: normal;">★</i>
                                </label>
                                @endif
                                @endfor
                        </div>
                    </div>
                </div>
            </li>
            @php $i++; @endphp
            @endforeach
        </ul>
    </div>
</div>
<!-- Top Companies Section End-->

<!-- Videos Section Start-->
<div class="service vid">
    <div class="container-fluid">
		<h3 class="card-title"><a href="{{route('dobra-zaposlitev')}}">Video vsebina</a></h3>
        <ul class="owl-carousel owl-theme owl-4" style="transition: none 0s ease 0s; overflow: unset; ">
            @php $i = 0; @endphp
            @foreach($popular_videos as $popular_video)
            <li data-index="{{$i}}" aria-hidden="true" class="item">               
				<div class="exampleVideoPage">
					<div class="myVideo" id="my_video{{$i}}" data-video="{{backend_asset('videos'.'/'.$popular_video->video)}}" data-poster="{{backend_asset('images'.'/'.$popular_video->thumbnail)}}" data-type='video/mp4'></div>
				</div>            
            </li>
            @php $i++; @endphp
            @endforeach
        </ul>
    </div>
</div>
<!-- Videos Section End-->


@stop