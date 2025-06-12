<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="container-fluid p-0">
    <div class="card card-raised">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title">Complaint Location</h4>
        </div>
        <div class="card-body text-center p-5">
            @if($location)
                {{--<img class="img-fluid mb-4" src="{{ asset('asset/admin/assets/img/illustrations/world.svg') }}" alt="Map" style="max-width: 15rem" />--}}
                <div class="display-6">Complaint Location</div>
                <p class="card-text mb-4">
                    Latitude: {{ $location->latitude }}<br>
                    Longitude: {{ $location->longitude }}
                </p>
                <a href="{{ $googleMapsUrl }}" target="_blank" class="btn btn-primary btn-lg">
                    <i class="material-icons">map</i> Open in Google Maps
                </a>
            @else
                <img class="img-fluid mb-4" src="{{ asset('asset/admin/assets/img/illustrations/map-missing.svg') }}" alt="No location" style="max-width: 15rem" />
                <div class="display-6">Location data not available</div>
                <p class="card-text">This complaint doesn't have location coordinates.</p>
            @endif
        </div>
    </div>
</div>
</div>
