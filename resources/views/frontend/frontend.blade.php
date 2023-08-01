<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#000000">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet ">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- <link rel="stylesheet" href="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.css"> -->
    @yield('meta_tags')
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <meta name="robots" content="noindex">
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css">

    <script src="//code.jquery.com/jquery-3.2.1.min.js">
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js'></script> 
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>


<body>

  
    <div class="{{Route::currentRouteName()}}">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container">
                <div class="navbar-brand">
                    <a aria-current="page" class="active" href="{{route('home')}}"><img src="{{ asset('images/logo.png') }}" alt="preveri" width="100"></a>
                </div><button aria-label="Toggle navigation" type="button" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse">
                    <ul class="me-2 navbar-nav">
                        <li class="nav-item"><a class="" href="{{route('podjetja')}}">Kakšna so podjetja?</a></li>
                        <li class="nav-item"><a class="" href="{{route('novice')}}">Novice</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-muted card-footer">
                            <a aria-current="page" class="active" href="/"><img src="{{ asset('images/logo.png') }}" alt="preveri"></a>
                            <p>
                            <p>Korak do boljše zaposlitve !</p>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h3>Bližnjice</h3>
                        <ul class="nav flex-column"><a class="" href="{{route('o-nas')}}">O nas</a><a class="" href="{{route('pogoji-uporabe')}}">Pogoji uporabe</a><a class="" href="{{route('politika-zasebnosti')}}">Politika zasebnosti</a><a class="" href="{{route('piskotki')}}">Piškotki</a></ul>
                    </div>
                    <div class="col-sm-4">
                        <h3>Prijava na novice</h3>
                        <p>
                        <p>S prijavo na novice se strinjate z našimi pogoji uporabe.</p>
                        </p>
                        <div class="alert newsletter_alert"></div>
                        {{ Form::open(['route' => 'add_newsletter_data', 'method' => 'post', 'id'=>'newsletter_form']) }}

                        <input id="newsletter_Email" name="email" placeholder="Vnesi e-naslov" type="email" class="form-control" aria-invalid="false">
                        <button type="button" class="btn btn-warning" id="submit_newsletter_form">Potrdi</button>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>

        <div class="CookieConsent" id="cookieNotice">
        <div>
			<p>Spletno mesto uporablja piškotke, s katerimi izboljšujemo uporabniško izkušnjo. <a class="" href="{{ route('piskotki') }}"> Preberi več</a></p>
			<button style="background: rgb(255, 212, 45) none repeat scroll 0% 0%; border: 0px none; border-radius: 0px; box-shadow: none; color: black; cursor: pointer; flex: 0 0 auto; padding: 5px 10px;" class="" onclick="acceptCookieConsent();" aria-label="Accept cookies">Strinjam se</button>
		</div>
	</div>

    </div>
</body>

</html>

<!-- Start Modal-->

