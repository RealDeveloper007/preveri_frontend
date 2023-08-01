<script>
    if (!localStorage.getItem("close_welcome_modal")) {

        $('#welcomeModal').show();
        $("body").addClass("lock-scroll");
    }

    if (localStorage.getItem("advance_filter")) {

        $('.advanced-search').addClass('show');
    }


    $('.close_welcome_modal').on('click', function(e) {

        localStorage.setItem("close_welcome_modal", true);

        $('#welcomeModal').hide();
        $("body").removeClass("lock-scroll");
    });

    const validateEmail = (email) => {
        return email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };

    $('#newsletter_form input[name="email"]').on('keyup blur', function(e) {

        var Value = $(this).val();
        if (validateEmail(Value)) {
            $('form#newsletter_form input[name="email"]').removeClass('is-invalid').addClass('is-valid');

        } else {

            $('form#newsletter_form input[name="email"]').removeClass('is-valid').addClass('is-invalid');
        }

    });

    $('#filter_company_data_form input[name="title"]').on('keyup blur', function(e) {

        var Value = $(this).val();
        if (Value.length >= 3) {
            $('form#filter_company_data_form input[name="title"]').removeClass('is-invalid').addClass('is-valid');

        } else {

            $('form#filter_company_data_form input[name="title"]').removeClass('is-valid').addClass('is-invalid');
        }

    });


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
                    dataType: 'json',
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
                dataType: 'json',
                success: function(response) {

                    // window.location.href = "https://testing.preveri-podjetje.si/podjetja?title=" + response.data;
                    //$("#overlay").fadeOut(300);

                    if (response.status) {
                        $('.companyListing').empty();

                        var Allcompanies = '<div class="container"><div class="row">';

                        var i = 0;

                        $.each(response.data.data, function(key, company) {

                            Allcompanies += '<div class="col-sm-4"><div class="company_detail">';

                            Allcompanies += '<div class="card card-body"><div class="review_image"><img alt="' + company.title + '" src="{{backend_asset("company_images")}}/' + company.logo + '" width="20%" class="card-img-top">'

                            Allcompanies += '</div><div class="review_detail"><h5 class="card-title">' + company.title + '</h5>';

                            Allcompanies += '<a href="{{route("podjetja")}}/' + company.slug + '"><button class="btn btn-warning">Preberi več </button></a></div></div></div></div>';

                            i++;
                        });

                        if (i == 0) {
                            Allcompanies += ' <div class="alert alert-danger"><p>No Data found! Please search by other keyword</p></div>';
                        }

                        Allcompanies += '</div></div>';

                        Allcompanies += response.pagination;

                        $('.companyListing').empty().append(Allcompanies);

                        $("#overlay").fadeOut(300);
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");

                    } else {

                        $("#overlay").fadeOut(300);

                    }
                }
            });
        }
    });

    $('#advance_filter').on('click', function(e) {
        e.preventDefault();

        $("#overlay").fadeIn(300);
        localStorage.removeItem("advance_filter");
        $('form#advance_filter_companies_form').submit();

        // $.ajax({
        //     type: "POST",
        //     url: "{{route('filter_company')}}",
        //     data: $('form#advance_filter_companies_form').serialize(),
        //     dataType: 'json',
        //     success: function(response) {

        //         // window.location.href = "https://testing.preveri-podjetje.si/podjetja?title=" + response.data;
        //         //$("#overlay").fadeOut(300);

        //         if (response.status) 
        //         {
        //             $('.companyListing').empty();

        //             var Allcompanies = '<div class="container"><div class="row">';

        //             var i = 0;

        //             $.each(response.data.data, function(key, company) {

        //                 Allcompanies += '<div class="col-sm-4"><div class="company_detail">';

        //                 Allcompanies += '<div class="card card-body"><div class="review_image"><img alt="' + company.title + '" src="{{backend_asset("company_images")}}/' + company.logo + '" width="20%" class="card-img-top">'

        //                 Allcompanies += '</div><div class="review_detail"><h5 class="card-title">' + company.title + '</h5>';

        //                 Allcompanies += '<a href="{{route("podjetja")}}/' + company.slug + '"><button class="btn btn-warning">Preberi več </button></a></div></div></div></div>';

        //                 i++;
        //             });

        //             if (i == 0) {
        //                 Allcompanies += ' <div class="alert alert-danger"><p>No Data found! Please search by other keyword</p></div>';
        //             }

        //             Allcompanies += '</div></div>';

        //             Allcompanies += response.pagination;

        //             $('.companyListing').empty().append(Allcompanies);

        //             $("#overlay").fadeOut(300);
        //             $("html, body").animate({
        //                 scrollTop: 0
        //             }, "slow");

        //         } else {

        //             $("#overlay").fadeOut(300);

        //         }

        //         $(".advanced-search").removeClass("show");
        //     }
        // });
    });

    $('.footer #submit_newsletter_form').on('click', function(e) {
        e.preventDefault();

        if ($('.footer #newsletter_Email').val() == '') {
            $('.footer #newsletter_Email').addClass('is-invalid');

        } else if (!validateEmail($('.footer #newsletter_Email').val())) {
            $('.footer #newsletter_Email').addClass('is-invalid');

        } else {
            $("#overlay").fadeIn(300);


            $('.footer #newsletter_Email').removeClass('is-invalid');

            $.ajax({
                type: "POST",
                url: "{{route('add_newsletter_data')}}",
                data: $('.footer form#newsletter_form').serialize(),
                success: function(response) {
                    $('.footer .newsletter_alert').addClass('alert');
                    if (response.status == true) {
                        $('.footer .newsletter_alert').removeClass('alert-danger');
                        $('.footer .newsletter_alert').addClass('alert-success').empty().append(response.message)
                    } else {
                        $('.footer .newsletter_alert').removeClass('alert-success');
                        $('.footer .newsletter_alert').addClass('alert-danger').empty().append(response.message)
                    }

                    setTimeout(function() {
                        $('.footer #newsletter_Email').val('');
                        $('.footer .newsletter_alert').removeClass('alert-success');
                        $('.footer .newsletter_alert').removeClass('alert-danger');
                        $('.footer .newsletter_alert').empty();
                        $('.footer .newsletter_alert').removeClass('alert');
                    }, 2000);
                    $("#overlay").fadeOut(300);

                }
            });
        }
    });
    
    
        $('#signNewsletterModal #submit_newsletter_form').on('click', function(e) {
        e.preventDefault();

        if ($('#signNewsletterModal #newsletter_Email').val() == '') {
            $('#signNewsletterModal #newsletter_Email').addClass('is-invalid');

        } else if (!validateEmail($('#signNewsletterModal #newsletter_Email').val())) {
            $('#signNewsletterModal #newsletter_Email').addClass('is-invalid');

        } else {
            $("#overlay").fadeIn(300);


            $('#signNewsletterModal #newsletter_Email').removeClass('is-invalid');

            $.ajax({
                type: "POST",
                url: "{{route('add_newsletter_data')}}",
                data: $('#signNewsletterModal form#newsletter_form').serialize(),
                success: function(response) {
                    $('#signNewsletterModal .newsletter_alert').addClass('alert');
                    if (response.status == true) {
                        $('#signNewsletterModal .newsletter_alert').removeClass('alert-danger');
                        $('#signNewsletterModal .newsletter_alert').addClass('alert-success').empty().append(response.message)
                    } else {
                        $('#signNewsletterModal .newsletter_alert').removeClass('alert-success');
                        $('#signNewsletterModal .newsletter_alert').addClass('alert-danger').empty().append(response.message)
                    }

                    setTimeout(function() {
                        $('#signNewsletterModal #newsletter_Email').val('');
                        $('#signNewsletterModal .newsletter_alert').removeClass('alert-success');
                        $('#signNewsletterModal .newsletter_alert').removeClass('alert-danger');
                        $('#signNewsletterModal .newsletter_alert').empty();
                        $('#signNewsletterModal .newsletter_alert').removeClass('alert');
                    }, 2000);
                    $("#overlay").fadeOut(300);

                }
            });
        }
    });


    $('.addcomment').on('click', function() {
        $('.setup-content').hide();
        $('#step-0').show();
        $('#comment_form input[type="text"]').val('');
        $('#comment_form input[type="checkbox"]').prop('checked', false);
        $('#comment_form input[type="radio"]').prop('checked', false);
        $('#imate_place_success').hide();
        $('.add_comment_modal').show();
        $("body").addClass("lock-scroll");
    });

    $('.companyaddcomment').on('click', function() {
        $('.setup-content').hide();
        $('#step-1').show();
        $('#comment_form input[type="text"]').val('');
        $('#comment_form input[type="checkbox"]').prop('checked', false);
        $('#comment_form input[type="radio"]').prop('checked', false);

        $('.add_comment_modal').show();
        $("body").addClass("lock-scroll");
    });

    $('.close').on('click', function() {
        $('.modal').hide();
        $("body").removeClass("lock-scroll");
    })

    //  $('.welcome_button').on('click', function() {
    //     $('#welcomeModal').show();
    //             $("body").addClass("lock-scroll");

    //     // $("body").removeClass("lock-scroll");
    // })

    $('.comment_sec').on('click', '.show_view_modal', function() {
        var ID = $(this).attr('id');
        // console.log(ID);
        $('#view_model' + ID).show();
        $("body").addClass("lock-scroll");

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

                $('input[name="amount"]').addClass('is-invalid');

                $('#select_amount_error').empty().append('Napišite ali izberite znesek oz. preskočite vprašanje').show();
            } else {
                isValid = true;
                $('input[name="amount"]').addClass('is-valid');
                $('#select_amount_error').empty().hide();
            }
        }

        if (curStepBtn == 'step-9' && skipButtonTrigger == false) {
            var positionValue = $('textarea[name="position"]').val();

            if (positionValue == '') {
                isValid = false;

                $('textarea[name="position"]').addClass('is-invalid');

                $('#select_position_error').empty().append('Napišite delovno mesto').show();
            } else {
                isValid = true;

                $('textarea[name="position"]').addClass('is-valid');

                $('#select_position_error').empty().hide();
            }
        }

        if (curStepBtn == 'step-15' && skipButtonTrigger == false) {
            var describeCompanyValue = $('textarea[name="describe_company"]').val();

            if (describeCompanyValue == '') {
                isValid = false;

                $('textarea[name="describe_company"]').addClass('is-invalid');

                $('#describe_company_error').empty().append('Prosimo, vnesite opis').show();
            } else {
                isValid = true;

                $('textarea[name="describe_company"]').addClass('is-valid');

                $('#describe_company_error').empty().hide();
            }
        }

        if (curStepBtn == 'step-17' && skipButtonTrigger == false) {
            var managementAdviceValue = $('textarea[name="management_advice"]').val();

            if (managementAdviceValue == '') {
                isValid = false;

                $('textarea[name="management_advice"]').addClass('is-invalid');

                $('#management_advice_error').empty().append('Vnesite predloge za vodstvo').show();
            } else {
                isValid = true;

                $('textarea[name="management_advice"]').addClass('is-valid');

                $('#management_advice_error').empty().hide();
            }
        }

        if (curStepBtn == 'step-24' && skipButtonTrigger == false) {
            var goodStuffValue = $('textarea[name="good_stuff"]').val();

            if (goodStuffValue == '') {
                isValid = false;

                $('textarea[name="good_stuff"]').addClass('is-invalid');

                $('#good_stuff_error').empty().append('Vpišite, kaj bi pohvalili').show();
            } else {
                isValid = true;

                $('textarea[name="good_stuff"]').addClass('is-valid');

                $('#good_stuff_error').empty().hide();
            }
        }

        if (curStepBtn == 'step-27' && skipButtonTrigger == false) {
            var badThingsValue = $('textarea[name="bad_things"]').val();

            if (badThingsValue == '') {
                isValid = false;

                $('textarea[name="bad_things"]').addClass('is-invalid');
                $('#bad_things_error').empty().append('Prosimo, vpišite minuse v podjetju').show();
            } else {
                isValid = true;
                $('textarea[name="bad_things"]').addClass('is-valid');
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

        var ID = $(this).attr('id');

        var verifyFinal = $('input[name="verify"]').is(":checked");

        if (!verifyFinal) {
            $('#imate_place_error').empty().append('Morate se strinjati z našimi pogoji').show();

        } else {
            $("#overlay").fadeIn(300);

            // $('.nextBtnSubmit').prop('disabled', true);
            // $('#step-29 label.form-label').removeClass('nextBtnSubmit');

            $('#imate_place_error').empty().hide();
            $('input[name="imate_place"').val(ID);
            $.ajax({
                type: "POST",
                url: "{{route('commentSubmit')}}",
                data: $('form#comment_form').serialize() + '&imate_place=' + ID, //
                success: function(response) {

                    if (response.status) {
                        $('#imate_place_success').empty().append(response.message).show();

                        // hide modal
                        setTimeout(() => {

                            $('.add_comment_modal').hide();
                            // location.reload();
                            $('.setup-content').hide();
                            $('#step-0').show();
                            $('#comment_form input[type="text"]').val('');
                            $('#comment_form input[type="checkbox"]').prop('checked', false);
                            $('#comment_form input[type="radio"]').prop('checked', false);
                            $("body").removeClass("lock-scroll");
                            $('#imate_place_success').empty();
                            $('#imate_place_error').empty();
                            $("#overlay").fadeOut(300);

                        }, 3000);

                    } else {

                        $('#imate_place_success').empty().hide();
                        $('#imate_place_error').empty().append(response.message).show();
                        $("#overlay").fadeOut(300);

                    }

                }
            });
        }
    });

    $('body').on('click', '.owl-item.active li .card .carusal_text .short_desc_full_click', function() {

        var id = $(this).attr('id');
        var GetId = id.replace(/\D/g, '');
        console.log(GetId);
        $('.owl-item.active li .card .carusal_text #short_full_desc_' + GetId).show();
        $('.owl-item.active li .card .carusal_text #short_desc_' + GetId).hide();
        $('.owl-item.active li .card .carusal_text #short_desc_click_' + GetId).show();
        $(this).hide();

    })

    $('body').on('click', '.owl-item.active li .card .carusal_text .short_desc_click', function() {

        var id = $(this).attr('id');
        var GetId = id.replace(/\D/g, '');
        console.log(GetId);
        $('.owl-item.active li .card .carusal_text #short_full_desc_' + GetId).hide();
        $('.owl-item.active li .card .carusal_text #short_desc_' + GetId).show();
        $(this).hide();
        $('.owl-item.active li .card .carusal_text #short_desc_full_click_' + GetId).show();

    })


    $('input[name="regular_fairly[]"]').on('click', function() {

        var ID = $(this).attr('id');
        if ($(this).is(":checked")) {
            $('label[for=' + ID + ']').css('background', '#0967ab');
            $('label[for=' + ID + ']').css('color', 'white');

        } else {

            $('label[for=' + ID + ']').css('background', '#dfdfdf');
            $('label[for=' + ID + ']').css('color', '#212529');

        }

    });
