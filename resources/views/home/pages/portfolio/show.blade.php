@extends('home.layouts.app')

@section('title', 'Portfolios')

@section('content')
        <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <!-- Display Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row gy-4 justify-content-center align-items-center">

            <!-- Image Column -->
            <div class="col-lg-4 text-center">
            @if($portfolio->avatar)
                <img src="{{ asset('storage/' . $portfolio->avatar) }}" class="img-fluid rounded-circle" alt="Profile Avatar" style="width: 250px; height: 250px; object-fit: cover;">
            @else
                <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
            @endif
            </div>

            <!-- Content Column -->
        <!-- Content Column -->
        <div class="col-lg-8 content d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mt-4">{{ $portfolio->user->name }}</h2>

        </div>

        <div class="row w-100 mt-3">
            <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><i class="bi bi-chevron-right"></i> <strong>Gender:</strong> <span>{{ $portfolio->gender }}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $portfolio->age }}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Hobbies:</strong> <span>{{ $portfolio->hobbies }}</span></li>
            </ul>
            </div>
            <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $portfolio->user->email }}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $portfolio->phone }}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $portfolio->city }}</span></li>
            </ul>
            </div>
        </div>
        </div>


        </div>
        </div>


    </section><!-- /About Section -->

        <!-- Education Section -->
    <section id="education" class="education section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Education</h2>
            <div><span>Qualification</span></div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">


            @if ($portfolio->educations->isEmpty())
            <div class="alert alert-info text-center" role="alert">
                No education records found.
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-bordered align-middle table-dark">
                <thead class="table-dark text-center">
                    <tr>
                    <th>Degree</th>
                    <th>Institute</th>
                    <th>Grade</th>
                    <th>Start Date</th>
                    <th>End Date</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($portfolio->educations as $education)
                        <tr>
                            <td>{{ $education->degree }}</td>
                            <td>{{ $education->institute }}</td>
                            <td>{{ $education->grade }}</td>
                            <td>{{ $education->start_date->format('d M Y') }}</td>
                            <td>{{ $education->end_date->format('d M Y') }}</td>

                        </tr>
                    @endforeach


                </tbody>
                </table>

            </div>
            @endif


        </div>


    </section><!-- /Education Section -->


<!-- Comment Section -->
<x-comment :portfolio="$portfolio" />
<!-- /Comment Section -->


@endsection
