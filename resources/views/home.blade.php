@extends('template')

@section('content')
<div class="row">
    <div class="col-3">
        <div class="card card-widget">
            <div class="card-body gradient-3">
                <div class="media">
                    <span class="card-widget__icon"><i class="icon-home"></i></span>
                    <div class="media-body">
                        <h2 class="card-widget__title">520</h2>
                        <h5 class="card-widget__subtitle">All Properties</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card card-widget">
            <div class="card-body gradient-4">
                <div class="media">
                    <span class="card-widget__icon"><i class="icon-tag"></i></span>
                    <div class="media-body">
                        <h2 class="card-widget__title">720</h2>
                        <h5 class="card-widget__subtitle">Open Tickets</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card card-widget">
            <div class="card-body gradient-4">
                <div class="media">
                    <span class="card-widget__icon"><i class="icon-emotsmile"></i></span>
                    <div class="media-body">
                        <h2 class="card-widget__title">1002</h2>
                        <h5 class="card-widget__subtitle">Task Completed</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card card-widget">
            <div class="card-body gradient-9">
                <div class="media">
                    <span class="card-widget__icon"><i class="icon-ghost"></i></span>
                    <div class="media-body">
                        <h2 class="card-widget__title">420</h2>
                        <h5 class="card-widget__subtitle">Threats</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <span class="display-5"><i class="icon-earphones gradient-3-text"></i></span>
                    <h2 class="mt-3">5K Songs</h2>
                    <p>Your playlist download complete</p><a href="javascript:void()" class="btn gradient-3 btn-lg border-0 btn-rounded px-5">Download
                        now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <span class="display-5"><i class="icon-diamond gradient-4-text"></i></span>
                    <h2 class="mt-3">765 Point</h2>
                    <p>Nice, you are doing great!</p>
                    <a href="javascript:void()" class="btn gradient-4 btn-lg border-0 btn-rounded px-5">Redeem
                        now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <span class="display-5"><i class="icon-user gradient-4-text"></i></span>
                    <h2 class="mt-3">5210 Users</h2>
                    <p>Currently active</p><a href="javascript:void()" class="btn gradient-4 btn-lg border-0 btn-rounded px-5">Add
                        more</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <span class="display-5"><i class="icon-grid gradient-9-text"></i></span>
                    <h2 class="mt-3">2 Grid Servers</h2>
                    <p>Currently inactive</p><a href="javascript:void()" class="btn gradient-9 btn-lg border-0 btn-rounded px-5">Fix
                        now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection