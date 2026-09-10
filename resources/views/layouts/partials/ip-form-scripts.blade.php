{{-- Skrypty formularzy w nowej oprawie: walidacja + reCAPTCHA.
     Parametry:
       $formId — id elementu <form>, ktory ma zostac wyslany po recaptcha --}}
@push('scripts')
    <script src="{{ asset('js/validation.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/pl.js') }}" charset="utf-8"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".validateForm").validationEngine({
                validateNonVisibleFields: true,
                updatePromptsPosition: true,
                promptPosition: "topRight:-137px",
                autoPositionUpdate: false
            });
        });

        function onRecaptchaSuccess() {
            $(".validateForm").validationEngine('updatePromptsPosition');
            const isValid = $(".validateForm").validationEngine('validate');

            if (isValid) {
                $("#{{ $formId }}").submit();
            } else {
                grecaptcha.reset();
            }
        }

        @if (session('success') || session('error') || session('warning') || $errors->any())
        $(window).load(function () {
            const aboveHeight = $('header').outerHeight();
            $('html, body').stop().animate({
                scrollTop: $('.validateForm').offset().top - aboveHeight
            }, 1500, 'easeInOutExpo');
        });
        @endif
    </script>
@endpush
