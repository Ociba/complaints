<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="row gx-5">
        <!-- Revenue breakdown chart example-->
        <div class="col-lg-12 mb-5">
            <div class="card card-raised h-100">
                <div class="card-header bg-primary text-white px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-4">
                            <h2 class="card-title text-white mb-0">Revenue Breakdown</h2>
                            <div class="card-subtitle">Compared to previous year</div>
                        </div>
                        <div class="d-flex gap-2 me-n2">
                            <button class="btn btn-lg btn-text-white btn-icon" type="button"><i class="material-icons">download</i></button>
                            <button class="btn btn-lg btn-text-white btn-icon" type="button"><i class="material-icons">print</i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row gx-4">
                        <div class="col-12 col-xxl-2">
                            <div class="d-flex flex-column flex-md-row flex-xxl-column align-items-center align-items-xl-start justify-content-between">
                                <div class="mb-4 text-center text-md-start">
                                    <div class="text-xs font-monospace text-muted mb-1">Actual Revenue</div>
                                    <div class="display-5 fw-500">$59,482</div>
                                </div>
                                <div class="mb-4 text-center text-md-start">
                                    <div class="text-xs font-monospace text-muted mb-1">Revenue Target</div>
                                    <div class="display-5 fw-500">$50,000</div>
                                </div>
                                <div class="mb-4 text-center text-md-start">
                                    <div class="text-xs font-monospace text-muted mb-1">Goal</div>
                                    <div class="display-5 fw-500 text-success">119%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xxl-10"><canvas id="dashboardBarChart"></canvas></div>
                    </div>
                </div>
                <div class="card-footer bg-transparent position-relative ripple-gray">
                    <a class="d-flex align-items-center justify-content-end text-decoration-none stretched-link text-primary" href="#!">
                        <div class="fst-button">Open Report</div>
                        <i class="material-icons icon-sm ms-1">chevron_right</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
