<div>
    {{-- Do your work, then step back. --}}
    <div class="card card-raised">
        <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title text-white mb-0">Create Testimony</h2>
                </div>
                
            </div>
        </div>
        <div class="card-body p-4">
            <div class="row">
            <form wire:submit.prevent="createTestimony">
            @csrf
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label" for="exampleFormControlInput">Name</label>
                    <input class="form-control" wire:model="name" id="name" type="text" placeholder="" />
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label" for="exampleFormControlInput">Work</label>
                    <input class="form-control" wire:model="work" id="work" type="text" placeholder="" />
                    @error('work') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlTextarea">Testimony</label>
                    <textarea class="form-control" wire:model="statement" id="statement" rows="3"></textarea>
                    @error('statement') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="formFile">Photo</label>
                    <input class="form-control" wire:model="photo" id="photo" type="file" />
                    @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <button class="btn btn-raised-primary" type="submit">Create</button>
            </form>
            </div>
            
        </div>
    </div>
</div>


