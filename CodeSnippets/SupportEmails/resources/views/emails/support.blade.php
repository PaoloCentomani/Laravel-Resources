<p>{{ $request->message }}</p>

<hr>

<div style="font-size: 0.85rem; color: #999;">
    <p>Inviato da <strong>{{ $request->name }}</strong> ({{ $request->email }}) il {{ now()->format(config('boilerplate.time.default')) }}</p>
    <p>IP: {{ $request->ip() }} – Browser: {{ $request->userAgent() }}</p>
</div>
