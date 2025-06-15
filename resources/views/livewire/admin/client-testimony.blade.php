<div>
    {{-- Do your work, then step back. --}}
    <div class="card card-raised">
        <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title text-white mb-0">Testimonies</h2>
                </div>
                <div class="d-flex gap-2">
                    <a href="/admin/create-testimony" class="btn btn-sm btn-dark btn-text-white" type="button">Add Testimony</a>
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
                        <th>Work</th>
                        <th>Statement</th>
                        <th>Photo</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonies as $i=>$testimony)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $testimony->name }}</td>
                        <td>{{ $testimony->work}}</td>
                        <td>{{ $testimony->statement}}</td>
                        <td><img src="{{ asset('storage/testimonies/'.$testimony->photo) }}" alt="{{ $testimony->name }}" width="60" heght="50"></td>

                        <td>{{ $testimony->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
