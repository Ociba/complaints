<div>
    {{-- Stop trying to control. --}}
    <div class="row gx-5">
        <div class="col-xxl-3 col-md-4 mb-5">
            <div class="card card-raised border-start border-danger border-4">
                <a href="{{ route('complaints.status', 'pending') }}" style="text-decoration:none;">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5">{{ \App\Models\Complaint::countPendingComplaints() }}</div>
                                <div class="card-text">Pending Complaints</div>
                            </div>
                            <div class="icon-circle bg-danger text-white"><i class="material-icons">download</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xxl-3 col-md-4 mb-5">
            <div class="card card-raised border-start border-warning border-4">
                <a href="{{ route('complaints.status', 'resolved') }}" style="text-decoration:none;">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5">{{ \App\Models\Complaint::countResolvedComplaints() }}</div>
                                <div class="card-text">Resolved Complaints</div>
                            </div>
                            <div class="icon-circle bg-warning text-white"><i class="material-icons">storefront</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xxl-3 col-md-4 mb-5">
            <div class="card card-raised border-start border-secondary border-4">
                <a href="{{ route('complaints.type', 'text') }}" style="text-decoration:none;">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5">{{ \App\Models\Complaint::countTextComplaints() }}</div>
                                <div class="card-text">Text Complaints</div>
                            </div>
                            <div class="icon-circle bg-secondary text-white"><i class="material-icons">people</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xxl-3 col-md-4 mb-5">
            <div class="card card-raised border-start border-info border-4">
                <a href="{{ route('complaints.type', 'audio') }}" style="text-decoration:none;">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5">{{ \App\Models\Complaint::countAudioComplaints() }}</div>
                                <div class="card-text">Audio Complaints</div>
                            </div>
                            <div class="icon-circle bg-info text-white"><i class="material-icons">devices</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xxl-3 col-md-4 mb-5">
            <div class="card card-raised border-start border-success border-4">
                <a href="{{ route('complaints.type', 'video') }}" style="text-decoration:none;">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5">{{ \App\Models\Complaint::countVideoComplaints() }}</div>
                                <div class="card-text">Video Complaints</div>
                            </div>
                            <div class="icon-circle bg-success text-white"><i class="material-icons">devices</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xxl-3 col-md-4 mb-5">
            <div class="card card-raised border-start border-primary border-4">
                <a href="/admin/settings/system_user" style="text-decoration:none;">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-5">{{ \App\Models\User::countDomesticUsers() }}</div>
                                <div class="card-text">Domestic Workers</div>
                            </div>
                            <div class="icon-circle bg-primary text-white"><i class="material-icons">devices</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