</script>
@if(Route::currentRouteName() !='podjetja/{slug}' && Route::currentRouteName() !='dobra-zaposlitev')

<script>
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

    $(".js-data-example-region-ajaxs").select2({
        // ajax: {
        //     url: "{{route('find.regions')}}",
        //     dataType: 'json',
        //     delay: 250,
        //     data: function(params) {
        //         return {
        //             title: params.term, // search term
        //             page: params.page
        //         };
        //     },
        //     processResults: function(data, params) {
        //         // parse the results into the format expected by Select2
        //         // since we are using custom formatting functions we do not need to
        //         // alter the remote JSON data, except to indicate that infinite
        //         // scrolling can be used
        //         params.page = params.page || 1;

        //         return {
        //             results: data.data,
        //             pagination: {
        //                 more: (params.page * 30) < data.total_count
        //             }
        //         };
        //     },
        //     cache: true
        // },
        // placeholder: 'Select...',
        // minimumResultsForSearch: -1,
        // minimumInputLength: 3,
        // allowClear: true,
        // templateResult: hideSelected,
        //   templateSelection: formatRepoSelection
    });

    $(".js-data-example-category-ajaxs").select2({
        // ajax: {
        //     url: "{{route('find.categories')}}",
        //     dataType: 'json',
        //     delay: 250,
        //     data: function(params) {
        //         return {
        //             title: params.term, // search term
        //             page: params.page
        //         };
        //     },
        //     processResults: function(data, params) {
        //         // parse the results into the format expected by Select2
        //         // since we are using custom formatting functions we do not need to
        //         // alter the remote JSON data, except to indicate that infinite
        //         // scrolling can be used
        //         params.page = params.page || 1;

        //         return {
        //             results: data.data,
        //             pagination: {
        //                 more: (params.page * 30) < data.total_count
        //             }
        //         };
        //     },
        //     cache: true
        // },
        // language: {
        //     inputTooShort: function(args) {
        //         return "išči po kategoriji";
        //     }
        // },
        // placeholder: 'Select...',
        // minimumResultsForSearch: -1,
        // minimumInputLength: 3,
        // allowClear: true,
        // templateResult: hideSelected,
        //   templateSelection: formatRepoSelection
    });

    function hideSelected(value) {
  if (value && !value.selected) {
    return $('<span>' + value.text + '</span>');
  }
}
</script>

