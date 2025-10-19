@extends('home.layouts.app')

@section('title', 'Profile')

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
            @if($profile->avatar)
                <img src="{{ asset('storage/' . $profile->avatar) }}" class="img-fluid rounded-circle" alt="Profile Avatar" style="width: 250px; height: 250px; object-fit: cover;">
            @else
                <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
            @endif
            </div>

            <!-- Content Column -->
        <!-- Content Column -->
        <div class="col-lg-8 content d-flex flex-column justify-content-center">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mt-4">{{ $profile->user->name }}</h2>
            <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-secondary">Edit</a>
        </div>

        <div class="row w-100 mt-3">
            <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><i class="bi bi-chevron-right"></i> <strong>Gender:</strong> <span>{{ $profile->gender }}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $profile->age }}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Hobbies:</strong> <span>{{ $profile->hobbies }}</span></li>
            </ul>
            </div>
            <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $profile->user->email }}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $profile->phone }}</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $profile->city }}</span></li>
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

            <!-- Add Button -->
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('education.create') }}" class="btn btn-success">Add Education</a>
            </div>
            @if ($educations->isEmpty())
            <div class="alert alert-info text-center" role="alert">
                No education records found. Please add your education details.
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
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($educations as $education)
                        <tr>
                            <td>{{ $education->degree }}</td>
                            <td>{{ $education->institute }}</td>
                            <td>{{ $education->grade }}</td>
                            <td>{{ $education->start_date->format('d M Y') }}</td>
                            <td>{{ $education->end_date->format('d M Y') }}</td>
                            <td class="text-center">
                                <a href="{{ route('education.edit', $education->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
                </table>

            </div>
            @endif

            <div class="d-flex justify-content-end mb-3 mt-5">
                <form action="{{ route('profile.delete') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Profile</button>
                </form>
           </div>
        </div>


    </section><!-- /Education Section -->


<!-- Comment Section -->
<section id="comments" class="comments section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Comments</h2>
    <div><span>Leave Your Feedback</span></div>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <!-- Comment Form -->
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <form>
          <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control" id="comment" rows="5" placeholder="Your Comment" required></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit Comment</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Existing Comments -->
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8">
        <h5>Previous Comments:</h5>
        <ul class="list-group">
          <li class="list-group-item">
            <strong>John Doe:</strong> This is a great profile!
            <br><small class="text-muted">19 Oct 2025</small>
          </li>
          <li class="list-group-item">
            <strong>Jane Smith:</strong> Very informative and well-structured.
            <br><small class="text-muted">18 Oct 2025</small>
          </li>
          <li class="list-group-item">
            <strong>Ali Khan:</strong> Excellent layout and design!
            <br><small class="text-muted">17 Oct 2025</small>
          </li>
        </ul>
      </div>
    </div>

  </div>

</section><!-- /Comment Section -->


@endsection