<div class="modal add_comment_modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vprašalnik</h5><button class="close">×</button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="stepwizard" style="display: none;">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-0" type="button" class="btn btn-circle btn-default btn-success">1</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-1" type="button" class="btn btn-default btn-circle">2</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">8</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-8" type="button" class="btn btn-default btn-circle" disabled="disabled">9</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-9" type="button" class="btn btn-default btn-circle" disabled="disabled">10</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-10" type="button" class="btn btn-default btn-circle" disabled="disabled">11</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-11" type="button" class="btn btn-default btn-circle" disabled="disabled">12</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-12" type="button" class="btn btn-default btn-circle" disabled="disabled">13</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-13" type="button" class="btn btn-default btn-circle" disabled="disabled">14</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-14" type="button" class="btn btn-default btn-circle" disabled="disabled">15</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-15" type="button" class="btn btn-default btn-circle" disabled="disabled">16</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-16" type="button" class="btn btn-default btn-circle" disabled="disabled">17</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-17" type="button" class="btn btn-default btn-circle" disabled="disabled">18</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-18" type="button" class="btn btn-default btn-circle" disabled="disabled">19</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-19" type="button" class="btn btn-default btn-circle" disabled="disabled">20</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-20" type="button" class="btn btn-default btn-circle" disabled="disabled">21</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-21" type="button" class="btn btn-default btn-circle" disabled="disabled">22</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-22" type="button" class="btn btn-default btn-circle" disabled="disabled">23</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-23" type="button" class="btn btn-default btn-circle" disabled="disabled">24</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-24" type="button" class="btn btn-default btn-circle" disabled="disabled">25</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-25" type="button" class="btn btn-default btn-circle" disabled="disabled">26</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-26" type="button" class="btn btn-default btn-circle" disabled="disabled">27</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-27" type="button" class="btn btn-default btn-circle" disabled="disabled">28</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-28" type="button" class="btn btn-default btn-circle" disabled="disabled">29</a>
                            </div>
                            <div class="stepwizard-step col-xs-3">
                                <a href="#step-29" type="button" class="btn btn-default btn-circle" disabled="disabled">30</a>
                            </div>
                        </div>
                    </div>
                    {{ Form::open(['route' => 'commentSubmit', 'method' => 'post', 'id'=>'comment_form']) }}

                    <div class="rsw_2Y">
                        @if(Route::currentRouteName() !== 'podjetja/{slug}')
                        <div class="rsw_2f  setup-content" id="step-0">
                            <div class="mb-3">
                                <p>Katero podjetje želite oceniti ?</p>

                                <div class="select-cnt">

                                    <select class="js-data-example-ajaxs" name="keyword" required>
                                        <option value=''>- Search -</option>
                                    </select>
                                    <div class="select-arrow">
                                    </div>
                                </div>
                                <input type="hidden" name="type" value="home">

                                <label id="company_select_error" class="text-danger form-label" style="display:none"></label>

                                <button type="button" class="btn btn-secondary nextBtn">Potrdi</button>
                            </div>
                            <hr>
                            <p> Oddajanje komentarja o zaposlitvi je popolnoma varno. Vse informacije so zaščitene in anonimne. Z oddajo komentarja se strinjate s <a href="{{ route('pogoji-uporabe') }}">splošnimi pogoji poslovanja</a> in <a href="{{route('politika-zasebnosti') }}">politiko zasebnosti</a>.</p>
                        </div>
                        @else

                        <input type="hidden" name="keyword" value="{{request()->slug}}">
                        <input type="hidden" name="type" value="company">

                        @endif
                        <div class="rsw_2f setup-content" id="step-1" style="{{ Route::currentRouteName() == 'podjetja/{slug}' ? 'display:block' : 'display:none' }}">
                            <div class="mb-3">
                                <p>1. Kdaj ste nazadnje delali v tem podjetju ?</p>
                                <input name="last_time_worked" id="Trenutno zaposlen" type="radio" class="form-check-input" value="Trenutno zaposlen">
                                <label class="form-label nextBtn" for="Trenutno zaposlen">Trenutno zaposlen</label>

                                <input name="last_time_worked" type="radio" id="2022" class="form-check-input" value="2022">
                                <label class="form-label nextBtn" for="2022">2022</label>

                                <input name="last_time_worked" type="radio" id="2021" class="form-check-input" value="2021">
                                <label class="form-label nextBtn" for="2021">2021</label>

                                <input name="last_time_worked" type="radio" id="2020" class="form-check-input" value="2020">
                                <label class="form-label nextBtn" for="2020">2020</label>

                                <input name="last_time_worked" type="radio" id="Pred_2020" class="form-check-input" value="Pred 2020"><label class="form-label nextBtn" for="Pred_2020">Pred 2020</label>

                                <input name="last_time_worked" type="radio" class="form-check-input" id="Nikoli" value="Nikoli">
                                <label class="form-label nextBtn" for="Nikoli">Nikoli</label>

                                <hr>
                                <p>1/29</p>
                                @if(Route::currentRouteName() !== 'podjetja/{slug}')
                                <span class="back_btn"> Nazaj</span>
                                @else
                                <p> Oddajanje komentarja o zaposlitvi je popolnoma varno. Vse informacije so zaščitene in anonimne. Z oddajo komentarja se strinjate s <a href="/pogoji-uporabe">splošnimi pogoji poslovanja</a> in <a href="/politika-zasebnosti">politiko zasebnosti</a>.</p>
                                @endif
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-2" style="display: none;">
                            <div class="mb-3">
                                <p>2. Kako ocenjujete zaposlitev ?</p>
                                <input name="company_rate" type="radio" class="form-check-input" id="company_rate1" value="Zelo slabo">
                                <label class="form-label nextBtn" for="company_rate1">Zelo slabo</label>

                                <input name="company_rate" type="radio" class="form-check-input" id="company_rate2" value="Slabo">
                                <label class="form-label nextBtn" for="company_rate2">Slabo</label>

                                <input name="company_rate" type="radio" class="form-check-input" id="company_rate3" value="Niti slabo - niti dobro">
                                <label class="form-label nextBtn" for="company_rate3">Niti slabo - niti dobro</label>

                                <input name="company_rate" type="radio" class="form-check-input" id="company_rate4" value="Dobro">
                                <label class="form-label nextBtn" for="company_rate4">Dobro</label>

                                <input name="company_rate" type="radio" class="form-check-input" id="company_rate5" value="Odlično">
                                <label class="form-label nextBtn" for="company_rate5">Odlično</label>

                                <hr>
                                <p>2/29</p><span class="back_btn"> Nazaj </span>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-3" style="display: none;">
                            <div class="mb-3">
                                <p>3. Ali je plačilo pošteno ?</p>
                                <input name="paid_fairly" type="radio" class="form-check-input" id="paid_fairly1" value="Da">
                                <label class="form-label nextBtn" for="paid_fairly1">Da</label>

                                <input name="paid_fairly" type="radio" class="form-check-input" id="paid_fairly2" value="Ne">
                                <label class="form-label nextBtn" for="paid_fairly2">Ne</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>3/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-4" style="display: none;">
                            <div class="mb-3">4. Ali dobivate redno plačilo ?
                                <input name="regular_salary" type="radio" class="form-check-input" id="regular_salary1" value="Da">
                                <label class="form-label nextBtn" for="regular_salary1">Da</label>

                                <input name="regular_salary" type="radio" class="form-check-input" id="regular_salary2" value="Ne">
                                <label class="form-label nextBtn" for="regular_salary2">Ne</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>4/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-5" style="display: none;">
                            <div class="mb-3">5. Ali imate možnost napredovanja pri plači ?
                                <input name="full_amount_salary" type="radio" class="form-check-input" id="full_amount_salary1" value="Da">
                                <label class="form-label nextBtn" for="full_amount_salary1">Da</label>

                                <input name="full_amount_salary" type="radio" class="form-check-input" id="full_amount_salary2" value="Ne">
                                <label class="form-label nextBtn" for="full_amount_salary2">Ne</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>5/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-6" style="display: none;">
                            <div class="mb-3">6. Katere možnosti zaposlitve podjetje ponuja ? (izberete lahko več odgovorov)
                                <input name="regular_fairly[]" type="checkbox" class="form-check-input" id="regular_fairly1" value="Pogodba o zaposlitvi">
                                <label class="form-label regular_fairly_label" for="regular_fairly1">Pogodba o zaposlitvi</label>

                                <input name="regular_fairly[]" type="checkbox" class="form-check-input" id="regular_fairly2" value="Preko S.P.">
                                <label class="form-label regular_fairly_label" for="regular_fairly2">Preko S.P.</label>

                                <input name="regular_fairly[]" type="checkbox" class="form-check-input" value="Študentsko delo" id="regular_fairly3">
                                <label class="form-label regular_fairly_label" for="regular_fairly3">Študentsko delo</label>

                                <input name="regular_fairly[]" type="checkbox" class="form-check-input" id="regular_fairly4" value="Drugo">
                                <label class="form-label regular_fairly_label" for="regular_fairly4">Drugo</label>

                                <div class="invalid-feedback" id="regular_fairly_error" style="display:none"></div>
                                <hr>
                                <button type="button" class="btn btn-secondary nextBtn">Potrdi</button>
                                <span class="back_btn"> Nazaj </span>
                                <p>6/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-7" style="display: none;">
                            <div class="mb-3">7. Katero obliko zaposlitve imate?
                                <input name="employement_type" type="radio" class="form-check-input" id="employement_type1" value="Pogodba o zaposlitvi">
                                <label class="form-label nextBtn" for="employement_type1">Pogodba o zaposlitvi</label>

                                <input name="employement_type" type="radio" class="form-check-input" id="employement_type2" value="Preko S.P.">
                                <label class="form-label nextBtn" for="employement_type2">Preko S.P.</label>

                                <input name="employement_type" type="radio" class="form-check-input" id="employement_type3" value="Študentsko delo">
                                <label class="form-label nextBtn" for="employement_type3">Študentsko delo</label>

                                <input name="employement_type" type="radio" class="form-check-input" id="employement_type4" value="Drugo">
                                <label class="form-label nextBtn" for="employement_type4">Drugo</label>

                                <hr><span class="back_btn"> Nazaj </span>
                                <p>7/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-8" style="display: none;">
                            <div class="mb-3">8. Višina mesečne neto plače v EUR (izberi/napiši določen znesek)<br>
                                <input name="amount" pattern="^-?[0-9]\d*\.?\d*$" type="text" class="form-control" aria-invalid="false" value="">
                                <div class="invalid-feedback" id="select_amount_error" style="display: none;"></div>
                                <input name="select_amount" type="radio" class="form-check-input" id="select_amount1" value="500">
                                <label class="form-check-label" for="select_amount1">500</label>

                                <input name="select_amount" type="radio" class="form-check-input" id="select_amount2" value="800"> <label class="form-check-label" for="select_amount2">800</label>

                                <input name="select_amount" type="radio" class="form-check-input" id="select_amount3" value="1.000">
                                <label class="form-check-label" for="select_amount3">1.000</label>

                                <input name="select_amount" type="radio" class="form-check-input" id="select_amount4" value="1.200">
                                <label class="form-check-label" for="select_amount4">1.200</label>

                                <input name="select_amount" type="radio" class="form-check-input" id="select_amount5" value="1.500">
                                <label class="form-check-label" for="select_amount5">1.500</label>

                                <button type="button" class="btn btn-secondary nextBtn">Potrdi</button><span class="skip_btn nextBtn">Preskoči</span>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>8/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-9" style="display: none;">
                            <div class="mb-3">9. Na katerem delovnem mestu ste zaposleni ?<br>
                                <input name="position" placeholder="Primer: Administrator - Administracija" type="text" class="form-control" aria-invalid="false" value="">

                                <div class="invalid-feedback" id="select_position_error" style="display: none;"></div>
                                <button type="button" class="btn btn-secondary nextBtn">Potrdi</button>
                                <span class="skip_btn nextBtn">Preskoči</span>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>9/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-10" style="display: none;">
                            <div class="mb-3">10. V kateri regiji ste zaposleni ?
                                <input name="region_live" type="radio" class="form-check-input" id="region_live1" value="Goriška">
                                <label class="form-label nextBtn" for="region_live1">Goriška</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live2" value="Primorsko notranjska">
                                <label class="form-label nextBtn" for="region_live2">Primorsko notranjska</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live3" value="Osrednjeslovenska">
                                <label class="form-label nextBtn" for="region_live3">Osrednjeslovenska</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live4" value="Podravska">
                                <label class="form-label nextBtn" for="region_live4">Podravska</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live5" value="Koroška">
                                <label class="form-label nextBtn" for="region_live5">Koroška</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live6" value="Pomurska">
                                <label class="form-label nextBtn" for="region_live6">Pomurska</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live7" value="Posavska">
                                <label class="form-label nextBtn" for="region_live7">Posavska</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live8" value="Zasavska">
                                <label class="form-label nextBtn" for="region_live8">Zasavska</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live9" value="Obalno kraška">
                                <label class="form-label nextBtn" for="region_live9">Obalno kraška</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live10" value="Jugovzhodna Slovenija">
                                <label class="form-label nextBtn" for="region_live10">Jugovzhodna Slovenija</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live11" value="Savinjska">
                                <label class="form-label nextBtn" for="region_live11">Savinjska</label>

                                <input name="region_live" type="radio" class="form-check-input" id="region_live12" value="Gorenjska">
                                <label class="form-label nextBtn" for="region_live12">Gorenjska</label>

                                <hr><span class="back_btn"> Nazaj </span>
                                <p>10/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-11" style="display: none;">
                            <div class="mb-3">11. Koliko ur na dan ste povrečno v službi ?
                                <input name="spend_hours" type="radio" class="form-check-input" id="spend_hours1" value="Manj kot 6">
                                <label class="form-label nextBtn" for="spend_hours1">Manj kot 6</label>

                                <input name="spend_hours" type="radio" class="form-check-input" id="spend_hours2" value="7">
                                <label class="form-label nextBtn" for="spend_hours2">7</label>

                                <input name="spend_hours" type="radio" class="form-check-input" id="spend_hours3" value="8">
                                <label class="form-label nextBtn" for="spend_hours3">8</label>

                                <input name="spend_hours" type="radio" class="form-check-input" id="spend_hours4" value="9">
                                <label class="form-label nextBtn" for="spend_hours4">9</label>

                                <input name="spend_hours" type="radio" class="form-check-input" id="spend_hours5" value="10">
                                <label class="form-label nextBtn" for="spend_hours5">10</label>

                                <input name="spend_hours" type="radio" class="form-check-input" id="spend_hours6" value="11">
                                <label class="form-label nextBtn" for="spend_hours6">11</label>

                                <input name="spend_hours" type="radio" class="form-check-input" id="spend_hours7" value="12">
                                <label class="form-label nextBtn" for="spend_hours7">12</label>

                                <input name="spend_hours" type="radio" class="form-check-input" id="spend_hours8" value="Več kot 12">
                                <label class="form-label nextBtn" for="spend_hours8">Več kot 12</label>

                                <hr><span class="back_btn"> Nazaj </span>
                                <p>11/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-12" style="display: none;">
                            <div class="mb-3">12. Ali delate za vikende ? (sobota ali nedelja)
                                <input name="weekend_works" type="radio" class="form-check-input" id="weekend_works1" value="Da">
                                <label class="form-label nextBtn" for="weekend_works1">Da</label>

                                <input name="weekend_works" type="radio" class="form-check-input" id="weekend_works2" value="Ne">
                                <label class="form-label nextBtn" for="weekend_works2">Ne</label>

                                <input name="weekend_works" type="radio" class="form-check-input" id="weekend_works3" value="Občasno">
                                <label class="form-label nextBtn" for="weekend_works3">Občasno</label>

                                <hr><span class="back_btn"> Nazaj </span>
                                <p>12/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-13" style="display: none;">
                            <div class="mb-3">13. Kako ste zadovoljni s svojo plačo ? (ocena 1-10)
                                <input name="annual_satisfaction" type="radio" class="form-check-input" id="annual_satisfaction1" value="1 (sploh nisem zadovoljen)">
                                <label class="form-label nextBtn" for="annual_satisfaction1">1 (sploh nisem zadovoljen)</label>

                                <input name="annual_satisfaction" type="radio" class="form-check-input" id="annual_satisfaction2" value="2">
                                <label class="form-label nextBtn" for="annual_satisfaction2">2</label>

                                <input name="annual_satisfaction" type="radio" class="form-check-input" id="annual_satisfaction3" value="3">
                                <label class="form-label nextBtn" for="annual_satisfaction3">3</label>

                                <input name="annual_satisfaction" type="radio" class="form-check-input" id="annual_satisfaction4" value="4">
                                <label class="form-label nextBtn" for="annual_satisfaction4">4</label>

                                <input name="annual_satisfaction" type="radio" class="form-check-input" id="annual_satisfaction5" value="5">
                                <label class="form-label nextBtn" for="annual_satisfaction5">5</label>

                                <input name="annual_satisfaction" type="radio" class="form-check-input" id="annual_satisfaction6" value="6">
                                <label class="form-label nextBtn" for="annual_satisfaction6">6</label>

                                <input name="annual_satisfaction" type="radio" class="form-check-input" id="annual_satisfaction7" value="7">
                                <label class="form-label nextBtn" for="annual_satisfaction7">7</label>

                                <input name="annual_satisfaction" type="radio" class="form-check-input" id="annual_satisfaction8" value="8">
                                <label class="form-label nextBtn" for="annual_satisfaction8">8</label>

                                <input name="annual_satisfaction" type="radio" class="form-check-input" id="annual_satisfaction9" value="9">
                                <label class="form-label nextBtn" for="annual_satisfaction9">9</label>

                                <input name="annual_satisfaction" type="radio" class="form-check-input" id="annual_satisfaction10" value="10 (zelo zadovoljen)">
                                <label class="form-label nextBtn" for="annual_satisfaction10">10 (zelo zadovoljen)</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>13/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-14" style="display: none;">
                            <div class="mb-3">14. Kako ste zadovoljni z delom direktorja ? (ocena 1-10)
                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate1" value="1 (sploh nisem zadovoljen)">
                                <label class="form-label nextBtn" for="director_rate1">1 (sploh nisem zadovoljen)</label>

                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate2" value="2">
                                <label class="form-label nextBtn" for="director_rate2">2</label>

                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate3" value="3">
                                <label class="form-label nextBtn" for="director_rate3">3</label>

                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate4" value="4">
                                <label class="form-label nextBtn" for="director_rate4">4</label>

                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate5" value="5">
                                <label class="form-label nextBtn" for="director_rate5">5</label>

                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate6" value="6"><label class="form-label nextBtn" for="director_rate6">6</label>

                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate7" value="7">
                                <label class="form-label nextBtn" for="director_rate7">7</label>

                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate8" value="8">
                                <label class="form-label nextBtn" for="director_rate8">8</label>

                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate9" value="9">
                                <label class="form-label nextBtn" for="director_rate9">9</label>

                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate10" value="10 (zelo zadovoljen)">
                                <label class="form-label nextBtn" for="director_rate10">10 (zelo zadovoljen)</label>

                                <input name="director_rate" type="radio" class="form-check-input" id="director_rate11" value="Ga še nisem spoznal">
                                <label class="form-label nextBtn" for="director_rate11">Ga še nisem spoznal</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>14/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-15" style="display: none;">
                            <div class="mb-3">15. Na kratko opišite podjetje<br>
                                <input name="describe_company" type="text" class="form-control" aria-invalid="false" value="">
                                <p>Z nekaj besedami opišite podjetje oziroma zaposlitev.</p>
                                <div class="invalid-feedback" id="describe_company_error" style="display: none;"></div>
                                <button type="button" class="btn btn-secondary nextBtn">Potrdi</button>
                                <span class="skip_btn nextBtn">Preskoči</span>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>15/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-16" style="display: none;">
                            <div class="mb-3">16. Kako ste zadovoljni z vodenjem podjetja ? (ocena 1-10)
                                <input name="management_rate" type="radio" class="form-check-input" id="management_rate1" value="1 (sploh nisem zadovoljen)">
                                <label class="form-label nextBtn" for="management_rate1">1 (sploh nisem zadovoljen)</label>

                                <input name="management_rate" type="radio" class="form-check-input" id="management_rate2" value="2">
                                <label class="form-label nextBtn" for="management_rate2">2</label>

                                <input name="management_rate" type="radio" class="form-check-input" id="management_rate3" value="3">
                                <label class="form-label nextBtn" for="management_rate3">3</label>

                                <input name="management_rate" type="radio" class="form-check-input" id="management_rate4" value="4">
                                <label class="form-label nextBtn" for="management_rate4">4</label>

                                <input name="management_rate" type="radio" class="form-check-input" id="management_rate5" value="5">
                                <label class="form-label nextBtn" for="management_rate5">5</label>

                                <input name="management_rate" type="radio" class="form-check-input" id="management_rate6" value="6"><label class="form-label nextBtn" for="management_rate6">6</label>

                                <input name="management_rate" type="radio" class="form-check-input" id="management_rate7" value="7">
                                <label class="form-label nextBtn" for="management_rate7">7</label>

                                <input name="management_rate" type="radio" class="form-check-input" id="management_rate8" value="8">
                                <label class="form-label nextBtn" for="management_rate8">8</label>

                                <input name="management_rate" type="radio" class="form-check-input" id="management_rate9" value="9">
                                <label class="form-label nextBtn" for="management_rate9">9</label>

                                <input name="management_rate" type="radio" class="form-check-input" id="management_rate10" value="10 (zelo zadovoljen)">
                                <label class="form-label nextBtn" for="management_rate10">10 (zelo zadovoljen)</label>

                                <hr><span class="back_btn"> Nazaj </span>
                                <p>16/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-17" style="display: none;">
                            <div class="mb-3">17. Kaj bi predlagali vodstvu ?<br>
                                <input name="management_advice" type="text" class="form-control" aria-invalid="false" value="">
                                <p>Napišite predloge, kaj bi po vaše lahko odgovorne osebe izboljšale.</p>
                                <div class="invalid-feedback" id="management_advice_error" style="display: none;"></div>
                                <button type="button" class="btn btn-secondary nextBtn">Potrdi</button>
                                <span class="skip_btn nextBtn">Preskoči</span>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>17/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-18" style="display: none;">
                            <div class="mb-3">18. Kako ste zadovoljni z lastnikom podjetja ? (ocena 1-10)
                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate1" value="1 (sploh nisem zadovoljen)">
                                <label class="form-label nextBtn" for="ceo_rate1">1 (sploh nisem zadovoljen)</label>

                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate2" value="2">
                                <label class="form-label nextBtn" for="ceo_rate2">2</label>

                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate3" value="3">
                                <label class="form-label nextBtn" for="ceo_rate3">3</label>

                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate4" value="4">
                                <label class="form-label nextBtn" for="ceo_rate4">4</label>

                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate5" value="5">
                                <label class="form-label nextBtn" id="ceo_rate5">5</label>

                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate6" value="6">
                                <label class="form-label nextBtn" for="ceo_rate6">6</label>

                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate7" value="7">
                                <label class="form-label nextBtn" for="ceo_rate7">7</label>

                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate8" value="8">
                                <label class="form-label nextBtn" for="ceo_rate8">8</label>

                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate9" value="9">
                                <label class="form-label nextBtn" for="ceo_rate9">9</label>

                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate10" value="10 (zelo zadovoljen)"><label class="form-label nextBtn" for="ceo_rate10">10 (zelo zadovoljen)</label>

                                <input name="ceo_rate" type="radio" class="form-check-input" id="ceo_rate11" value="Ga še nisem spoznal">
                                <label class="form-label nextBtn" for="ceo_rate11">Ga še nisem spoznal</label>

                                <hr><span class="back_btn"> Nazaj </span>
                                <p>18/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-19" style="display: none;">
                            <div class="mb-3">19. Kako ste zadovoljni s sodelavci ? (ocena 1-10)
                                <input name="colleague_rate" type="radio" class="form-check-input" id="colleague_rate1" value="1 (sploh nisem zadovoljen)">
                                <label class="form-label nextBtn" for="colleague_rate1">1 (sploh nisem zadovoljen)</label>

                                <input name="colleague_rate" type="radio" class="form-check-input" id="colleague_rate2" value="2">
                                <label class="form-label nextBtn" for="colleague_rate2">2</label>

                                <input name="colleague_rate" type="radio" class="form-check-input" id="colleague_rate3" value="3">
                                <label class="form-label nextBtn" for="colleague_rate3">3</label>

                                <input name="colleague_rate" type="radio" class="form-check-input" id="colleague_rate4" value="4">
                                <label class="form-label nextBtn" for="colleague_rate4">4</label>

                                <input name="colleague_rate" type="radio" class="form-check-input" id="colleague_rate5" value="5">
                                <label class="form-label nextBtn" for="colleague_rate5">5</label>

                                <input name="colleague_rate" type="radio" class="form-check-input" id="colleague_rate6" value="6">
                                <label class="form-label nextBtn" for="colleague_rate6">6</label>

                                <input name="colleague_rate" type="radio" class="form-check-input" id="colleague_rate7" value="7">
                                <label class="form-label nextBtn" for="colleague_rate7">7</label>

                                <input name="colleague_rate" type="radio" class="form-check-input" id="colleague_rate8" value="8">
                                <label class="form-label nextBtn" for="colleague_rate8">8</label>

                                <input name="colleague_rate" type="radio" class="form-check-input" id="colleague_rate9" value="9">
                                <label class="form-label nextBtn" for="colleague_rate9">9</label>

                                <input name="colleague_rate" type="radio" class="form-check-input" id="colleague_rate10" value="10 (zelo zadovoljen)">
                                <label class="form-label nextBtn" for="colleague_rate10">10 (zelo zadovoljen)</label>
                                <hr>
                                <p>19/29</p><span class="back_btn"> Nazaj </span>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-20" style="display: none;">
                            <div class="mb-3">20. Koliko delovnih izkušenj imate ?
                                <input name="experience" type="radio" class="form-check-input" id="experience1" value="Manj kot 1 leto">
                                <label class="form-label nextBtn" for="experience1">Manj kot 1 leto</label>

                                <input name="experience" type="radio" class="form-check-input" id="experience2" value="1-2 leti">
                                <label class="form-label nextBtn" for="experience2">1-2 leti</label>

                                <input name="experience" type="radio" class="form-check-input" id="experience3" value="2-4 let">
                                <label class="form-label nextBtn" for="experience3">2-4 let</label>

                                <input name="experience" type="radio" class="form-check-input" id="experience4" value="4-6 let">
                                <label class="form-label nextBtn" for="experience4">4-6 let</label>

                                <input name="experience" type="radio" class="form-check-input" id="experience5" value="6-10 let">
                                <label class="form-label nextBtn" for="experience5">6-10 let</label>

                                <input name="experience" type="radio" class="form-check-input" id="experience6" value="10+ let">
                                <label class="form-label nextBtn" for="experience6">10+ let</label>

                                <hr><span class="back_btn"> Nazaj </span>
                                <p>20/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-21" style="display: none;">
                            <div class="mb-3">21. Ali ima podjetje svetlo prihodnost ?
                                <input name="bright_future" type="radio" class="form-check-input" id="bright_future_Da" value="Da">
                                <label class="form-label nextBtn" for="bright_future_Da">Da</label>

                                <input name="bright_future" type="radio" class="form-check-input" id="bright_future_Ne" value="Ne">
                                <label class="form-label nextBtn" for="bright_future_Ne">Ne</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>21/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-22" style="display: none;">
                            <div class="mb-3">22. Kakšno je vaše delo ?
                                <input name="your_job" type="radio" class="form-check-input" id="your_job1" value="Zelo enostavno">
                                <label class="form-label nextBtn" for="your_job1">Zelo enostavno</label>

                                <input name="your_job" type="radio" class="form-check-input" id="your_job2" value="Enostavno">
                                <label class="form-label nextBtn" for="your_job2">Enostavno</label>

                                <input name="your_job" type="radio" class="form-check-input" id="your_job3" value="Povprečno">
                                <label class="form-label nextBtn" for="your_job3">Povprečno</label>

                                <input name="your_job" type="radio" class="form-check-input" id="your_job4" value="Težko">
                                <label class="form-label nextBtn" for="your_job4">Težko</label>

                                <input name="your_job" type="radio" class="form-check-input" id="your_job5" value="Zelo težko">
                                <label class="form-label nextBtn" for="your_job5">Zelo težko</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>22/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-23" style="display: none;">
                            <div class="mb-3">23. Ali je vaše delovno okolje pozitivno ?
                                <input name="environment_positive" type="radio" class="form-check-input" id="environment_positiveDa" value="Da">
                                <label class="form-label nextBtn" for="environment_positiveDa">Da</label>

                                <input name="environment_positive" type="radio" class="form-check-input" id="environment_positiveNe" value="Ne">
                                <label class="form-label nextBtn" for="environment_positiveNe">Ne</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>23/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-24" style="display: none;">
                            <div class="mb-3">24. Kaj bi pohvalili ?<br>

                                <input name="good_stuff" type="text" class="form-control" aria-invalid="false" value="">
                                <div class="invalid-feedback" id="good_stuff_error" style="display: none;"></div>

                                <button type="button" class="btn btn-secondary nextBtn">Potrdi</button>

                                <span class="skip_btn nextBtn">Preskoči</span>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>24/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-25" style="display: none;">
                            <div class="mb-3">25. Ali radi prihajate na delo ?

                                <input name="generally_satisfied" type="radio" class="form-check-input" id="generally_satisfied1" value="Da">
                                <label class="form-label nextBtn" for="generally_satisfied1">Da</label>

                                <input name="generally_satisfied" type="radio" class="form-check-input" id="generally_satisfied2" value="Ne">
                                <label class="form-label nextBtn" for="generally_satisfied2">Ne</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>25/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-26" style="display: none;">
                            <div class="mb-3">26. Ali podjetje plačuje potne stroške ?
                                <input name="travel_expenses" type="radio" class="form-check-input" id="travel_expenses1" value="Da">
                                <label class="form-label nextBtn" for="travel_expenses1">Da</label>

                                <input name="travel_expenses" type="radio" class="form-check-input" id="travel_expenses2" value="Ne">
                                <label class="form-label nextBtn" for="travel_expenses2">Ne</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>26/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-27" style="display: none;">
                            <div class="mb-3">27. S čim niste zadovoljni v podjetju ?<br>
                                <input name="bad_things" type="text" class="form-control" aria-invalid="false" value="">
                                <p>Napišite, kateri so minusi podjetja</p>
                                <div class="invalid-feedback" id="bad_things_error" style="display:none;"></div>
                                <button type="button" class="btn btn-secondary nextBtn">Potrdi</button>
                                <span class="skip_btn nextBtn">Preskoči</span>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>27/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-28" style="display: none;">
                            <div class="mb-3">28. Ali vam podjetje plačuje izobraževanja ? (učenje tujih jezikov, pridobitev certifikatov …)
                                <input name="paid_prof" type="radio" class="form-check-input" id="paid_prof1" value="Da">
                                <label class="form-label nextBtn" for="paid_prof1">Da</label>

                                <input name="paid_prof" type="radio" class="form-check-input" id="paid_prof2" value="Ne"><label class="form-label nextBtn" for="paid_prof2">Ne</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>28/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-29" style="display: none;">
                            <div class="mb-3">29. Ali imate plačane nadure ?
                                <p style="color: red;" id="imate_place_error" style="display:none"></p>
                                <div style="display:none;" id="imate_place_success" class="alert alert-success"></div>

                                <input name="imate_place" type="radio" class="form-check-input" id="imate_place1" value="Da">
                                <label class="form-label nextBtnSubmit" for="imate_place1">Da</label>

                                <input name="imate_place" type="radio" class="form-check-input" id="imate_place2" value="Ne">
                                <label class="form-label nextBtnSubmit" for="imate_place2">Ne</label>

                                <input name="imate_place" type="radio" class="form-check-input" id="imate_place3" value="Dogovor glede porabe nadur">
                                <label class="form-label nextBtnSubmit" for="imate_place3">Dogovor glede porabe nadur</label>
                                <hr>
                                <div class="last_check">
                                    <input type="checkbox" name="verify">
                                    <label>Pred oddajo komentarja je uporabnik prebral Splošne pogoje poslovanja in Politiko zasebnosti Portala in se z obema izrecno strinja. </label>
                                </div>
                                <span class="back_btn"> Nazaj </span>
                                <p>29/29</p>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}

                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- end modal -->

