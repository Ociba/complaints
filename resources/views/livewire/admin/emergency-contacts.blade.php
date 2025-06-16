<div>
    {{-- In work, do what you enjoy. --}}
    <div class="card card-raised">
        <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title text-white mb-0">Emergency Contacts</h2>
                </div>
                <div class="d-flex gap-2">
                    <a href="/admin/settings/create-emergency-contact" class="btn btn-sm btn-white btn-text-black" type="button">Create Emergency Contact</a>
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
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Recieve Email</th>
                        <th>Receive SMS</th>
                        <th>Primary</th>
                        <th>Notes</th>
                        <th>Priority</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emergency_contacts as $i=>$contact)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->receive_email ? 'Yes' : 'No' }}</td>
                        <td>{{ $contact->receive_sms ? 'Yes' : 'No' }}</td>
                        <td>{{ $contact->is_primary ? 'Yes' : 'No' }}</td>
                        <td>{{ $contact->additional_notes }}</td>
                        <td>{{ $contact->priority }}</td>
                        <td>{{ $contact->created_at }}</td>
                        <td><a href="#!" class="btn btn-sm btn-outline-danger" wire:click="deleteEmergencyContact({{ $contact->id }})">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
