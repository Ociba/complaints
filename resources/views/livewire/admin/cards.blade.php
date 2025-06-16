<div>
    <div class="row g-3 g-md-4 g-lg-5">
        <!-- Pending Complaints Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xxl-2 mb-3 mb-md-4">
            <div class="card card-raised border-start border-danger border-4 h-100">
                <a href="{{ route('complaints.status', 'pending') }}" class="text-decoration-none">
                    <div class="card-body px-3 px-md-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-6 display-md-5">{{ \App\Models\Complaint::countPendingComplaints() }}</div>
                                <div class="card-text fs-6 fs-md-5">Pending Complaints</div>
                            </div>
                            <div class="icon-circle bg-danger text-white"><i class="material-icons">download</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center fs-7 fs-md-6">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Resolved Complaints Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xxl-2 mb-3 mb-md-4">
            <div class="card card-raised border-start border-warning border-4 h-100">
                <a href="{{ route('complaints.status', 'resolved') }}" class="text-decoration-none">
                    <div class="card-body px-3 px-md-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-6 display-md-5">{{ \App\Models\Complaint::countResolvedComplaints() }}</div>
                                <div class="card-text fs-6 fs-md-5">Resolved Complaints</div>
                            </div>
                            <div class="icon-circle bg-warning text-white"><i class="material-icons">storefront</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center fs-7 fs-md-6">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Text Complaints Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xxl-2 mb-3 mb-md-4">
            <div class="card card-raised border-start border-secondary border-4 h-100">
                <a href="{{ route('complaints.type', 'text') }}" class="text-decoration-none">
                    <div class="card-body px-3 px-md-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-6 display-md-5">{{ \App\Models\Complaint::countTextComplaints() }}</div>
                                <div class="card-text fs-6 fs-md-5">Text Complaints</div>
                            </div>
                            <div class="icon-circle bg-secondary text-white"><i class="material-icons">people</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center fs-7 fs-md-6">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Audio Complaints Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xxl-2 mb-3 mb-md-4">
            <div class="card card-raised border-start border-info border-4 h-100">
                <a href="{{ route('complaints.type', 'audio') }}" class="text-decoration-none">
                    <div class="card-body px-3 px-md-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-6 display-md-5">{{ \App\Models\Complaint::countAudioComplaints() }}</div>
                                <div class="card-text fs-6 fs-md-5">Audio Complaints</div>
                            </div>
                            <div class="icon-circle bg-info text-white"><i class="material-icons">devices</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center fs-7 fs-md-6">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Video Complaints Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xxl-2 mb-3 mb-md-4">
            <div class="card card-raised border-start border-success border-4 h-100">
                <a href="{{ route('complaints.type', 'video') }}" class="text-decoration-none">
                    <div class="card-body px-3 px-md-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-6 display-md-5">{{ \App\Models\Complaint::countVideoComplaints() }}</div>
                                <div class="card-text fs-6 fs-md-5">Video Complaints</div>
                            </div>
                            <div class="icon-circle bg-success text-white"><i class="material-icons">devices</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center fs-7 fs-md-6">
                                <i class="material-icons icon-xs text-success">arrow_upward</i>
                                <div class="caption text-success fw-500 me-2">3%</div>
                                <div class="caption">from last month</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Domestic Workers Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xxl-2 mb-3 mb-md-4">
            <div class="card card-raised border-start border-primary border-4 h-100">
                <a href="/admin/settings/system_user" class="text-decoration-none">
                    <div class="card-body px-3 px-md-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="me-2">
                                <div class="display-6 display-md-5">{{ \App\Models\User::countDomesticUsers() }}</div>
                                <div class="card-text fs-6 fs-md-5">Domestic Workers</div>
                            </div>
                            <div class="icon-circle bg-primary text-white"><i class="material-icons">devices</i></div>
                        </div>
                        <div class="card-text">
                            <div class="d-inline-flex align-items-center fs-7 fs-md-6">
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