@extends('template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Complaints Fee</h4>
                <div class="table-responsive">
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
    </div>
</div>
@endsection