<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card card-raised">
        <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title text-white mb-0">Complaints</h2>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('complaints.status', 'pending') }}" class="btn btn-lg bg-secondary btn-text-white btn-icon" type="button"><i class="material-icons">visibility</i></a>
                </div>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="row">
               @if (session()->has('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger mt-2">
                    {{ session('error') }}
                </div>
                @endif
            </div>
            <!-- Simple DataTables example-->
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sent By</th>
                        <th>Time</th>
                        <th>Type</th>
                        <th>status</th>
                        <th>Next of Kin Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $i=>$complaint)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $complaint->user->name }}</td>
                        <td title="{{ $complaint->created_at->format('M j, Y g:i A') }}">{{ $complaint->created_at->format('M j, Y') }} {{ $complaint->created_at->format('g:i A') }} <p><small class="text-muted">({{ $complaint->created_at->diffForHumans() }})</small></p></td>
                        <td>{{ $complaint->type}}</td>
                        @if( $complaint->status === 'pending')
                        <td><span class="badge bg-danger px-2">{{ @$complaint->status }}</span></td>
                        @else
                        <td><span class="badge bg-success px-2">{{ @$complaint->status }}</span></td>
                        @endif
                        <td>{{ $complaint->user->bioData->next_of_kin_phone ?? 'N/A' }}</td>
                        <td>
                            <a href="/admin/complaint-details/{{$complaint->id}}" class="btn btn-sm btn-outline-success">View More</a>
                            <a href="#" class="btn btn-sm btn-outline-primary" wire:click="markComplaintAsResolved({{$complaint->id}})">Resolve</a>
                       </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
