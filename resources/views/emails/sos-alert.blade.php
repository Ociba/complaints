<x-mail::layout>
    {{-- Header --}}
    <x-slot:header>
        <x-mail::header :url="config('app.url')">
            {{ config('app.name') }}
        </x-mail::header>
    </x-slot:header>

    {{-- Body --}}
    <h1 style="color: #dc3545; font-size: 24px; margin-bottom: 20px;">🚨 EMERGENCY ALERT</h1>

    {!! $sosData['user']!!} has triggered an SOS alert!

    {!! $sosData['content'] !!}

    Time {!! $sosData['time'] !!}

    <x-mail::button :url="$sosData['map_url']" color="red">
        View Location on Map
    </x-mail::button>

    {{-- Footer --}}
    <x-slot:footer>
        <x-mail::footer>
            © {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
        </x-mail::footer>
    </x-slot:footer>
</x-mail::layout>
