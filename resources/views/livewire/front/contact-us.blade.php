<div>
    @if(session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger mb-4">
        {{ session('error') }}
    </div>
    @endif
    <form wire:submit.prevent="submitForm" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
        <div class="row gy-4">

            <div class="col-md-6">
                <input type="text" wire:model="name" class="form-control" placeholder="Your Name" required>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6 ">
                <input type="email" class="form-control" wire:model="email" placeholder="Your Email" required>
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-12">
                <input type="text" class="form-control" wire:model="subject" placeholder="Subject" required>
                @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-12">
                <textarea class="form-control" wire:model="message" rows="6" placeholder="Message" required></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-12">
                @if($isSending)
                <div class="loading">Loading</div>
                @endif
                @if($errorMessage)
                <div class="error-message">{{ $errorMessage }}</div>
                @endif
                @if($successMessage)
                <div class="sent-message">{{ $successMessage }}</div>
                @endif
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary btn-submit" wire:loading.attr="disabled">
                    <span wire:loading.remove>SEND MESSAGE</span>
                    <span wire:loading>Sending...</span>
                </button>
            </div>
        </div>
    </form>
</div>