@endif

<script>
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

    $('.noEnterSubmit').keypress(function(e) {
        if (e.which == 13) return false;
        //or...
        if (e.which == 13) e.preventDefault();
    });
</script>

@if(Route::currentRouteName() == 'podjetja')

@php $Page = (isset($_GET['page']) && $_GET['page']!='') ? $_GET['page'] : 1; @endphp

<script>
    var PageNo = "{{ $Page }}";

    function getCompanies(page) {
        $("#overlay").fadeIn(300);

        $.ajax({
            type: "GET",
            url: "{{route('all_companies')}}",
            data: {
                'page': page
            },
            dataType: 'json',
            success: function(response) {

                if (response.status) {

                    // console.log(response.data);
                    $('.companyListing').empty();

                    var Allcompanies = '<div class="container"><div class="row">';

                    var i = 0;

                    $.each(response.data.data, function(key, company) {

                        Allcompanies += '<div class="col-sm-4"><div class="company_detail">';

                        Allcompanies += '<div class="card card-body"><div class="review_image"><img alt="' + company.title + '" src="{{backend_asset("company_images")}}/' + company.logo + '" width="20%" class="card-img-top">'

                        Allcompanies += '</div><div class="review_detail"><h5 class="card-title">' + company.title + '</h5>';

                        Allcompanies += '<a href="{{route("podjetja")}}/' + company.slug + '"><button class="btn btn-warning">Preberi več </button></a></div></div></div></div>';

                        i++;
                    });

                    if (i == 0) {
                        Allcompanies += ' <div class="alert alert-danger"><p>No data found </p></div>';
                    }

                    Allcompanies += '</div></div>';

                    Allcompanies += response.pagination;

                    $('.companyListing').empty().append(Allcompanies);

                    $("#overlay").fadeOut(300);
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");

                } else {

                    $("#overlay").fadeOut(300);

                }

            }
        });
    }

    // getCompanies(PageNo);

    function pagination(page) {
        getCompanies(page);
    }

    $(document).ready(function() {
        $(".advanced a").click(function() {
            $(".advanced-search").addClass("show");
        });
        $(".close-advanced-search").click(function() {
            $(".advanced-search").removeClass("show");
            localStorage.removeItem("advance_filter");

        });
        //   $(".ratings span").click(function()
        //   {
        //     // var count = $('.act').length;
        //     // count = parseInt(count) + 1;
        //     // $('input[name="rating"]').val(count);

        // 	$(this).toggleClass("act");
        //   });

        $('.star').on('click', function() {
            $('.star').addClass('selected');
            var count = $(this).attr('name');
            for (var i = 0; i < count - 1; i++) {
                $('.star').eq(i).removeClass('selected');
            }

            var RatingCount = $('.selected').length;
            $('input[name="rating"]').val(RatingCount);
        });

    });

    $('.ResetFilter').on('click', function(e) {
        e.preventDefault();

        localStorage.setItem('advance_filter', true);

        window.location.href = "{{route('podjetja')}}";


    });
