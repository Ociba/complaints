<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2"></div>
        <div class="col-lg-8 col-lg-8 col-md-8">
            <div class="card card-raised">
                <div class="card-header bg-primary text-white px-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="me-4">
                            <h2 class="card-title text-white mb-0">Add System Admin</h2>
                        </div>

                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form wire:submit.prevent="createAdmin">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-md-12 mb-3">
                                    <label class="form-label" for="exampleFormControlInput">Full Names</label>
                                    <input class="form-control" wire:model="name" id="name" type="text" placeholder="" />
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 mb-3">
                                    <label class="form-label" for="exampleFormControlInput">Email</label>
                                    <input class="form-control" wire:model="email" id="email" type="email" placeholder="" />
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 mb-3">
                                    <label class="form-label" for="exampleFormControlInput">Phone</label>
                                    <input class="form-control" wire:model="phone" id="phone" type="phone" placeholder="" />
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 mb-3">
                                    <label class="form-label" for="exampleFormControlInput">Password</label>
                                    <input class="form-control" wire:model="password" id="password" type="password" placeholder="" />
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 mb-3">
                                    <label class="form-label" for="exampleFormControlInput">Confirm Password</label>
                                    <input class="form-control" wire:model="password_confirmation" id="password_confirmation" type="password" placeholder="" />
                                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <button class="btn btn-raised-primary" type="submit">Create</button>
                            <a href="/admin/settings/system-admin" class="btn btn-raised-warning" type="submit">Back</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-2 col-sm-2 col-md-2"></div>
    </div>
</div>