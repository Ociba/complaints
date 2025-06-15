<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container-xl p-3">
        <!-- Divider-->
        <hr class="mt-2 mb-2" />
        <div class="row mt-5 row-cols-1 row-cols-md-2 row-cols-xl-3 mb-2 gx-5">
            <div class="col">
                <!-- Single card (groups)-->
                <div class="card card-raised ripple-primary mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text-primary">groups</i>
                            <div class="ms-3">
                                <div class="fs-6 mb-1 fw-500">Pending Complaints</div>
                                <a class="small text-center stretched-link text-reset text-decoration-none" href="/admin/settings/{{$this->userId}}/pending">{{\App\Models\MemberBioData::countPendingComplaints($userId)}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single card (insights)-->
                <div class="card card-raised ripple-primary mb-5 mb-xl-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text-primary">insights</i>
                            <div class="ms-3">
                                <div class="fs-6 mb-1 fw-500">Text Complaints Type</div>
                                <a class="small stretched-link text-reset text-decoration-none" href="/admin/settings/all/{{$this->userId}}/text">{{\App\Models\MemberBioData::countTextComplaintType($userId)}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <!-- Single card (devices)-->
                <div class="card card-raised ripple-primary mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text-primary">devices</i>
                            <div class="ms-3">
                                <div class="fs-6 mb-1 fw-500">SOS (Emergency) Complaints</div>
                                <a class="small stretched-link text-reset text-decoration-none" href="/admin/settings/{{$this->userId}}/emergency">{{\App\Models\MemberBioData::countEmergencyComplaints($userId)}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single card (support)-->
                <div class="card card-raised ripple-primary mb-5 mb-xl-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text-primary">support</i>
                            <div class="ms-3">
                                <div class="fs-6 mb-1 fw-500">Audio Complaint Type</div>
                                <a class="small stretched-link text-reset text-decoration-none" href="/admin/settings/all/{{$this->userId}}/audio">{{\App\Models\MemberBioData::countAudioComplaintType($userId)}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <!-- Single card (security)-->
                <div class="card card-raised ripple-primary mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text-primary">security</i>
                            <div class="ms-3">
                                <div class="fs-6 mb-1 fw-500">Resolved Complaints</div>
                                <a class="small stretched-link text-reset text-decoration-none" href="/admin/settings/{{$this->userId}}/resolved">{{\App\Models\MemberBioData::countResolvedComplaints($userId)}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single card (migration)-->
                <div class="card card-raised ripple-primary">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text-primary">input</i>
                            <div class="ms-3">
                                <div class="fs-6 mb-1 fw-500">Video Complaint Type</div>
                                <a class="small stretched-link text-reset text-decoration-none" href="/admin/settings/all/{{$this->userId}}/video">{{\App\Models\MemberBioData::countVideoComplaintType($userId)}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 gx-5">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-5">
                <div class="card card-raised border-top border-4 border-primary h-100">
                    <div class="card-header bg-transparent">
                        <div class="d-flex align-items-center">
                            <i class="material-icons text-primary">person</i>
                            <div class="ms-3">
                                <div class="fs-6 mb-1 fw-500">Bio Data</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>Gender</th>
                                        <th>NOK</th>
                                        <th>NOK Contact</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->user->name}}</td>
                                        <td>{{$user->user->email}}</td>
                                        <td>{{$user->user->phone}}</td>
                                        <td>{{$user->country}}</td>
                                        <td>{{$user->gender}}</td>
                                        <td>{{$user->next_of_kin}}</td>
                                        <td>{{$user->next_of_kin_phone}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>