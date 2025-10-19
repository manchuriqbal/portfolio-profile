@extends('home.layouts.app')

@section('title', 'Edit Profile')

@section('content')
<!-- Create Profile Section -->
<section id="create-profile" class="create-profile section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Section Title -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2>Edit Your Profile</h2>
                <p>Update your profile information below</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Profile Information</h5>
                    </div>
                    <div class="card-body p-4">


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="row">
                                <div class="col-md-12 mb-4 text-center">
                                    <div class="avatar-upload">

                                        <label for="avatar" class="btn btn-outline-primary">
                                            <i class="bi bi-camera"></i> Choose Avatar
                                        </label>
                                        <input type="file" id="avatar" name="avatar" class="d-none" accept="image/*">
                                    </div>
                                </div>

                                <!-- Name -->
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">
                                        <i class="bi bi-person"></i> Name <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" value="{{ $profile->user->name }}"
                                           placeholder="e.g., John Doe" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                 <!-- email -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">
                                        <i class="bi bi-envelope"></i> Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ $profile->user->email }}"
                                           placeholder="e.g., john@example.com" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gender -->
                                <div class="col-md-6 mb-3">
                                    <label for="gender" class="form-label">
                                        <i class="bi bi-person"></i> Gender <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ $profile->gender == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ $profile->gender == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ $profile->gender == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Age -->
                                <div class="col-md-6 mb-3">
                                    <label for="age" class="form-label">
                                        <i class="bi bi-calendar"></i> Age <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control @error('age') is-invalid @enderror"
                                           id="age" name="age" value="{{ $profile->age }}"
                                           min="1" max="120" required>
                                    @error('age')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">
                                        <i class="bi bi-telephone"></i> Phone <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                           id="phone" name="phone" value="{{ $profile->phone }}"
                                           placeholder="e.g., +1234567890" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- City -->
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">
                                        <i class="bi bi-geo-alt"></i> City <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                           id="city" name="city" value="{{ $profile->city }}"
                                           placeholder="e.g., New York" required>
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Hobbies -->
                                <div class="col-md-12 mb-4">
                                    <label for="hobbies" class="form-label">
                                        <i class="bi bi-heart"></i> Hobbies & Interests <span class="text-danger">*</span>
                                    </label>
                                    <textarea class="form-control @error('hobbies') is-invalid @enderror"
                                              id="hobbies" name="hobbies" rows="4"
                                              placeholder="Tell us about your hobbies and interests..." required>{{ $profile->hobbies }}</textarea>
                                    @error('hobbies')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Maximum 500 characters</div>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="bi bi-check-circle"></i> Update Profile
                                    </button>
                                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-left"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Create Profile Section -->


@endsection


@section('styles')
<style>
.create-profile {
    padding: 80px 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #071021 0%, #0b1220 50%, #111827 100%);
    color: #e6eef8;
}

/* Card */
.card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    background: linear-gradient(180deg, #0b1220 0%, #0f1724 100%);
    color: #e6eef8;
    box-shadow: 0 6px 30px rgba(2,6,23,0.6);
}

.card-header {
    border-bottom: none;
    background: linear-gradient(135deg, #0f1724 0%, #1f2937 100%);
    color: #f8fafc;
}

/* Form controls */
.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid rgba(255,255,255,0.06);
    padding: 12px 16px;
    background: rgba(255,255,255,0.02);
    color: #e6eef8;
    transition: all 0.25s ease;
}

.form-control::placeholder {
    color: rgba(230,238,248,0.45);
}

.form-control:focus, .form-select:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 0.18rem rgba(99,102,241,0.12);
    background: rgba(255,255,255,0.02);
}

/* Buttons */
.btn {
    border-radius: 8px;
    padding: 10px 25px;
    font-weight: 500;
    transition: all 0.25s ease;
    color: #eef2ff;
}

.btn-primary {
    background: linear-gradient(135deg, #374151 0%, #111827 100%);
    border: none;
    color: #eef2ff;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(59,130,246,0.12);
}

.btn-outline-primary {
    color: #60a5fa;
    border-color: rgba(96,165,250,0.18);
    background: transparent;
}

.btn-outline-primary:hover {
    background-color: rgba(96,165,250,0.06);
    border-color: rgba(96,165,250,0.3);
    color: #fff;
}

/* Avatar */
.avatar-upload {
    position: relative;
}

.avatar-preview img {
    border: 3px solid rgba(255,255,255,0.06);
    box-shadow: 0 6px 20px rgba(2,6,23,0.6);
    transition: all 0.3s ease;
}

.avatar-preview img:hover {
    transform: scale(1.03);
}

/* Labels / text */
.form-label {
    font-weight: 600;
    color: #cbd5e1;
    margin-bottom: 8px;
}

.form-label i {
    margin-right: 8px;
    color: #7c83ff;
}

.alert {
    border-radius: 8px;
    border: none;
    background: rgba(255,255,255,0.03);
    color: #ffe7c6;
}

.section h2 {
    color: #f8fafc;
    font-weight: 700;
}

.form-text {
    color: #9ca3af;
}

/* Responsiveness */
@media (max-width: 768px) {
    .create-profile {
        padding: 40px 0;
    }

    .card-body {
        padding: 20px;
    }
}
</style>
@endsection