</script>
@endif


@if(Route::currentRouteName() == 'podjetja/{slug}')

<script>
    var slugValue = "{{request()->route('slug')}}";

    function getCompanyComments(page) {
        $("#overlay").fadeIn(300);

        $.ajax({
            type: "GET",
            url: "{{route('company_comments')}}",
            data: {
                'page': page,
                'slug': slugValue
            },
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    // console.log(response.data);
                    $('.comment_sec').empty();

                    var Allcomments = '<div class="container"><div class="row"><div class="col-sm-12"><div class="card card-body"><div class="row">';

                    var j = 0;

                    // console.log(response.data.status);
                    if (response.data.status == 0) {
                        $('.alert-container.disable_company').attr('style', 'display: block !important');

                        $('body').addClass('lock-scroll');
                    }

                    var AllQuestionAnswers = '';

                    var salaries_data = '<div class="table-responsive"><table class="salary_table table table-striped table-bordered">';
                     
                     salaries_data += '<th>Delovno Mesto</th>';

                     salaries_data += '<th>Plača</th>';
                     
                     salaries_data += '<th>Delovni čas (ure)</th>';

                     salaries_data += '</tr>';


                    $.each(response.data.comments.data, function(key, comment) {

                        var count = key + 1;

                        Allcomments += '<div class="col-sm-4"><h2 class="card-title">Komentar <big>' + count + '</big> </h2>';

                        Allcomments += '<p class="card-text">&#128337;&nbsp;<span>' + moment(comment.created_at).format("MMM DD,Y") + '</span>';

                        Allcomments += '<div class="dv-star-rating" style="display: inline-block; position: relative;">';

                        for (var i = 1; i <= response.ratingcount; i++) {
                            if (comment.rating < i) {

                                Allcomments += '<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>';

                            } else {

                                Allcomments += '<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>';

                            }
                        }

                        var goodComment = comment.good_stuff == null ? '' : comment.good_stuff;

                        var badThings = comment.bad_things == null ? '' : comment.bad_things;

                        var managementAdvice = comment.management_advice == null ? '' : comment.management_advice;

                        Allcomments += '</div></div>';

                        if (comment.additional_text == 1) {
                            Allcomments += '<div class="col-sm-8"><span class="right-about">Uporabljena je bila cenzura zaradi neupoštevanja pravil uporabe portala.<br/>(Kletvice, sovražni govor, žaljivke, ipd.)</span></div>';
                        }

                        Allcomments += '<div class="col-sm-12"><h5 class="good_comment">Pohvale</h5>';

                        if (goodComment) {
                            Allcomments += '<p>' + goodComment + '</p>';

                        }


                        Allcomments += '<div class="col-sm-12"><h5 class="bad_comment">Minusi podjetja</h5>';

                        if (goodComment) {
                            Allcomments += '<p>' + badThings + '</p>';
                        }

                        Allcomments += '<div class="col-sm-12"><h5 class="med_comment">Predlogi vodstvu</h5>';

                        if (goodComment) {
                            Allcomments += '<p>' + managementAdvice + '</p>';
                        }


                        AllQuestionAnswers += '<p><strong>' + count + '</strong><abbr> Kdaj ste nazadnje delali v tem podjetju ?</abbr> <span>' + comment.full_response.last_time_worked + '</span></p>';
                        
                        var spendHours = comment.full_response.spend_hours =='' ? '-' : comment.full_response.spend_hours;
                        
                        if(comment.full_response.amount != null && comment.full_response.position != null)
                        {
                            salaries_data +='<tr><td>' + comment.full_response.position +'</td> <td>' + comment.full_response.amount + '</td><td>' + spendHours + '</td></tr>';

                        } else if(comment.full_response.amount == null && comment.full_response.position != null)
                        {
                            salaries_data +='<tr><td>' + comment.full_response.position +'</td> <td> - </td><td>' + spendHours + '</td></tr>';
                            
                        } else if(comment.full_response.amount != null && comment.full_response.position == null) {
                            
                            salaries_data +='<tr><td> - </td> <td>' + comment.full_response.amount + '</td><td>' + spendHours + '</td></tr>';
                        }

                        AllQuestionAnswers += '<abbr class="dv-star-rating question_ratings">';

                        for (var i = 1; i <= response.ratingcount; i++) {
                            if (comment.rating < i) {

                                AllQuestionAnswers += '<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(51,51,51);"><i style="font-style: normal;">★</i></label>';

                            } else {

                                AllQuestionAnswers += '<label class="dv-star-rating-star dv-star-rating-full-star" style="float: left; cursor: pointer; color: rgb(255, 180, 0);"><i style="font-style: normal;">★</i></label>';

                            }
                        }

                        AllQuestionAnswers += '</abbr>';

                        Allcomments += '<button type="button" class="btn btn-secondary show_view_modal" id="' + comment.id + '"> Poglej celoten komentar</button>';


                        Allcomments += '<hr style="margin: 1em 0px;">';

                        j++;
                    });

                    salaries_data +='</table></div>';


                    if (j == 0) {
                        Allcomments += '<h2 class="card-title">Komentar</h2>Trenutno ni nobenega komentarja';

                        $('.new_comment_sec').hide();
                    }

                    Allcomments += response.pagination;


                    if (response.pagination == '' && j != 0) {

                        Allcomments += '<nav class="" aria-label="Page navigation example"><ul class="pagination pagination-sm"><li class="page-item active"><button class="page-link">1</button></li></ul></nav>';

                    }

                    Allcomments += '</div></div></div></div></div>';

                    $('.comment_sec').empty().append(Allcomments);

                    $('.question_answers').empty().append(AllQuestionAnswers);

                    $('.salaries_data').empty().append(salaries_data);

                    $("#overlay").fadeOut(300);
                    // $("html, body").animate({ scrollTop: 0 }, "slow");

                } else {

                    $("#overlay").fadeOut(300);

                }
            }

        });
    }

    getCompanyComments(1);

    function paginationComment(page) {
        getCompanyComments(page);
    }
