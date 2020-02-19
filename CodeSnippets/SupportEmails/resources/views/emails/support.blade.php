@component('mail::message')
{{ $request->message }}

@slot('subcopy')
    <strong>Rispondi direttamente a questa e-mail.</strong>
    Inviato da {{ $request->input('name') }} ({{ $request->input('email') }}) il {{ now()->format(config('bancadelgusto.time.default')) }} –
    @auth ID: {{ auth()->user()->id }} – @endauth
    IP: {{ $request->ip() }} – Browser: {{ $request->userAgent() }}
@endslot
@endcomponent
