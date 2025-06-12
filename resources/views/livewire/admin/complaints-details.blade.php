<div>
    <style>
        .video-container {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }

        .video-info {
            font-size: 0.8rem;
        }

        .ratio-16x9 {
            aspect-ratio: 16 / 9;
        }
    </style>
    <!-- Divider-->
    <hr class="mt-0 mb-5" />
    <!-- Profile content row-->
    <div class="row gx-5">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card shadow card-raised mb-5">
                <div class="card-body p-5">
                    <div class="card-title">{{ $details->user->name }}</div>
                    <div class="card-subtitle mb-4"></div>
                    <div class="text-left">
                        <p>
                            <span class="fw-bold">Status: </span>
                            <span class="badge bg-{{ $details->status == 'resolved' ? 'success' : 'warning' }}">
                                {{ ucfirst($details->status) }}
                            </span>
                        </p>
                        <p><span class="fw-bold">Country: </span> {{ @$details->user->bioData->country }}</p>
                        <p><span class="fw-bold">Type: </span> <span class="text-danger fw-bold">{{ ucfirst($details->type) }}</span></p>
                        <p><span class="fw-bold">Date:</span> {{ $details->created_at->format('M j, Y') }}</p>
                        <p><span class="fw-bold">Time:</span> {{ $details->created_at->format('g:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card shadow card-raised mb-5">
                <div class="card-body p-5">
                    <div class="card-title mb-4">Complaint Details</div>
                        <!-- Complaint Content -->
                        <div class="mb-4">
                            <mwc-textfield class="w-100" label="Complaint Type" outlined=""
                                value="{{ $details->type }}" readonly></mwc-textfield>
                        </div>

                        @if($details->type === 'text')
                        <!-- Display text content -->
                        <div class="mb-4">
                            <mwc-textarea class="w-100" label="Complaint Content" outlined rows="4" value="{{ $details->content }}" readonly>
                               
                            </mwc-textarea>
                        </div>
                        @elseif($details->fileComplaint)
                        <!-- Enhanced media display with automatic type detection -->
                        <div class="mb-4">
                            @php
                            // Determine actual file type
                            $filePath = public_path('complaints/recorded_videos/' . basename($details->fileComplaint->path));
                            if (!file_exists($filePath)) {
                            $filePath = public_path('complaints/attachments/' . basename($details->fileComplaint->path));
                            }
                            $extension = strtolower(pathinfo($details->fileComplaint->path, PATHINFO_EXTENSION));
                            $isVideo = in_array($extension, ['mp4','mov','avi','mkv','webm','temp']) ||
                            in_array(strtolower($details->fileComplaint->file_type), ['video','video_file_upload']);
                            $isAudio = in_array($extension, ['mp3','wav','ogg','m4a']) ||
                            in_array(strtolower($details->fileComplaint->file_type), ['audio','audio_recording']);
                            $isImage = in_array($extension, ['jpg','jpeg','png','gif']);
                            @endphp

                            @if($isVideo && file_exists($filePath))
                            <!-- Video Player -->
                            <div class="video-container mb-4">
                                <div class="ratio ratio-16x9">
                                    <video controls class="w-100" style="max-height: 400px;">
                                        <source src="{{ route('video.play', ['filename' => basename($details->fileComplaint->path)]) }}"
                                            type="{{ $extension === 'temp' ? 'video/mp4' : 'video/'.$extension }}">
                                        Your browser does not support HTML5 video.
                                    </video>
                                </div>
                                <div class="mt-2 d-flex justify-content-between align-items-center">
                                    <div class="video-info small text-muted">
                                        <i class="material-icons text-danger fs-1">mp4</i>
                                    </div>
                                    <a href="{{ route('video.play', ['filename' => basename($details->fileComplaint->path)]) }}"
                                        download class="btn btn-sm btn-primary">
                                        <i class="material-icons">download</i> Download
                                    </a>
                                </div>
                            </div>


                            @elseif(in_array($details->fileComplaint->file_type, ['audio_recording', 'audio']))
                            <!-- Audio Player -->
                            <audio controls class="w-100">
                                <source src="{{ route('audio.play', ['filename' => basename($details->fileComplaint->path)]) }}"
                                    type="audio/mp4">
                                Your browser doesn't support audio
                            </audio>
                            <div class="mt-2 w-100">
                                <a href="{{ route('audio.play', ['filename' => basename($details->fileComplaint->path)]) }}"
                                    download class="btn btn-sm btn-outline-primary w-100">
                                    <i class="material-icons">download</i> Download Audio
                                </a>
                            </div>

                            @elseif($isImage && file_exists($filePath))
                            <!-- Image Display -->
                            <div class="text-center mb-3">
                                <img src="{{ asset('complaints/attachments/' . basename($details->fileComplaint->path)) }}"
                                    alt="Complaint Image" class="img-fluid rounded" style="max-height: 400px;">
                            </div>
                            <div class="text-center">
                                <a href="{{ asset('complaints/attachments/' . basename($details->fileComplaint->path)) }}"
                                    download class="btn btn-primary">
                                    <i class="material-icons">download</i> Download Image
                                </a>
                            </div>

                            @else
                            <!-- Default file download -->
                            <div class="alert alert-info">
                                <i class="material-icons">info</i> This complaint contains a file attachment
                            </div>
                            <a href="{{ asset('complaints/attachments/' . basename($details->fileComplaint->path)) }}"
                                download="{{ $details->fileComplaint->original_name ?? basename($details->fileComplaint->path) }}"
                                class="btn btn-primary">
                                <i class="material-icons">download</i>
                                Download {{ $details->fileComplaint->file_type ? ucfirst($details->fileComplaint->file_type) : 'Attachment' }}
                            </a>
                            @endif
                        </div>
                        @endif

                        <!-- User Information -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-4">
                                <mwc-textfield class="w-100" label="User Name" outlined=""
                                    value="{{ $details->user->name }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-6 mb-4">
                                <mwc-textfield class="w-100" label="User Email" outlined=""
                                    value="{{ $details->user->email }}" readonly></mwc-textfield>
                            </div>
                        </div>

                        <!-- Bio Data -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-4">
                                <mwc-textfield class="w-100" label="Company" outlined=""
                                    value="{{ $details->user->bioData->company ?? 'N/A' }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-6 mb-4">
                                <mwc-textfield class="w-100" label="Next of Kin" outlined=""
                                    value="{{ $details->user->bioData->next_of_kin ?? 'N/A' }}" readonly></mwc-textfield>
                            </div>
                        </div>

                        <div class="row mb-3">
                        <!-- Next of Kin Contact -->
                        <div class="col-md-6 mb-4">
                            <mwc-textfield class="w-100" label="Next of Kin Phone" outlined=""
                                value="{{ $details->user->bioData->next_of_kin_phone ?? 'N/A' }}" readonly></mwc-textfield>
                        </div>

                        @if($details->fileComplaint)
                        <!-- File Complaint Details -->
                        <div class="col-md-6 mb-3">
                            <mwc-textfield class="w-100" label="File Type" outlined=""
                                value="{{ $details->fileComplaint->file_type }}" readonly></mwc-textfield>
                        </div>
                    </div>
                        @endif
                        <a href="/admin/print-complaint/{{$details->id}}" class="btn btn-sm text-white btn-warning mt-3"><i class="material-icons">print</i>Print</a>
                        <a href="/admin/locate/{{$details->id}}" class="btn btn-sm btn-success mt-3"><i class="material-icons">map</i>Locate A Complaint</a>
                </div>
            </div>
        </div>
    </div>
</div>