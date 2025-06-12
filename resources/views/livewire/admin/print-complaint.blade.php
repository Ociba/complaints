<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .printable-area,
            .printable-area * {
                visibility: visible;
            }
        }
    </style>
    <!-- Divider-->
    <div class="">
        <hr class="mt-0 mb-2" />
        <!-- Profile content row-->
        <div class="row col-lg-12 col-xl-12 col-xxl-12 col-sm-12 col-md-12 printable-area gx-5">
            <div class=" ">
                <!-- Account details card-->
                <div class="card shadow card-raised  mb-0">
                    <div class="card-body p-5">
                        <div class="card-title text-center fw-bold mb-5">Complaint Details For {{ $details->user->name }}</div>
                        <!-- Complaint Content -->
                        <div class="row mb-1 mt-2">
                            <div class="col-md-4 mb-2">
                                <mwc-textfield class="w-100" label="Complaint Status" outlined=""
                                    value="{{ $details->status }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-2">
                                <mwc-textfield class="w-100" label="Received Complaint On" outlined=""
                                    value="{{ $details->created_at->format('M j, Y') }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-2">
                                <mwc-textfield class="w-100" label="Received Complaint At" outlined=""
                                    value="{{ $details->created_at->format('g:i A') }}" readonly></mwc-textfield>
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-md-4 mb-2">
                                <mwc-textfield class="w-100" label="Sent By" outlined=""
                                    value="{{ $details->user->name }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-2">
                                <mwc-textfield class="w-100" label="Email" outlined=""
                                    value="{{ $details->user->email }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-2">
                                <mwc-textfield class="w-100" label="Complaint Country" outlined=""
                                    value="{{ @$details->user->bioData->country }}" readonly></mwc-textfield>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 mb-2">
                                <mwc-textfield class="w-100" label="Complaint Type" outlined=""
                                    value="{{ $details->type }}" readonly></mwc-textfield>
                            </div>
                            @if($details->fileComplaint)
                            <div class="col-md-6 mb-2">
                                <mwc-textfield class="w-100" label="File Type" outlined=""
                                    value="{{ $details->fileComplaint->file_type }}" readonly></mwc-textfield>
                            </div>
                            @endif
                        </div>
                        <!-- Bio Data -->
                        <div class="row mb-1">
                            <div class="col-md-4 mb-2">
                                <mwc-textfield class="w-100" label="Company" outlined=""
                                    value="{{ $details->user->bioData->company ?? 'N/A' }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-2">
                                <mwc-textfield class="w-100" label="Next of Kin" outlined=""
                                    value="{{ $details->user->bioData->next_of_kin ?? 'N/A' }}" readonly></mwc-textfield>
                            </div>
                            <div class="col-md-4 mb-2">
                                <mwc-textfield class="w-100" label="Next of Kin Phone" outlined=""
                                    value="{{ $details->user->bioData->next_of_kin_phone ?? 'N/A' }}" readonly></mwc-textfield>
                            </div>
                        </div>

                        <div class="row mb-1">
                            @if($details->type === 'text')
                            <!-- Display text content -->
                            <div class="mb-2">
                                <mwc-textarea class="w-100" label="Complaint Content" outlined rows="2" value="{{ $details->content }}" readonly>

                                </mwc-textarea>
                            </div>
                            @elseif($details->fileComplaint)
                            <!-- Enhanced media display with automatic type detection -->
                            <div class="mb-2">


                                @if(in_array($details->fileComplaint->file_type, ['video_file_upload', 'video']))
                                <!-- Video Player -->
                                <div class="video-container mb-2">

                                    <div class="mt-2 d-flex justify-content-between align-items-center">
                                        <div class="video-info small text-danger">
                                            <i class="material-icons text-danger fs-1">{{$details->fileComplaint->path}}</i>
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



                                @else
                                <!-- Default file download -->
                                <div class="alert alert-info">
                                    <i class="material-icons">info</i> This complaint contains a file attachment
                                </div>
                                <a href="{{ asset('complaints/attachments/' . basename($details->fileComplaint->path)) }}"
                                    download="{{ $details->fileComplaint->original_name ?? basename($details->fileComplaint->path) }}"
                                    class="btn btn-primary w-100">
                                    <i class="material-icons">download</i>
                                    Download {{ $details->fileComplaint->file_type ? ucfirst($details->fileComplaint->file_type) : 'Attachment' }}
                                </a>
                                @endif
                            </div>
                            @endif
                            <hr>
                            <div class="row">
                                Printed on {{ \Carbon\Carbon::now() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-lg-12 col-sm-12 col-md-12  text-center">
                <a href="" class="btn btn-success btn-sm" onclick="window.print();">Export As PDF</a>
                <a href="" class="btn btn-warning btn-sm" onclick="window.print();">Print</a>
            </div>
        </div>
    </div>