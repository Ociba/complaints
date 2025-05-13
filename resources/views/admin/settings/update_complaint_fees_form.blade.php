@extends('template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-2"></div>
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Complaints Fee</h4>
                    <div class="basic-form">
                        <form method="POST" action="{{ route('settings.update', $setting->id)}}">
                        @csrf
                            <div class="form-group">
                                <input type="text" name="complaint_fee"   value="{{ old('complaint_fee', $setting->complaint_fee) }}"  class="form-control input-flat"   step="0.01" min="0" required>
                            </div>
                            @error('complaint_fee')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3 row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Fee</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection