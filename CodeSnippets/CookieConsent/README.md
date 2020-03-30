# Cookie Consent

A simple cookie consent banner.

## Installation

Install the required dependencies:

    composer require spatie/spatie/laravel-cookie-consent

Then, add this to the main layout file (`resources/views/layouts/app.blade.php`), just before the closing `</body>` tag:

    {{-- Cookie Consent --}}
    @include('cookieConsent::index')
