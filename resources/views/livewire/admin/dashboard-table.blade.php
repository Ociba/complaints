<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card card-raised">
        <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title text-white mb-0">Pending Complaints Today</h2>
                </div>
                <div class="d-flex gap-2">
                  <a href="{{ route('complaints.status', 'pending') }}" class="btn btn-sm bg-white btn-text-black" > View All &nbsp;<i class="material-icons">visibility</i></a>
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
                        <td title="{{ $complaint->created_at->format('M j, Y g:i A') }}">{{ $complaint->created_at->format('M j, Y') }} {{ $complaint->created_at->format('g:i A') }}
                            <p><small class="text-muted">({{ $complaint->created_at->diffForHumans() }})</small></p>
                        </td>
                        <td>{{ $complaint->type}}</td>
                        <td>
                            @if($complaint->type === 'text')
                            <!-- Display text content -->
                            <div class="mb-1">
                                {{ $complaint->content }}
                            </div>
                            @elseif($complaint->fileComplaint)
                            <!-- Media display -->
                            <div class="mb-3">
                                @php
                                $filename = basename($complaint->fileComplaint->path);
                                $originalName = $complaint->fileComplaint->original_name; // Get original filename
                                $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                                // Normalize file types
                                $isVideo = in_array(strtolower($complaint->fileComplaint->file_type), [
                                'video_recording', 'video_file_upload', 'video', 'video_file'
                                ]) || in_array($extension, ['mp4', 'mov', 'avi', 'mkv', 'webm']);

                                $isAudio = in_array(strtolower($complaint->fileComplaint->file_type), [
                                'audio_recording', 'audio', 'audio_file'
                                ]) || in_array($extension, ['mp3', 'wav', 'ogg', 'm4a']);

                                // Determine actual path
                                if ($isVideo) {
                                $publicPath = 'complaints/recorded_videos/' . $filename;
                                $fileExists = file_exists(public_path($publicPath));
                                $mimeType = $extension === 'mp4' ? 'mp4' : 'webm';
                                } elseif ($isAudio) {
                                $publicPath = 'complaints/recorded_audio/' . $filename;
                                $fileExists = file_exists(public_path($publicPath));
                                $mimeType = $extension === 'mp3' ? 'mpeg' : ($extension === 'wav' ? 'wav' : 'ogg');
                                }
                                @endphp

                                @if($isVideo)
                                @if($fileExists)
                                <div class="video-container p-2">
                                    <video controls width="100%" style="max-height: 100px;">
                                        <source src="{{ asset($publicPath) }}" type="video/{{ $mimeType }}">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                @else
                                <div class="alert alert-danger p-2">
                                    <i class="material-icons">error</i> Video file not found: {{ $originalName }}
                                </div>
                                @endif

                                @elseif($isAudio)
                                @if($fileExists)
                                <div class="audio-container p-2">
                                    <audio controls class="w-100">
                                        <source src="{{ asset($publicPath) }}" type="audio/{{ $mimeType }}">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                                @else
                                <div class="alert alert-danger p-2">
                                    <i class="material-icons">error</i> Audio file not found: {{ $originalName }}
                                </div>
                                @endif

                                @else
                                <div class="alert alert-info p-2">
                                    <i class="material-icons">info</i>
                                    File attachment: {{ $complaint->fileComplaint->original_name }}
                                    <span class="text-muted">(.{{ $extension }}, {{ round($complaint->fileComplaint->size / 1024) }} KB)</span>
                                </div>
                                @endif
                            </div>
                            @endif
                        </td>
                        @if( $complaint->status === 'pending')
                        <td><span class="badge bg-danger px-2">{{ @$complaint->status }}</span></td>
                        @else
                        <td><span class="badge bg-success px-2">{{ @$complaint->status }}</span></td>
                        @endif
                        <td>{{ $complaint->user->bioData->next_of_kin_phone ?? 'N/A' }}</td>
                        <td>
                            <a href="/admin/complaint-details/{{$complaint->id}}" class="btn btn-sm btn-outline-success mb-2">View More</a>
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