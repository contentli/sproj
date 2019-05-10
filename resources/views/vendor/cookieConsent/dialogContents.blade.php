<section class="js-cookie-consent cookie-consent">
    <div class="container">

        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <div class="content">
                        <p>
                            <span class="cookie-consent__message">
                                {!! trans('cookieConsent::texts.message') !!}
                            </span>
                            <span class="cookie-consent__links">
                                <a href="{{ route('privacy') }}">{{ __('Read more about cookie usage in our privacy policy here.') }}</a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="level-right">
                <div class="level-item">
                    <button class="js-cookie-consent-agree cookie-consent__agree button is-primary">
                        {{ trans('cookieConsent::texts.agree') }}
                    </button>
                </div>
            </div>
        </div>


    </div>

</section>
