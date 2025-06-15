<div>
    <div class="container form-container-overla">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
            <div class="col-lg-10">
                <div class="contact-form-wrapper">
                    <h2 class="text-center mb-4">Get in Touch</h2>
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
                    <form wire:submit.prevent="submitForm">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <i class="bi bi-person"></i>
                                        <input type="text" class="form-control" wire:model="name" placeholder="First Name" required>
                                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <i class="bi bi-envelope"></i>
                                        <input type="email" class="form-control" wire:model="email" placeholder="Email Address" required>
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <i class="bi bi-text-left"></i>
                                        <input type="text" class="form-control" wire:model="subject" placeholder="Subject" required>
                                        @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <i class="bi bi-chat-dots message-icon"></i>
                                        <textarea class="form-control" wire:model="message" placeholder="Write Message..." style="height: 180px" required></textarea>
                                        @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
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
            </div>
        </div>
    </div>
</div>