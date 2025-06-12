<div>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            .printable-area,
            .printable-area * {
                visibility: visible;
            }
            
            /* New print-specific styles */
            @page {
                size: auto; /* auto is the initial value */
                margin: 0mm; /* this affects the margin in the printer settings */
            }
            
            body {
                margin: 0;
                padding: 0;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            
            .printable-area {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 10px;
                page-break-after: avoid;
                page-break-before: avoid;
            }
            
            .card {
                margin: 0 !important;
                border: none !important;
                box-shadow: none !important;
                page-break-inside: avoid;
            }
            
            .card-body {
                padding: 10px !important;
            }
            
            /* Adjust font sizes for print */
            .card-title, mwc-textfield, mwc-textarea {
                font-size: 12px !important;
            }
            
            /* Force landscape if needed */
            @page landscape {
                size: landscape;
            }
            
            .landscape {
                display: none;
            }
            
            @media print and (orientation: landscape) {
                .landscape {
                    display: block;
                }
                .portrait {
                    display: none;
                }
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
                            <div class="mb-1">
                                @if(in_array($details->fileComplaint->file_type, ['video_file_upload', 'video']))
                                <div class="video-info small text-danger">
                                    <i class="material-icons text-danger fs-1">{{$details->fileComplaint->path}}</i>
                                </div>
                                @elseif(in_array($details->fileComplaint->file_type, ['audio_recording', 'audio']))
                                <div class="alert alert-info p-1">
                                    <i class="material-icons">info</i> Audio file attached
                                </div>
                                @else
                                <div class="alert alert-info p-1">
                                    <i class="material-icons">info</i> File attachment
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
        <div class="row justify-content-center mt-2">
            <div class="col-lg-12 col-sm-12 col-md-12 text-center">
                <button class="btn btn-success btn-sm" onclick="window.print();">Print/Export</button>
                <button class="btn btn-warning btn-sm" onclick="printLandscape();">Print Landscape</button>
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