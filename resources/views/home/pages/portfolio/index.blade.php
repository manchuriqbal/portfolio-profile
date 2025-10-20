@extends('home.layouts.app')

@section('title', 'All Profiles')

@section('content')
 <section class="profiles">
    <div class="container">
      <div class="section-title">
        <h2>Profiles</h2>
        <p class="text">Meet our creative professionals</p>
      </div>

      <div class="row g-4">
        <!-- Profile 1 -->
        @foreach ($profiles as $profile)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="profile-card">
           @if ($profile->avatar)
            @php

                $imageSrc = Str::startsWith($profile->avatar, ['http://', 'https://'])
                    ? $profile->avatar
                    : asset('storage/'.$profile->avatar);
            @endphp

            <img src="{{ $imageSrc }}" alt="Profile Avatar"
                style="width: 306px; height: 220px; object-fit: cover;">
            @else
                <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile Avatar"
                    style="width: 306px; height: 220px; object-fit: cover;">
            @endif

            <div class="p-3">
                <h5>{{ $profile->user->name }}</h5>
                <p>{{ $profile->title }}</p>
                <a href="{{ route('portfolio.show', $profile->id) }}">View Profile</a>
            </div>
          </div>
        </div>
        @endforeach


      </div>
    </div>
  </section>
@endsection

@section('styles')
<style>
.profiles {
    padding: 80px 0;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    min-height: 100vh;
}

.profile-card {
    background: rgba(255,255,255,0.05);
    border-radius: 15px;
    transition: all 0.3s ease;
}

.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
}

.profile-card .avatar img {
    border: 3px solid rgba(255,255,255,0.1);
    object-fit: cover;
}

.profile-card h5 {
    color: #e2e8f0;
    font-weight: 600;
}

.profile-card .btn-outline-light {
    border-color: rgba(255,255,255,0.25);
}

.profile-card .btn-outline-light:hover {
    background-color: rgba(255,255,255,0.15);
}
</style>
@endsection
