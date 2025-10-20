@extends('home.layouts.app')

@section('title', 'Dashboard')


@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h2>Welcome, {{ auth()->user() ? auth()->user()->name : 'Guest'  }}!</h2>
        <p>Create Your Own Profile and Showcase Yourself</p>

        @if (auth()->user())
        <div class="hero-buttons mt-4">
          <a href="{{ route('profile') }}" class="btn btn-primary me-2">
            <i class="bi bi-person-circle"></i> View Profile
          </a>
          <a href="{{ route('profile.create') }}" class="btn btn-outline-light">
            <i class="bi bi-plus-circle"></i> Create Profile
          </a>
        </div>
        @endif
      </div>

    </section><!-- /Hero Section -->
@endsection

