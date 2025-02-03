{{-- Success Message --}}
@if (session('success'))
    <x-alert type="success" :message="session('success')" />
@endif

{{-- Error Message --}}
@if (session('error'))
    <x-alert type="error" :message="session('error')" />
@endif

{{-- Warning Message --}}
@if (session('warning'))
    <x-alert type="warning" :message="session('warning')" />
@endif

{{-- Info Message --}}
@if (session('info'))
    <x-alert type="info" :message="session('info')" />
@endif

{{-- Validation Errors --}}
@if ($errors->any())
    <div class="space-y-2">
        @foreach ($errors->all() as $error)
            <x-alert type="error" :message="$error" />
        @endforeach
    </div>
@endif