<script>
    const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };


    $('#filter_company_data').on('click', function(e) {
        e.preventDefault();

        var Title = $('form#filter_company_data_form input[name="title"]').val();
        if (Title != '') {
            var Totallength = Title.length;

            if (Totallength >= 3) {
                $('form#filter_company_data_form input[name="title"]').removeClass('is-invalid');

                $("#overlay").fadeIn(300);

                // $('form#filter_company_data_form').submit();

                $.ajax({
                type: "POST",
                url: "{{route('search_company')}}",
                data: $('form#filter_company_data_form').serialize(),
                dataType : 'json',
                success: function(response) {
                
                    window.location.href = response.url;
                }
                });

                $("#overlay").fadeOut(300);
            } else {


                $('form#filter_company_data_form input[name="title"]').addClass('is-invalid');

            }

        } else {

            $('form#filter_company_data_form input[name="title"]').addClass('is-invalid');

        }
    });


    $('#filter_companies').on('click', function(e) {
        e.preventDefault();

        if ($('form#filter_companies_form select[name="title"]').val() != '') {
            $("#overlay").fadeIn(300);
            $.ajax({
                type: "POST",
                url: "{{route('find_company')}}",
                data: $('form#filter_companies_form').serialize(),
                dataType : 'json',
                success: function(response) {

                   // window.location.href = "https://testing.preveri-podjetje.si/podjetja?title=" + response.data;
                    //$("#overlay").fadeOut(300);

                    if (response.status) 
                    {
                        console.log(response.data);
                        $('.companyListing').empty();

                        var Allcompanies = '<div class="container"><div class="row">';

                        var i=0;

                        $.each(response.data.data, function(key,company) {

                            Allcompanies += '<div class="col-sm-4"><div class="company_detail">';

                            Allcompanies += '<div class="card card-body"><div class="review_image"><img alt="'+company.title+'" src="{{asset("company_images")}}/'+company.logo+'" width="20%" class="card-img-top">'

                            Allcompanies +='</div><div class="review_detail"><h5 class="card-title">'+company.title+'</h5>';

                            Allcompanies += '<a href="{{route("podjetja")}}/'+company.slug+'"><button class="btn btn-warning">Preberi več </button></a></div></div></div></div>';

                            i++;
                        });

                        if(i == 0)
                        {
                            Allcompanies += ' <div class="alert alert-danger"><p>No Data found! Please search by other keyword</p></div>';
                        }

                         Allcompanies += '</div></div>';

                         Allcompanies += response.pagination;

                        $('.companyListing').empty().append(Allcompanies);

                        $("#overlay").fadeOut(300);
                        $("html, body").animate({ scrollTop: 0 }, "slow");

                    } else {

                        $("#overlay").fadeOut(300);

                    }
                }
            });
        }
    });

    $('#submit_newsletter_form').on('click', function(e) {
        e.preventDefault();

        if ($('#newsletter_Email').val() == '') {
            $('#newsletter_Email').addClass('is-invalid');

        } else if (!validateEmail($('#newsletter_Email').val())) {
            $('#newsletter_Email').addClass('is-invalid');

        } else {
            $("#overlay").fadeIn(300);


            $('#newsletter_Email').removeClass('is-invalid');

            $.ajax({
                type: "POST",
                url: "{{route('add_newsletter_data')}}",
                data: $('form#newsletter_form').serialize(),
                success: function(response) {
                    if (response.status == true) {
                        $('.newsletter_alert').removeClass('alert-danger');
                        $('.newsletter_alert').addClass('alert-success').empty().append(response.message)
                    } else {
                        $('.newsletter_alert').removeClass('alert-success');
                        $('.newsletter_alert').addClass('alert-danger').empty().append(response.message)
                    }

                    setTimeout(function() {
                        $('#newsletter_Email').val('');
                        $('.newsletter_alert').removeClass('alert-success');
                        $('.newsletter_alert').removeClass('alert-danger');
                        $('.newsletter_alert').empty();
                    }, 2000);
                    $("#overlay").fadeOut(300);

                }
            });
        }
    });

    $('.addcomment, .companyaddcomment').on('click', function() {
        $('.add_comment_modal').show();
    });

    $('.close').on('click', function() {
        $('.modal').hide();

    })

    $('.comment_sec').on('click','.show_view_modal', function() {
        var ID = $(this).attr('id');
        console.log(ID);
        $('#view_model' + ID).show();
    });

    $('.navbar-toggler-icon').on('click', function() {
        $('nav.navbar .collapse.navbar-collapse').toggle();
    })

    $(".bottom_scroll").click(function() {
        $('html, body').animate({
            scrollTop: $(document).height()
        });
    });
    var navListItems = $('div.setup-panel div a'),

        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    $('input[name="amount"]').on('keyup blur', function() {
        var regex = /^\d+$/;
        if (!regex.test($(this).val())) {
            $(this).val('');
        }
    });

    var backBtn = $('.back_btn');
    backBtn.click(function() {
        var curStep = $(this).closest(".setup-content");
        curStepBtn = curStep.attr("id");
        $('#' + curStepBtn).css("display", "none");

        var stepValue = curStepBtn.replace(/\D/g, '');

        var backValue = parseInt(stepValue) - 1;

        var backStep = 'step-' + backValue;

        $('#' + backStep).css("display", "block");

        //  $('div.setup-panel div a[href="#'+backStep+'"]').parent().next().children("a").removeAttr('disabled').trigger('click');

        // alert('ss');
        // alert('div.setup-panel div a[href="#'+backStep+'"]');

    });


    // allWells.hide();

    navListItems.click(function(e) {
        e.preventDefault();
        var target = $($(this).attr('href')),
            item = $(this);
        if (!item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            item.addClass('btn-success');
            allWells.hide();
            target.show();
            target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function() {

        var curStep = $(this).closest(".setup-content");
        curStepBtn = curStep.attr("id");
        var skipButtonTrigger = $(this).hasClass("skip_btn");

        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a");
        //curInputs = curStep.find("input[type='text'],input[type='dob'],select"),
        isValid = true;

        if (curStepBtn == 'step-0') {
            var CompanySelect = $('select[name="keyword"]').val();

            if (CompanySelect == '') {
                $('#company_select_error').empty().append('Napišite ime podjetja').show();
                isValid = false;

            } else {

                $('#company_select_error').empty().hide();
                isValid = true;

            }
        }


        if (curStepBtn == 'step-6') {

            var regular_fairlyCheckbox = $('input[name="regular_fairly[]"]').is(":checked")

            if (!regular_fairlyCheckbox) {
                $('#regular_fairly_error').empty().append('Izberi vsaj en odgovor').show();
                isValid = false;
            } else {
                isValid = true;
                $('#regular_fairly_error').empty().hide();

            }
        }

        if (curStepBtn == 'step-8' && skipButtonTrigger == false) {
            var amountValue = $('input[name="amount"]').val();

            if (amountValue == '') {
                isValid = false;

                $('#select_amount_error').empty().append('Napišite ali izberite znesek oz. preskočite vprašanje').show();
            } else {
                isValid = true;

                $('#select_amount_error').empty().hide();
            }
        }

        if (curStepBtn == 'step-9' && skipButtonTrigger == false) {
            var positionValue = $('input[name="position"]').val();

            if (positionValue == '') {
                isValid = false;

                $('#select_position_error').empty().append('Napišite delovno mesto').show();
            } else {
                isValid = true;

                $('#select_position_error').empty().hide();
            }
        }

        if (curStepBtn == 'step-15' && skipButtonTrigger == false) {
            var describeCompanyValue = $('input[name="describe_company"]').val();

            if (describeCompanyValue == '') {
                isValid = false;

                $('#describe_company_error').empty().append('Prosimo, vnesite opis').show();
            } else {
                isValid = true;

                $('#describe_company_error').empty().hide();
            }
        }

        if (curStepBtn == 'step-17' && skipButtonTrigger == false) {
            var managementAdviceValue = $('input[name="management_advice"]').val();

            if (managementAdviceValue == '') {
                isValid = false;

                $('#management_advice_error').empty().append('Vnesite predloge za vodstvo').show();
            } else {
                isValid = true;

                $('#management_advice_error').empty().hide();
            }
        }

        if (curStepBtn == 'step-24' && skipButtonTrigger == false) {
            var goodStuffValue = $('input[name="good_stuff"]').val();

            if (goodStuffValue == '') {
                isValid = false;

                $('#good_stuff_error').empty().append('Vpišite, kaj bi pohvalili').show();
            } else {
                isValid = true;

                $('#good_stuff_error').empty().hide();
            }
        }

        if (curStepBtn == 'step-27' && skipButtonTrigger == false) {
            var badThingsValue = $('input[name="bad_things"]').val();

            if (badThingsValue == '') {
                isValid = false;

                $('#bad_things_error').empty().append('Prosimo, vpišite minuse v podjetju').show();
            } else {
                isValid = true;

                $('#bad_things_error').empty().hide();
            }
        }


        if (curStepBtn == 'step-1') {
            if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');

    });


    $('input[name="select_amount"]').on('click', function() {

        $('input[name="amount"]').val($(this).val());
    });


    $('.nextBtnSubmit').on('click', function() {
        var verifyFinal = $('input[name="verify"]').is(":checked");

        if (!verifyFinal) {
            $('#imate_place_error').empty().append('Morate se strinjati z našimi pogoji').show();

        } else {

            $('#imate_place_error').empty().hide();

            $("#overlay").fadeIn(300);
            $.ajax({
                type: "POST",
                url: "{{route('commentSubmit')}}",
                data: $('form#comment_form').serialize(),
                success: function(response) {

                    if (response.status) {
                        $('#imate_place_success').empty().append(response.message).show();

                        // hide modal
                        setTimeout(() => {

                            $('.add_comment_modal').hide();
                            location.reload();

                        }, 3000);

                    } else {

                        $('#imate_place_success').empty().hide();
                        $('#imate_place_error').empty().append(response.message).show();
                    }
                    $("#overlay").fadeOut(300);

                }
            });
        }
    });

    $('.short_desc_full_click').on('click', function() {

        var id = $(this).attr('id');
        var GetId = id.replace(/\D/g, '');
        console.log(GetId);
        $('#short_full_desc_' + GetId).show();
        $('#short_desc_' + GetId).hide();
        $('#short_desc_click_' + GetId).show();
        $(this).hide();

    })

    $('.short_desc_click').on('click', function() {

        var id = $(this).attr('id');
        var GetId = id.replace(/\D/g, '');
        $('#short_full_desc_' + GetId).hide();
        $('#short_desc_' + GetId).show();
        $(this).hide();
        $('#short_desc_full_click_' + GetId).show();

    })


    $('input[name="regular_fairly[]"]').on('click', function() {

        var ID = $(this).attr('id');
        if($(this).is(":checked"))
        {
            $('label[for='+ID+']').css('background','#0967ab');
            $('label[for='+ID+']').css('color','white');

        } else {

            $('label[for='+ID+']').css('background','#dfdfdf');
            $('label[for='+ID+']').css('color','#212529');

        }
        
    });


    $(".js-data-example-ajaxs").select2({
        ajax: {
            url: "{{route('find.companies')}}",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    title: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;

                return {
                    results: data.data,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder: 'Select...',
        minimumInputLength: 3,
        //   templateResult: formatRepo,
        //   templateSelection: formatRepoSelection
    });

    // Create cookie
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    // Delete cookie
    function deleteCookie(cname) {
        const d = new Date();
        d.setTime(d.getTime() + (24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=;" + expires + ";path=/";
    }

    // Read cookie
    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    // Set cookie consent
    function acceptCookieConsent() {
        deleteCookie('user_cookie_consent');
        setCookie('user_cookie_consent', 1, 30);
        document.getElementById("cookieNotice").style.display = "none";
    }

    let cookie_consent = getCookie("user_cookie_consent");
    if (cookie_consent != "") {
        document.getElementById("cookieNotice").style.display = "none";
    } else {
        document.getElementById("cookieNotice").style.display = "block";
    }

    $('.noEnterSubmit').keypress(function(e){
    if ( e.which == 13 ) return false;
    //or...
    if ( e.which == 13 ) e.preventDefault();
});
</script>

@if(Route::currentRouteName() == 'podjetja')
<script>

    function getCompanies(page)
    {
        $("#overlay").fadeIn(300);

            $.ajax({
                type: "GET",
                url: "{{route('all_companies')}}",
                data: {'page' : page},
                dataType:'json',
                success: function(response) {

                    if (response.status) 
                    {

                        console.log(response.data);
                        $('.companyListing').empty();

                        var Allcompanies = '<div class="container"><div class="row">';

                        var i=0;

                        $.each(response.data.data, function(key,company) {

                            Allcompanies += '<div class="col-sm-4"><div class="company_detail">';

                            Allcompanies += '<div class="card card-body"><div class="review_image"><img alt="'+company.title+'" src="{{asset("company_images")}}/'+company.logo+'" width="20%" class="card-img-top">'

                            Allcompanies +='</div><div class="review_detail"><h5 class="card-title">'+company.title+'</h5>';

                            Allcompanies += '<a href="{{route("podjetja")}}/'+company.slug+'"><button class="btn btn-warning">Preberi več </button></a></div></div></div></div>';

                            i++;
                        });

                        if(i == 0)
                        {
                            Allcompanies += ' <div class="alert alert-danger"><p>No data found </p></div>';
                        }

                         Allcompanies += '</div></div>';

                         Allcompanies += response.pagination;

                        $('.companyListing').empty().append(Allcompanies);

                        $("#overlay").fadeOut(300);
                        $("html, body").animate({ scrollTop: 0 }, "slow");

                    } else {

                        $("#overlay").fadeOut(300);

                    }

                }
            });
        }

        getCompanies(1);

        function pagination(page)
        {
            getCompanies(page);
        }
        
</script>
@endif


@if(Route::currentRouteName() == 'podjetja/{slug}')

<script>
var slugValue = "{{request()->route('slug')}}";
function getCompanyComments(page)
    {
        $("#overlay").fadeIn(300);

            $.ajax({
                type: "GET",
                url: "{{route('company_comments')}}",
                data: {'page' : page,'slug' : slugValue },
                dataType:'json',
                success: function(response) 
                {
                    if (response.status) 
                    {
                        console.log(response.data);
                        $('.comment_sec').empty();

                        var Allcomments = '<div class="container"><div class="row"><div class="col-sm-12"><div class="card card-body"><div class="row">';

                        var j=0;

                        $.each(response.data.comments.data, function(key,comment) {

                            Allcomments += '<div class="col-sm-4"><h1 class="card-title">Komentar</h1>';

                            Allcomments += '<p class="card-text"><span>'+moment(comment.created_at).format("MMM DD,Y")+'</span><p>';

                            Allcomments +='<p><div class="dv-star-rating" style="display: inline-block; position: relative;">';

                            for(var i = 1; i < response.ratingcount; i++)
                            {
                                if(comment.rating < i) 
                                {

                                Allcomments += '<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>';

                                } else {

                                    Allcomments += '<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>';
                                    
                                }
                            } 

                            var goodComment = comment.good_stuff == null  ? '' : comment.good_stuff;

                            var badThings = comment.bad_things == null  ? '' : comment.bad_things;

                            var managementAdvice = comment.management_advice == null ? '' : comment.management_advice;

                            Allcomments += '</div></p></p></div>';

                            Allcomments += '<div class="col-sm-12"><h5 class="good_comment">Pohvale</h5>';

                            Allcomments += '<p>'+goodComment +'</p>';

                            Allcomments += '<div class="col-sm-12"><h5 class="bad_comment">Minusi podjetja</h5>';

                            Allcomments += '<p>'+ badThings+'</p>';

                            Allcomments += '<div class="col-sm-12"><h5 class="med_comment">Predlogi vodstvu</h5>';

                            Allcomments += '<p>'+ managementAdvice +'</p><button type="button" class="btn btn-secondary show_view_modal" id="'+comment.id+'"> Poglej celoten komentar</button><hr style="margin: 1em 0px;">';


                            j++;
                        });

                       
                        if(j == 0)
                        {
                            Allcomments += '<h1 class="card-title">Komentar</h1>Trenutno ni nobenega komentarja';

                        } else if(j <= 10) {

                            Allcomments += '<nav class="" aria-label="Page navigation example"><ul class="pagination pagination-sm"><li class="page-item active"><button class="page-link">1</button></li></ul></nav>';

                        }

                        Allcomments += response.pagination;
                        
                        Allcomments += '</div></div></div></div></div>';

                        $('.comment_sec').empty().append(Allcomments);

                        $("#overlay").fadeOut(300);
                        // $("html, body").animate({ scrollTop: 0 }, "slow");

                    } else {

                        $("#overlay").fadeOut(300);

                    }
                }
            });
    }

    getCompanyComments(1);

    function paginationComment(page)
        {
            getCompanyComments(page);
        }
</script>

@endif