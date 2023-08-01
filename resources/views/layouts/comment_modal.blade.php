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

                                <input name="last_time_worked" type="radio" id="2023" class="form-check-input" value="2022">
                                <label class="form-label nextBtn" for="2023">2023</label>

                                <input name="last_time_worked" type="radio" id="2022" class="form-check-input" value="2022">
                                <label class="form-label nextBtn" for="2022">2022</label>

                                <input name="last_time_worked" type="radio" id="2021" class="form-check-input" value="2021">
                                <label class="form-label nextBtn" for="2021">2021</label>

                                <input name="last_time_worked" type="radio" id="Pred_2021" class="form-check-input" value="Pred 2021"><label class="form-label nextBtn" for="Pred_2021">Pred 2021</label>

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
                        <div class="rsw_2f setup-content" id="step-2" style="display: none;transition: none 0s ease 0s; overflow: unset; ">
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
                        <div class="rsw_2f setup-content" id="step-3" style="display: none;transition: none 0s ease 0s; overflow: unset; ">
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
                        <div class="rsw_2f setup-content" id="step-4" style="display: none;transition: none 0s ease 0s; overflow: unset; ">
                            <div class="mb-3">4. Ali dobivate redno plačilo ?
                                <input name="regular_salary" type="radio" class="form-check-input" id="regular_salary1" value="Da">
                                <label class="form-label nextBtn" for="regular_salary1">Da</label>

                                <input name="regular_salary" type="radio" class="form-check-input" id="regular_salary2" value="Ne">
                                <label class="form-label nextBtn" for="regular_salary2">Ne</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>4/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-5" style="display: none;transition: none 0s ease 0s; overflow: unset; ">
                            <div class="mb-3">5. Ali imate možnost napredovanja pri plači ?
                                <input name="full_amount_salary" type="radio" class="form-check-input" id="full_amount_salary1" value="Da">
                                <label class="form-label nextBtn" for="full_amount_salary1">Da</label>

                                <input name="full_amount_salary" type="radio" class="form-check-input" id="full_amount_salary2" value="Ne">
                                <label class="form-label nextBtn" for="full_amount_salary2">Ne</label>
                                <hr><span class="back_btn"> Nazaj </span>
                                <p>5/29</p>
                            </div>
                        </div>
                        <div class="rsw_2f setup-content" id="step-6" style="display: none;transition: none 0s ease 0s; overflow: unset; ">
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
                                <textarea name="position" placeholder="Primer: Administrator - Administracija" class="form-control" aria-invalid="false"></textarea>

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
                            <div class="mb-3">11. Koliko ur na dan ste povprečno v službi ?
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
                                <textarea name="describe_company" class="form-control" aria-invalid="false"></textarea>
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
                                <textarea name="management_advice" class="form-control" aria-invalid="false"></textarea>
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

                                <textarea name="good_stuff" class="form-control" aria-invalid="false"></textarea>
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
                                <textarea name="bad_things"class="form-control" aria-invalid="false"></textarea>
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
                                <label class="form-label nextBtnSubmit" for="imate_place1" id="Da">Da</label>

                                <input name="imate_place" type="radio" class="form-check-input" id="imate_place2" value="Ne">
                                <label class="form-label nextBtnSubmit" for="imate_place2" id="Ne">Ne</label>

                                <input name="imate_place" type="radio" class="form-check-input" id="imate_place3" value="Dogovor glede porabe nadur">
                                <label class="form-label nextBtnSubmit" for="imate_place3" id="Dogovor glede porabe nadur">Dogovor glede porabe nadur</label>
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



<div class="alert-container disable_company">
    <div role="alert">        
        <div class="alert-main" style="border-bottom: 3px solid rgb(220, 53, 69);">
            <h3 class="alert-header">Opozorilo</h3>
            <p class="alert-body">Podjetje je zaprto/neaktivno. Za več informacij smo vam na voljo na info@preveri-podjetje.si</p><a class="alert-button" role="button" href="{{ route('home') }}" style="background-color: rgb(220, 53, 69);">Zapri</a>
        </div>
    </div>
</div>