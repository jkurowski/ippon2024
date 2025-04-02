<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    {!! settings()->get("scripts_head") !!}

    <title>{{ settings()->get("page_title") }}</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ settings()->get("page_description") }}">
    <meta name="robots" content="{{ settings()->get("page_robots") }}">
    <meta name="author" content="{{ settings()->get("page_author") }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/favicon.png') }}">

    <!-- Fonts -->
    <link rel="DNS-prefetch" href="//fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @stack('style')
</head>
<body class="{{ !empty($body_class) ? $body_class : '' }}">
{!! settings()->get("scripts_afterbody") !!}

@include('layouts.partials.header')

@yield('content')

@include('layouts.partials.footer')

@include('layouts.partials.cookies')

<!-- Styles -->
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/styles.min.css?v=0204') }}" rel="stylesheet">

<!-- jQuery -->
<script src="{{ asset('/js/jquery.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('/js/app.js') }}" charset="utf-8"></script>

<script src="{{ asset('js/slick.js') }}" charset="utf-8"></script>

<script src="{{ asset('js/validation.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/pl.js') }}" charset="utf-8"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>

@if(settings()->get("popup_status") == 1)
    <div class="modal" tabindex="-1" id="popModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! settings()->get("popup_text") !!}
                </div>
            </div>
        </div>
    </div>
@endif
<script type="text/javascript">
    AOS.init({disable: 'mobile'});

    document.addEventListener('DOMContentLoaded', function() {
        var selectElement = document.getElementById('filtr-invest');
        var formElement = document.getElementById('dynamic-form');

        selectElement.addEventListener('change', function() {
            var selectedValue = this.value;
            var formAction = '';

            if (selectedValue === 'osiedle-slow') {
                formAction = '/pl/i/osiedle-slow/mieszkania#filtr';
            } else if (selectedValue === 'osiedle-synergia') {
                formAction = '/pl/i/osiedle-synergia/mieszkania#filtr';
            }

            formElement.setAttribute('action', formAction);

            manageFloorOptions(selectedValue);
        });

        manageFloorOptions('osiedle-slow');
    });

    function manageFloorOptions(investment) {
        const floorOptions = $('#filtr-floor option');
        const roomOptions = $('#filtr-rooms option');

        if (investment === 'osiedle-slow') {
            // Show only "", "0", "1", "2"
            floorOptions.hide();
            roomOptions.hide();
            floorOptions.filter('[value=""], [value="0"], [value="1"], [value="2"]').show();
            roomOptions.filter('[value="2"], [value="3"]').show();


        } else if (investment === 'osiedle-synergia') {
            // Show "", "0", "1", "2", "3", "4"
            floorOptions.hide();
            roomOptions.hide();
            floorOptions.filter('[value=""], [value="0"], [value="1"], [value="2"], [value="3"], [value="4"]').show();
            roomOptions.filter('[value="1"], [value="2"], [value="3"], [value="4"]').show();

        } else {
            // Default: show all options
            floorOptions.hide();
            roomOptions.hide();
            floorOptions.filter('[value=""], [value="0"], [value="1"], [value="2"]').show();
            roomOptions.filter('[value="2"], [value="3"]').show();
        }
    }

    $(document).ready(function(){
        $('.number-value span').counterUp({
            delay: 100,
            time: 3000
        });

        $("#slider").responsiveSlides({
            auto:true,
            pager:false,
            nav:false,
            timeout:4000,
            random:false,
            speed: 500
        });

        $(".validateForm").validationEngine({
            validateNonVisibleFields: true,
            updatePromptsPosition:true,
            promptPosition : "topRight:-137px",
            autoPositionUpdate: false
        });

        $('#mainNews .row').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '360px',
            arrows: false,
            dots: true,
            initialSlide: 1,
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        centerPadding: '120px',
                    }
                },
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '70px',
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false,
                        centerPadding: '0px',
                    }
                }
            ]
        });

        $('#awardsCarousel .row').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '80px',
            arrows: true,
            autoplay: true,
            autoplaySpeed: 4000,
            dots: false,
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerPadding: '120px',
                    }
                },
                {
                    breakpoint: 577,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerPadding: '10px',
                    }
                }
            ]
        });

        $('#reviewCarousel .row').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '60px',
            arrows: false,
            dots: true,
        });

        $('#plannedCarousel').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '240px',
            arrows: true,
            dots: true,
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        centerPadding: '120px',
                    }
                },
                {
                    breakpoint: 900,
                    settings: {
                        slidesToShow: 1,
                        centerPadding: '70px',
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false,
                        centerPadding: '0px',
                    }
                }
            ]
        });

        @if(settings()->get("popup_status") == 1)
            const popModal = new bootstrap.Modal(document.getElementById('popModal'), {
                keyboard: false
            });
        @endif
        @if($popup == 1)
        popModal.show();
            setTimeout( function(){
                popModal.hide();
            }, {{ settings()->get("popup_timeout") }} );
        @endif
    });

    function onRecaptchaSuccess(token) {
        $(".validateForm").validationEngine('updatePromptsPosition');
        const isValid = $(".validateForm").validationEngine('validate');
        if (isValid) {
            $("#contact-form").submit();
        } else {
            grecaptcha.reset();
        }
    }

    @if(session('success') || session('warning') || $errors->any())
    $(window).load(function() {
        const aboveHeight = $('header').outerHeight();
        $('html, body').stop().animate({
            scrollTop: $('.validateForm').offset().top-aboveHeight
        }, 1500, 'easeInOutExpo');
    });
    @endif
</script>
{!! settings()->get("scripts_beforebody") !!}
</body>
</html>
