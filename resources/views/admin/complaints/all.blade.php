@extends('template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Complaints</h4>
                <div class="container mt-3">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Payments Status</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complaints as $i=>$complaint)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $complaint->creator->name }}</td>
                                @if( $complaint->payment->status == 'pending')
                                <td><span class="badge badge-primary px-2">{{ $complaint->payment->status }}</span></td>
                                @else
                                <td><span class="badge badge-secondary px-2">{{ $complaint->payment->status }}</span></td>
                                @endif
                                <td>{{ $complaint->title }}</td>
                                <td>{{ $complaint->description }}</td>
                                @if( $complaint->status == 'pending')
                                <td><span class="badge badge-primary px-2">{{ $complaint->status }}</span></td>
                                @else
                                <td><span class="badge badge-success px-2">{{ $complaint->status }}</span></td>
                                @endif
                                <td>{{ $complaint->created_at }}</td>
                                <td>
                                <form action="{{ route('complaints.resolve', $complaint) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm mb-1 btn-outline-primary">
                                        Resolve
                                    </button>
                                </form>
                                
                                <form action="{{ route('complaints.refund', $complaint) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm mb-1 btn-outline-warning">
                                    Refund
                                    </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection