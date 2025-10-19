@extends('home.layouts.app')

@section('title', 'Add Education Qualification')

@section('content')
<!-- Create Profile Section -->
<section id="create-profile" class="create-profile section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Section Title -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2>Add Education Qualification</h2>
                <p>Complete your profile to get started</p>
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

                        <form action="{{ route('education.store') }}" method="POST" >
                            @csrf

                            {{-- profile id  --}}
                            <input type="hidden" name="profile_id" value="{{ auth()->user()->profile->id }}">

                            <div class="row">
                                <!-- degree -->
                                <div class="col-md-6 mb-3">
                                    <label for="degree" class="form-label">
                                        <i class="bi bi-person"></i> Degree <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('degree') is-invalid @enderror"
                                           id="degree" name="degree" value="{{ old('degree') }}"
                                           placeholder="e.g., Bachelor of Science" required>
                                    @error('degree')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <!-- institute -->
                                <div class="col-md-6 mb-3">
                                    <label for="institute" class="form-label">
                                        <i class="bi bi-building"></i> Institute <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('institute') is-invalid @enderror"
                                           id="institute" name="institute" value="{{ old('institute') }}"
                                           placeholder="e.g., Harvard University" required>
                                    @error('institute')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- grade -->
                                <div class="col-md-6 mb-3">
                                    <label for="grade" class="form-label">
                                        <i class="bi bi-star"></i> Grade <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('grade') is-invalid @enderror"
                                           id="grade" name="grade" value="{{ old('grade') }}"
                                           placeholder="e.g., A+" required>
                                    @error('grade')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- start_date -->
                                <div class="col-md-6 mb-3">
                                    <label for="start_date" class="form-label">
                                        <i class="bi bi-calendar"></i> Start Date <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                           id="start_date" name="start_date" value="{{ old('start_date') }}"
                                           required>
                                    @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- end_date -->
                                <div class="col-md-6 mb-3">
                                    <label for="end_date" class="form-label">
                                        <i class="bi bi-calendar"></i> End Date
                                    </label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                           id="end_date" name="end_date" value="{{ old('end_date') }}">
                                    @error('end_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>

                            <!-- Submit Buttons -->
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="bi bi-check-circle"></i> Add
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
