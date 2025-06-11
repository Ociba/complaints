@component('mail::layout')
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }} Emergency Alert System
        @endcomponent
    @endslot

    # 🚨 EMERGENCY ALERT

    **{{ $sosData['user'] }}** has triggered an SOS alert!

    **Location:**
    [View on Google Maps]({{ $sosData['map_url'] }})
    (Latitude: {{ $sosData['latitude'] }}, Longitude: {{ $sosData['longitude'] }})

    **Message:**
    {{ $sosData['message'] }}

    **Time of Alert:**
    {{ $sosData['time'] }}

    @component('mail::button', ['url' => $sosData['map_url'], 'color' => 'red'])
        View Location on Map
    @endcomponent

    @component('mail::panel')
        This is an automated emergency alert. Please respond immediately if you receive this message.
    @endcomponent

    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
