<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="row mt-4 gx-5">
        <!-- Projects column-->
        <div class="col-xl-12 col-lg-12 col-sm-12 mb-5">
            <div class="card card-raised">
                <div class="card-header bg-primary text-white px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-4">
                            <h2 class="card-title text-white mb-0">
                            @if ($type === 'text')
                                Text Complaints
                            @elseif ($type === 'audio')
                                Audio Complaints
                            @else ($type === 'video')
                                Video Complaints
                            @endif
                            </h2>
                        </div>
                        <div class="d-flex gap-4">

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
                                <th>Time</th>
                                <th>Type</th>
                                <th>Content</th>
                                <th>status</th>
                                <th>NOK Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($complaints as $i=>$complaint)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td title="{{ $complaint->created_at->format('M j, Y g:i A') }}">{{ $complaint->created_at->format('M j, Y') }} {{ $complaint->created_at->format('g:i A') }}
                                    <p><small class="text-muted">({{ $complaint->created_at->diffForHumans() }})</small></p>
                                </td>
                                <td>{{ $complaint->type}}</td>
                                <td>{{ $complaint->content}}</td>
                                @if( $complaint->status === 'pending')
                                <td><span class="badge bg-danger px-2">{{ @$complaint->status }}</span></td>
                                @else
                                <td><span class="badge bg-success px-2">{{ @$complaint->status }}</span></td>
                                @endif
                                <td>{{ $complaint->user->bioData->next_of_kin_phone ?? 'N/A' }}</td>
                                <td>
                                    <a href="/admin/complaint-details/{{$complaint->id}}" class="btn btn-sm btn-outline-success mb-1">View</a>
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