</script>

@endif

@if(Route::currentRouteName() == 'dobra-zaposlitev')

@php $Page = (isset($_GET['page']) && $_GET['page']!='') ? $_GET['page'] : 1; @endphp

<script>
    var PageNo = "{{ $Page }}";

    function getTopCompanies(page) {
        $("#overlay").fadeIn(300);

        $.ajax({
            type: "GET",
            url: "{{route('top_companies')}}",
            data: {
                'page': page
            },
            dataType: 'json',
            success: function(response) {

                if (response.status) {

                    // console.log(response.data);
                    $('.companyListing').empty();

                    var Allcompanies = '<div class="container"><div class="row">';

                    var i = 0;

                    $.each(response.data.data, function(key, company) {

                        Allcompanies += '<div class="col-sm-4"><div class="company_detail">';

                        Allcompanies += '<div class="card card-body"><div class="review_image"><img alt="' + company.title + '" src="{{backend_asset("company_images")}}/' + company.logo + '" width="20%" class="card-img-top">'

                        Allcompanies += '</div><div class="review_detail"><h5 class="card-title">' + company.title + '</h5>';

                        Allcompanies += '<a href="{{route("podjetja")}}/' + company.slug + '"><button class="btn btn-warning">Preberi več </button></a></div></div></div></div>';

                        i++;
                    });

                    if (i == 0) {
                        Allcompanies += ' <div class="alert alert-danger"><p>No data found </p></div>';
                    }

                    Allcompanies += '</div></div>';

                    Allcompanies += response.pagination;

                    $('.companyListing').empty().append(Allcompanies);

                    $("#overlay").fadeOut(300);
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");

                } else {

                    $("#overlay").fadeOut(300);

                }

            }
        });
    }

    getTopCompanies(PageNo);

    function pagination(page) {
        getTopCompanies(page);
    }
