<div>
<style>
    @media print {
        /* Force landscape with minimal top margin */
        @page {
            size: landscape;
            margin: 2mm 5mm 5mm 5mm; /* Top, Right, Bottom, Left */
        }

        /* Reset all margins and padding */
        body {
            margin: 0 !important;
            padding: 0 !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
            line-height: 1.2;
        }

        /* Hide non-printable elements */
        body * {
            visibility: hidden;
        }

        .printable-area,
        .printable-area * {
            visibility: visible;
        }

        /* Printable area styling */
        .printable-area {
            position: relative;
            top: -10mm; /* Pull content up */
            width: 100%;
            margin: 0 auto;
            padding: 0 5mm;
            page-break-after: avoid;
            page-break-before: avoid;
        }

        /* Card title adjustments */
        .card-title.text-center {
            margin-top: 0 !important;
            padding-top: 0 !important;
            padding-bottom: 2mm !important;
        }

        /* Card adjustments */
        .card {
            margin: 0 auto !important;
            border: none !important;
            box-shadow: none !important;
            page-break-inside: avoid;
            width: 100% !important;
        }

        .card-body {
            padding: 2mm 5mm !important; /* Reduced padding */
        }

        /* Spacing adjustments */
        .mb-3, .mb-1, .mb-2 {
            margin-bottom: 2mm !important;
        }
        
        .mt-2, .mt-1, .mt-3 {
            margin-top: 2mm !important;
        }

        /* Grid adjustments */
        .row {
            display: flex !important;
            flex-wrap: wrap !important;
            margin: 0 -2mm !important;
        }

        [class^="col-"] {
            padding: 0 2mm !important;
        }

        /* Force first page start */
        .printable-area > div:first-child {
            page-break-before: auto !important;
            margin-top: 0 !important;
        }

        /* Balanced typography */
        mwc-textfield, mwc-textarea {
            font-size: 10pt !important;
            line-height: 1.1 !important;
        }

        /* Hide non-essential elements */
        .no-print {
            display: none !important;
        }
    }
