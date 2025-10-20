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
        <form action="{{ route('comments.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="profile_id" value="{{ $portfolio->id }}">
          <div class="mb-3">
            <label for="comment" class="form-label">Comments</label>
            <textarea class="form-control" id="comment" name="comment_text" rows="5" placeholder="Your Comment"></textarea>
          </div>
          <div class="mb-3">
            <label for="comment_image" class="form-label">Comment Image</label>
            <input type="file" id="comment_image" name="comment_image" class="form-control" accept="image/*">
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
        @if ($portfolio->comments->isEmpty())
            <div class="alert alert-info text-center" role="alert">
                No comments found.
            </div>

        @endif
        <ul class="list-group">
            @foreach ($portfolio->comments as $comment)
            <li class="list-group-item">
              <strong>{{ $comment->user->name }}:</strong> {{ $comment->comment_text }}
              @if ($comment->comment_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $comment->comment_image) }}" alt="Comment Image" class="img-fluid" style="max-width: 200px;">
                </div>
              @endif
              <br><small class="text-muted">{{ $comment->created_at->format('d M Y') }}</small>
            </li>
            @endforeach

        </ul>
      </div>
    </div>

  </div>

</section>
<!-- /Comment Section -->
