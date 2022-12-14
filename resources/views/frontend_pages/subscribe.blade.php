<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Site Meta Data -->
    <meta name="author" content="SoClose">
    <meta name="description" content="SoClose">
    <meta name="keywords" content="SoClose">
	<!-- Site Title -->
	<title>Nftisseur-Flips</title>
	<!-- Favicon Link -->
	<link rel="icon" type="image/png" sizes="512x512" href="{{ asset('frontend_assets') }}/images/favicon/android-chrome-512x512.png">
	<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('frontend_assets') }}/images/favicon/android-chrome-192x192.png">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend_assets') }}/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend_assets') }}/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend_assets') }}/images/favicon/favicon-16x16.png">
	<link rel="icon" type="image/x-icon" href="{{ asset('frontend_assets') }}/images/favicon/favicon.ico">
	<!-- All CSS -->
	<link rel="stylesheet" href="{{ asset('frontend_assets') }}/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_assets') }}/plugins/fancybox/css/jquery.fancybox.min.css">
	<link rel="stylesheet" href="{{ asset('frontend_assets') }}/plugins/slick-slider/css/slick.css">
	{{-- <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/style.css"> --}}
    @include('admin.css_setting.css')
</head>
<body>
	<!-- Header Section -->
	<header class="header w-100">
		<nav class="navbar navbar-expand-md">
			<div class="container">
				<a class="navbar-brand" href="{{ route('home') }}">
					<img src="{{ asset('uploads/generalSettings') }}/{{ generalsettings()->logo }}" alt="logo" class="navbar-brand__image">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="1em" height="1em" viewBox="0 0 172 172" style=" fill:#000000;">
						<path d="M91.22092,26.88933c-22.11275,-0.60917 -40.98617,1.24342 -62.99142,3.5045c-2.18942,0.22575 -4.45767,0.48733 -6.3425,1.62325c-4.85183,2.92042 -4.94858,7.72567 -4.45767,13.36942c0.16125,1.8705 0.58408,4.1065 2.32917,4.7945c0.48375,0.18992 1.01408,0.22933 1.53725,0.26517c39.77858,2.63733 84.08292,1.37242 123.82925,-1.677c4.89483,-0.37625 6.12033,-0.88508 8.73258,-5.04175c2.95625,-4.70133 2.2145,-10.99367 -2.53342,-13.87108c-4.7515,-2.87383 -6.16692,-3.12467 -11.72108,-3.13542c-14.99983,-0.02508 -33.3895,0.58408 -48.38217,0.16842z" fill="#ffd700"></path><path d="M67.65692,53.67475c-15.24708,0 -30.97075,-0.41208 -46.483,-1.4405c-0.54467,-0.03583 -1.30433,-0.07883 -2.07833,-0.38342c-3.01,-1.18967 -3.3325,-4.90558 -3.45075,-6.30667c-0.4945,-5.70108 -0.49092,-11.56342 5.31767,-15.05717c2.28975,-1.37958 4.94858,-1.65192 7.08425,-1.86692c20.73675,-2.13208 40.334,-4.16025 63.22433,-3.51525v0c9.27008,0.258 19.88392,0.11467 30.143,-0.0215c6.30667,-0.08242 12.49508,-0.15408 18.189,-0.1505c5.81575,0.01433 7.53933,0.30817 12.642,3.39342c2.451,1.4835 4.16742,3.85567 4.8375,6.68292c0.75967,3.21067 0.13617,6.73308 -1.71283,9.675c-2.97417,4.72283 -4.72283,5.45742 -10.11217,5.87308c-20.77258,1.59458 -48.29617,3.1175 -77.60067,3.1175zM82.68542,28.56633c-19.13858,0 -36.2705,1.763 -54.27317,3.61558c-2.26467,0.23292 -4.11367,0.48017 -5.60075,1.37242c-3.70517,2.22883 -4.11725,5.68317 -3.59767,11.68167c0.16483,1.92783 0.56975,3.03508 1.20042,3.28233c0.24008,0.09317 0.65575,0.11825 0.98542,0.13975c45.1285,2.98492 92.11317,0.74175 123.58558,-1.67342c4.386,-0.33683 5.07758,-0.59125 7.34942,-4.21042c1.34017,-2.13208 1.79883,-4.66192 1.26133,-6.93733c-0.31533,-1.33658 -1.12875,-3.19275 -3.20708,-4.44692c-4.43975,-2.68392 -5.49325,-2.86308 -10.79658,-2.87742c-5.67958,-0.01433 -11.84292,0.07167 -18.13167,0.15408c-10.2985,0.13617 -20.94458,0.27592 -30.28992,0.01792v0c-2.87742,-0.08242 -5.70108,-0.11825 -8.48533,-0.11825z" fill="#ffffff"></path><path d="M88.88458,76.70842c-20.50383,0.68442 -40.807,0.18275 -61.31442,0.817c-3.62275,0.11108 -7.84392,0.54825 -9.77175,3.61558c-1.89917,3.02433 -1.2685,8.23092 -0.77042,11.87875c0.44433,3.2465 2.55492,4.74433 5.81575,5.07042c3.78042,0.37983 8.88667,0.22933 12.69217,0.29742c33.05983,0.60917 68.38075,-0.82058 100.76333,-0.02867c4.43975,0.1075 9.21992,-0.74892 12.513,-3.72667c2.69825,-2.44025 3.88075,-6.20275 4.0205,-9.83983c0.11825,-3.08525 -0.5805,-6.46075 -2.96342,-8.42442c-2.33275,-1.92425 -5.62942,-2.00308 -8.65375,-1.98517c-18.1245,0.1075 -34.21367,1.72358 -52.331,2.32558z" fill="#ffd700"></path><path d="M54.16925,100.3405c-6.28517,0 -12.53092,-0.04658 -18.66558,-0.15767c-3.76967,-0.07525 -8.92967,0.08242 -12.8355,-0.30817c-5.45025,-0.54108 -7.04125,-3.89508 -7.41392,-6.61125c-0.61992,-4.54367 -1.10367,-9.675 1.032,-13.072c2.63375,-4.1925 8.44233,-4.37167 11.23375,-4.45767c10.04767,-0.30817 20.19925,-0.34758 30.014,-0.38342c10.24475,-0.03942 20.83708,-0.07883 31.29325,-0.43v0c7.38883,-0.24367 14.53758,-0.67008 21.44983,-1.075c9.91867,-0.58408 20.17417,-1.18608 30.93133,-1.25058c2.74842,0 6.84775,-0.03942 9.80042,2.39725c2.49758,2.04967 3.78042,5.56133 3.612,9.87567c-0.17917,4.63325 -1.81675,8.57492 -4.60817,11.10117c-4.02767,3.64425 -9.72517,4.28208 -13.76,4.18892c-16.813,-0.4085 -34.77625,-0.21858 -52.1375,-0.03225c-9.87567,0.1075 -19.95917,0.215 -29.94592,0.215zM88.9455,78.50008c-10.50992,0.35117 -21.13092,0.39058 -31.40075,0.43c-9.79325,0.03942 -19.92333,0.07525 -29.91725,0.38342c-3.47583,0.10392 -6.89075,0.51958 -8.30975,2.77708c-1.61967,2.58358 -0.89942,7.85108 -0.51242,10.6855c0.215,1.55875 0.8815,3.19633 4.21758,3.52958c3.70875,0.37267 8.83292,0.22217 12.54525,0.28667c15.83117,0.29383 32.4435,0.11467 48.51117,-0.06092c17.39708,-0.18633 35.38542,-0.37625 52.26292,0.03225c3.40417,0.09317 8.11983,-0.41567 11.26958,-3.26442c2.795,-2.52625 3.35042,-6.46075 3.43283,-8.58208c0.07167,-1.83467 -0.13617,-5.17792 -2.31125,-6.96958c-1.806,-1.4835 -4.601,-1.58383 -7.5035,-1.57667c-10.664,0.0645 -20.41783,0.63783 -30.745,1.24342c-6.93375,0.41567 -14.10758,0.8385 -21.53942,1.08575z" fill="#ffffff"></path><path d="M85.3335,121.53233c-21.07358,0.18992 -39.4955,-1.64117 -60.58342,-0.82058c-1.38317,0.05375 -2.84875,0.40133 -3.83058,1.37958c-1.35092,1.34733 -1.22908,3.52958 -1.01408,5.42517l0.47658,4.20325c0.4085,3.612 3.64425,9.94733 7.28133,9.96883c31.2395,0.17917 60.89517,0.08958 92.13467,-0.26517c6.16333,-0.07167 12.341,-0.1505 18.4685,-0.80983c3.83417,-0.41208 7.64683,-1.04633 11.40933,-1.90633c1.41183,-0.3225 2.91325,-0.73458 3.8485,-1.83825c0.76683,-0.91017 1.02125,-2.13925 1.1825,-3.31817c0.28667,-2.07475 0.37625,-4.17458 0.27592,-6.26367c-0.17917,-3.70517 -3.22142,-6.68292 -6.92658,-6.79042c-21.10942,-0.61633 -41.43408,0.84567 -62.72267,1.03558z" fill="#ffd700"></path><path d="M58.77383,143.57342c-10.277,0 -20.597,-0.02867 -31.12842,-0.08958c-5.0095,-0.02867 -8.60717,-7.654 -9.04792,-11.55983l-0.47658,-4.20325c-0.18992,-1.68775 -0.54467,-4.82675 1.53008,-6.9015c1.16817,-1.161 2.90608,-1.82033 5.02742,-1.89917c11.98625,-0.45867 23.3275,-0.07525 34.29608,0.30458c8.46383,0.29383 17.20717,0.60558 26.34108,0.516v0c8.11983,-0.07525 16.22175,-0.33325 24.0585,-0.58767c12.60617,-0.4085 25.63517,-0.82417 38.72867,-0.44433c4.63325,0.13617 8.43875,3.86642 8.6645,8.49608c0.1075,2.20017 0.01075,4.41825 -0.29025,6.59692c-0.19708,1.45125 -0.52675,2.97417 -1.58742,4.22833c-1.28642,1.52292 -3.16408,2.04967 -4.82317,2.4295c-3.81267,0.87075 -7.72208,1.52292 -11.61358,1.94217c-6.32458,0.67725 -12.86775,0.7525 -18.6405,0.82058c-21.00908,0.2365 -40.93958,0.35117 -61.0385,0.35117zM36.25617,122.28842c-3.73742,0 -7.52858,0.0645 -11.438,0.21858c-1.18967,0.043 -2.12492,0.34758 -2.63733,0.85642c-0.74892,0.74533 -0.68083,2.33992 -0.49808,3.95242l0.47658,4.20325c0.37983,3.3755 3.35042,8.36708 5.51117,8.38142c31.10692,0.18633 60.37558,0.09675 92.10242,-0.26517c5.97342,-0.06808 12.1475,-0.13617 18.30008,-0.79908c3.75175,-0.40492 7.52142,-1.03558 11.19792,-1.8705c1.14308,-0.26158 2.31125,-0.57333 2.881,-1.25058c0.46583,-0.55183 0.64858,-1.47992 0.774,-2.40083c0.27233,-1.96008 0.35833,-3.956 0.26158,-5.934c-0.13617,-2.76992 -2.41517,-5.00592 -5.18867,-5.08833c-12.98242,-0.37983 -25.95767,0.03583 -38.51008,0.44433c-7.85467,0.25083 -15.97808,0.516 -24.14092,0.58767v0c-9.19125,0.10033 -17.99192,-0.22217 -26.49517,-0.516c-7.64325,-0.26517 -15.00342,-0.51958 -22.5965,-0.51958z" fill="#ffffff"></path></g></g>
					</svg>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav text-center mx-auto">
						<li class="nav-item">
							<a class="nav-link" href="./">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="./subscribe.html">Subscribe</a>
						</li>
					</ul>

					<ul class="navbar-nav navbar-nav--social text-center">
						<li class="nav-item">
							<a class="nav-icon" href="#!" target="_blank">
								<i class="bi bi-youtube"></i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-icon" href="#!" target="_blank">
								<i class="bi bi-instagram"></i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-icon" href="#!" target="_blank">
								<i class="bi bi-twitter"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- Off Canvas Menu Toggler -->
	<div class="offCanvasMenuCloser position-fixed" data-toggle="collapse" data-target="#navbarSupportedContent" role="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></div>

	<!-- Contact Section -->
 <section class="contact section-gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-9">
                    <form role="form" action="{{ route('stripe.payment') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <div class="section-header">
                            <h1 class="section-header__title text-center zikzak-title"><span class="color-blue">Subscribe</span></h1>
                        </div>
                        <div class="step-block step-block--blue mb-4">
                            ??tape 1 : Informations de contact
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Pr??nom <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" required>
                            {{-- <div class="alert alert-danger">
                                This Field is requered
                            </div> --}}
                        </div>

                        <div class="form-group">
                            <label for="mail" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="name" class="form-label">Discord Information <span class="text-danger">*</span></label>
                            <select name="discord_id" id="discord_id" class="form-control">
                                <option selected disabled value>{{ __("Select Discord") }}</option>
                                @foreach ($discord_info as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}->Price: ({{ $item->price }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="step-block step-block--pink mb-4">
                            ??tape 2 : Informations de paiement
                        </div>
                        <div class="form-group text-center">
                            <img src="{{ asset('frontend_assets') }}/images/payment/payment-methodes.png" alt="payment methde image" class="form-image">
                        </div>
                        <div class="form-group">
                            <label for="card_number" class="form-label">Num??ro de carte <span class="text-danger">*</span></label>
                            <input type="number" id="card_number" name="card_number" class="form-control card-number" size="20" placeholder="1234 1234 1234 1234">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="expiration_month" class="form-label">Mois d'expiration <span class="text-danger">*</span></label>
                                    <input type="number" id="expiration_month" name="expiration_month" class="form-control card-expiry-month" placeholder="MM">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="expiration_year" class="form-label">Ann??e d'expiration <span class="text-danger">*</span></label>
                                    <input type="number" id="expiration_year" name="expiration_year" class="form-control card-expiry-year" placeholder="AA">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cvc_code" class="form-label">Code de s??curit?? <span class="text-danger">*</span></label>
                                    <input type="number" id="cvc_code" name="cvc_code" class="form-control card-cvc" placeholder="CVC">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="primary-btn rounded-pill">VALIDER MA COMMANDE</button>
                        </div>
                    </form>

                    {{-- <form role="form" action="{{ route('stripe.payment') }}" method="post" class="require-validation"
                    data-cc-on-file="false"
                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                    id="payment-form">
                        @csrf

                        <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Name on Card</label>
                        <input class='form-control' size='4' type='text'>
                        </div>
                        </div>

                        <div class='form-row row'>
                        <div class='col-xs-12 form-group card required'>
                        <label class='control-label'>Card Number</label> <input
                        autocomplete='off' class='form-control card-number' size='20'
                        type='text'>
                        </div>
                        </div>

                        <div class='form-row row'>
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                        <label class='control-label'>CVC</label> <input autocomplete='off'
                        class='form-control card-cvc' placeholder='ex. 311' size='4'
                        type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Month</label> <input
                        class='form-control card-expiry-month' placeholder='MM' size='2'
                        type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Expiration Year</label> <input
                        class='form-control card-expiry-year' placeholder='YYYY' size='4'
                        type='text'>
                        </div>
                        </div>

                        <div class='form-row row'>
                        <div class='col-md-12 error form-group hide'>
                        <div class='alert-danger alert'>Please correct the errors and try
                        again.</div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                        </div>
                        </div>

                    </form> --}}
				</div>
			</div>
		</div>
	</section>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >
                            <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">??</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>

</div>

	<!-- Footer Section -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ul class="footer--social nav justify-content-center">
						<li class="footer--social__item">
							<a class="footer--social__icon" href="#!" target="_blank">
								<i class="bi bi-youtube"></i>
							</a>
						</li>
						<li class="footer--social__item">
							<a class="footer--social__icon" href="#!" target="_blank">
								<i class="bi bi-instagram"></i>
							</a>
						</li>
						<li class="footer--social__item">
							<a class="footer--social__icon" href="#!" target="_blank">
								<i class="bi bi-tiktok"></i>
							</a>
						</li>
						<li class="footer--social__item">
							<a class="footer--social__icon" href="#!" target="_blank">
								<i class="bi bi-twitter"></i>
							</a>
						</li>
					</ul>
					<p class="footer__copyright text-center"><a href="#!" class="footer__copyright__link">SoClose</a> Copyright 2022 ?? All rights Reserved.</p>
				</div>
			</div>
		</div>
	</footer>


	<!-- Scroll To Top Button -->
	<div class="scroll-top position-fixed">
		<button type="button" class="scroll-top__btn border-0 d-inline-flex align-items-center justify-content-center">
			<i class="bi bi-chevron-up"></i>
		</button>
	</div>

	<!-- All Scripts -->
	<script src="{{ asset('frontend_assets') }}/js/jquery-1.12.4.min.js"></script>
	<script src="{{ asset('frontend_assets') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ asset('frontend_assets') }}/plugins/fancybox/js/jquery.fancybox.min.js"></script>
	<script src="{{ asset('frontend_assets') }}/plugins/slick-slider/js/slick.js"></script>
	<script src="{{ asset('frontend_assets') }}/js/script.js"></script>

    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() { var $form         = $(".require-validation");

    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid         = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
        });

        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }

    });

    function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
</body>
</html>