</style>

    <!-- Divider-->
    <div class="">
        <hr class="mt-0 mb-2" />
        <!-- Profile content row-->
        <div class="row col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-md-12 printable-area gx-5">
            <div class="">
                <!-- Account details card-->
                <div class="card shadow card-raised mb-0">
                    <div class="card-body p-5">
                        <div class="card-title text-center fw-bold mb-3" style="font-size: 16px;">Complaint Details For {{ $details->user->name }}</div>
                        <!-- Complaint Content -->
                        <div class="row mb-1 mt-2">
                            <div class="col-md-4 mb-1">
                                <mwc-textfield class="w-100" label="Complaint Status" outlined=""
                                    value="{{ $details->status }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-1">
                                <mwc-textfield class="w-100" label="Received Complaint On" outlined=""
                                    value="{{ $details->created_at->format('M j, Y') }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-1">
                                <mwc-textfield class="w-100" label="Received Complaint At" outlined=""
                                    value="{{ $details->created_at->format('g:i A') }}" readonly></mwc-textfield>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-md-4 mb-1">
                                <mwc-textfield class="w-100" label="Sent By" outlined=""
                                    value="{{ $details->user->name }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-1">
                                <mwc-textfield class="w-100" label="Email" outlined=""
                                    value="{{ $details->user->email }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-1">
                                <mwc-textfield class="w-100" label="Complaint Country" outlined=""
                                    value="{{ @$details->user->bioData->country }}" readonly></mwc-textfield>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-md-6 mb-1">
                                <mwc-textfield class="w-100" label="Complaint Type" outlined=""
                                    value="{{ $details->type }}" readonly></mwc-textfield>
                            </div>
                            @if($details->fileComplaint)
                            <div class="col-md-6 mb-1">
                                <mwc-textfield class="w-100" label="File Type" outlined=""
                                    value="{{ $details->fileComplaint->file_type }}" readonly></mwc-textfield>
                            </div>
                            @endif
                        </div>

                        <!-- Bio Data -->
                        <div class="row mb-1">
                            <div class="col-md-4 mb-1">
                                <mwc-textfield class="w-100" label="Company" outlined=""
                                    value="{{ $details->user->bioData->company ?? 'N/A' }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-1">
                                <mwc-textfield class="w-100" label="Next of Kin" outlined=""
                                    value="{{ $details->user->bioData->next_of_kin ?? 'N/A' }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-1">
                                <mwc-textfield class="w-100" label="Next of Kin Phone" outlined=""
                                    value="{{ $details->user->bioData->next_of_kin_phone ?? 'N/A' }}" readonly></mwc-textfield>
                            </div>
                        </div>

                        <div class="row mb-1">
                            @if($details->type === 'text')
                            <!-- Display text content -->
                            <div class="mb-1">
                                <mwc-textarea class="w-100" label="Complaint Content" outlined rows="2" value="{{ $details->content }}" readonly></mwc-textarea>
                            </div>
                            @elseif($details->fileComplaint)
                            <!-- Media display -->
                            <div class="mb-3">
                                @php
                                $filename = basename($details->fileComplaint->path);
                                $originalName = $details->fileComplaint->original_name; // Get original filename
                                $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                                // Normalize file types
                                $isVideo = in_array(strtolower($details->fileComplaint->file_type), [
                                'video_recording', 'video_file_upload', 'video', 'video_file'
                                ]) || in_array($extension, ['mp4', 'mov', 'avi', 'mkv', 'webm']);

                                $isAudio = in_array(strtolower($details->fileComplaint->file_type), [
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
                                <div class="video-container border p-2">
                                    <video controls width="100%" style="max-height: 300px;">
                                        <source src="{{ asset($publicPath) }}" type="video/{{ $mimeType }}">
                                        Your browser does not support the video tag.
                                    </video>
                                    <div class="small text-muted mt-1">
                                        <i class="material-icons">videocam</i>
                                        <a href="{{ asset($publicPath) }}" download="{{ $details->fileComplaint->original_name }}" class="text-primary">
                                            {{ $details->fileComplaint->original_name }}
                                        </a>
                                        <span class="text-muted">({{ round($details->fileComplaint->size / 1024) }} KB)</span>
                                    </div>
                                </div>
                                @else
                                <div class="alert alert-danger p-2">
                                    <i class="material-icons">error</i> Video file not found: {{ $originalName }}
                                </div>
                                @endif

                                @elseif($isAudio)
                                @if($fileExists)
                                <div class="audio-container border p-2">
                                    <audio controls class="w-100">
                                        <source src="{{ asset($publicPath) }}" type="audio/{{ $mimeType }}">
                                        Your browser does not support the audio element.
                                    </audio>
                                    <div class="small text-muted mt-1">
                                        <i class="material-icons">audiotrack</i>
                                        Audio Attachment:
                                        <a href="{{ asset($publicPath) }}" download="{{ $details->fileComplaint->original_name }}" class="text-primary">
                                            {{ $details->fileComplaint->original_name }}
                                        </a>
                                        <span class="text-muted">({{ round($details->fileComplaint->size / 1024) }} KB)</span>
                                    </div>
                                </div>
                                @else
                                <div class="alert alert-danger p-2">
                                    <i class="material-icons">error</i> Audio file not found: {{ $originalName }}
                                </div>
                                @endif

                                @else
                                <div class="alert alert-info p-2">
                                    <i class="material-icons">info</i>
                                    File attachment: {{ $details->fileComplaint->original_name }}
                                    <span class="text-muted">(.{{ $extension }}, {{ round($details->fileComplaint->size / 1024) }} KB)</span>
                                </div>
                                @endif
                            </div>
                            @endif
                            <hr class="mt-1 mb-1">
                            <div class="row small">
                                Printed on {{ \Carbon\Carbon::now() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-lg-12 col-sm-12 col-md-12 text-center">
                <button class="btn btn-primary btn-sm" onclick="printLandscape();"><i class="material-icons">print</i> &nbsp; &nbsp; Print Complaint Details</button>
            </div>
        </div>
    </div>

    <script>
        function printLandscape() {
            const style = document.createElement('style');
            style.innerHTML = `@page { size: landscape; }`;
            style.id = 'page-orientation';
            document.head.appendChild(style);
            window.print();
            document.getElementById('page-orientation').remove();
        }
    </script>
</div>