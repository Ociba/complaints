<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="card card-raised">
        <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title text-white mb-0">
                    @if ($status === 'pending')
                        Pending Complaints
                    @elseif ($status === 'resolved')
                        Resolved Complaints
                    @elseif ($status === 'emergency')
                        Emergency Complaints
                    @else
                        All Complaints
                    @endif
                    </h2>
                </div>
                <div class="d-flex gap-4">
                    <div class="dropdown">
                        <button class="btn btn-lg bg-white btn-text-black btn-icon dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            <i class="material-icons">download</i> 
                        </button>
                        <ul class="dropdown-menu" style="max-height: 200px; overflow-y: auto;">
                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/pending/date') }}">Pending Today</a></li>
                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/pending/week') }}">Pending This Week</a></li>
                            <li><a class="dropdown-item small py-1 px-2;" href="{{ url('/admin/export-complaints/pending/month') }}">Pending This Month</a></li>
                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/pending/year') }}">Pending This Year</a></li>

                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/resolved/date') }}">Resolved Today</a></li>
                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/resolved/week') }}">Resolved This Week</a></li>
                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/resolved/month') }}">Resolved This Month</a></li>
                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/resolved/year') }}">Resolved This Year</a></li>

                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/all/date') }}">All Today</a></li>
                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/all/week') }}">All This Week</a></li>
                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/all/month') }}">All This Month</a></li>
                            <li><a class="dropdown-item small py-1 px-2" href="{{ url('/admin/export-complaints/all/year') }}">All This Year</a></li>
                        </ul>
                    </div>
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
                        <th>Content</th>
                        <th>status</th>
                        <th>NOK Contact</th>
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
                        <td>{{ $complaint->content}}</td>
                        @if( $complaint->status === 'pending')
                        <td><span class="badge bg-danger px-2">{{ @$complaint->status }}</span></td>
                        @else
                        <td><span class="badge bg-success px-2">{{ @$complaint->status }}</span></td>
                        @endif
                        <td>{{ $complaint->user->bioData->next_of_kin_phone ?? 'N/A' }}</td>
                        <td>
                            <a href="/admin/complaint-details/{{$complaint->id}}" class="btn btn-sm btn-outline-success mb-1">View More</a>
                            @if ($complaint->status == 'pending' || $complaint->status == 'emergency')
                            <form method="POST" action="{{ route('complaints.resolve', $complaint->id) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    Mark Resolved
                                </button>
                            </form>
                            @endif
                       </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
