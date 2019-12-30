@component('mail::message')
{{ $request->message }}

@slot('subcopy')
    <strong>Rispondi direttamente a questa e-mail.</strong>
    Inviato da {{ $request->name }} ({{ $request->email }}) il {{ now()->format(config('boilerplate.time.default')) }} –
    @auth ID: {{ auth()->user()->id }} – @endauth
    IP: {{ $request->ip() }} – Browser: {{ $request->userAgent() }}
@endslot
@endcomponent