</script>
@endif

<script>
    /*$(".owl-4").owlCarousel({
        rewind: !0,
        margin: 10,
        responsiveClass: !0,
        nav: !1,
        autoplay: !1,
        dotsSpeed: 150,
        slideBy: 3,
        autoplayTimeout: 3e3,
        autoplaySpeed: 3,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            },
        },
    });*/
       $(document).ready(function(){
			var vid = $('.myVideo').RTOP_VideoPlayer({
				showFullScreen: true,
				showTimer: true,
				showSoundControl: false,
                showPlayPauseBtn: true,
                playInModal: true,
                showCloseBtn: true,
                showScrubber: true,
                showControlsOnHover: 5000,
			});
		});
		
		$('.right_side_class').on('click',function(){
		    $('#signNewsletterModal').show();
		})
		
		// search
$(document).ready(function(){
    $("#search").autocomplete({
        minLength:3,
        source: "{{ route('autocompleteajax') }}",
            focus: function( event, ui ) {
            //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
            return false;
        },
        classes: {
                    "add_search_data": "highlight"
                },
        select: function( event, ui ) {
            window.location.href = ui.item.url;
        }
    }).data("ui-autocomplete")._renderItem = function( ul, item ) {
        
        //  $(".add_search_data").toggle(!ui.item);
         
        var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" ></div><div class="label"><h4><b>' + item.title + '</b></h4></div></div></a>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
});
</script>