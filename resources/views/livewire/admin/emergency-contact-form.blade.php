<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="card card-raised">
        <div class="card-header bg-primary text-white px-4">
            <div class="d-flex justify-content-between align-items-center">
                <div class="me-4">
                    <h2 class="card-title text-white mb-0">Create Emergency Contact</h2>
                </div>
                
            </div>
        </div>
        <div class="card-body p-4">
            <div class="row">
            <form wire:submit.prevent="createEmergencyContact">
            @csrf
            <div class="row">
                <div class="col-6 mb-3">
                    <label class="form-label" for="exampleFormControlInput">Email</label>
                    <input class="form-control" wire:model="email" id="email" type="email" placeholder="" />
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label" for="exampleFormControlInput">Phone</label>
                    <input class="form-control" wire:model="phone" id="phone" type="phone" placeholder="" />
                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label d-block">Receive Email</label>
                    <div class="d-flex align-items-center"> <!-- Optional: Helps with alignment -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model="receive_email" id="receive_email_yes" value="1">
                            <label class="form-check-label" for="receive_email_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model="receive_email" id="receive_email_no" value="0">
                            <label class="form-check-label" for="receive_email_no">No</label>
                        </div>
                    </div>
                    @error('receive_email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label d-block">Receive Sms</label>
                    <div class="d-flex align-items-center"> <!-- Optional: Helps with alignment -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model="receive_sms" id="receive_sms_yes" value="1">
                            <label class="form-check-label" for="receive_email_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model="receive_sms" id="receive_sms_no" value="0">
                            <label class="form-check-label" for="receive_email_no">No</label>
                        </div>
                    </div>
                    @error('receive_sms') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label d-block">Is Primary</label>
                    <div class="d-flex align-items-center"> <!-- Optional: Helps with alignment -->
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model="is_primary" id="is_primary_yes" value="1">
                            <label class="form-check-label" for="is_primary_yes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" wire:model="is_primary" id="is_primary_no" value="0">
                            <label class="form-check-label" for="is_primary_no">No</label>
                        </div>
                    </div>
                    @error('is_primary') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-6 mb-3">
                    <label class="form-label" for="exampleFormControlInput">Priority</label>
                    <select class="form-select" wire:model="priority" id="priority">
                        <option>Select</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                    </select>
                    @error('priority') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleFormControlTextarea">Additonal Notes</label>
                    <textarea class="form-control" wire:model="additional_notes" id="additional_notes" rows="3"></textarea>
                    @error('additional_notes') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <button class="btn btn-raised-primary" type="submit">Create</button>
            </form>
            </div>
            
        </div>
    </div>
</div>
