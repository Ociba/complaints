<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="card card-raised">
        <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title text-white mb-0">
                    Users
                    </h2>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ url('/admin/export-users') }}" class="btn btn-lg btn-text-white btn-icon" type="button"><i class="material-icons">download</i></a>
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
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $i=>$user)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->phone}}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->role}}</td>
                                <td>
                                <button type="button" class="btn btn-sm mb-1 btn-outline-primary">update</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
    </div>
</div>