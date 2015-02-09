@if (!Confide::user())
<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#bs-carousel" data-slide-to="1"></li>
    <li data-target="#bs-carousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item slides active">
      <div class="overlay"></div>
      <div class="slide-1"></div>
      <div class="hero">
        <hgroup>
            <h1>We are one</h1>
            <h3>Get start to share your knowledge</h3>
        </hgroup>
        <a href="#" class="btn btn-hero btn-lg">Join with us</a>
      </div>

    </div>
    <div class="item slides">
      <div class="overlay"></div>
      <div class="slide-2"></div>
      <div class="hero">
        <hgroup>
            <h1>We are one</h1>
            <h3>Get start to share your knowledge</h3>
        </hgroup>
        <a href="#" class="btn btn-hero btn-lg">Join with us</a>
      </div>
    </div>
    <div class="item slides">
      <div class="overlay"></div>
      <div class="slide-3"></div>
      <div class="hero">
        <hgroup>
            <h1>We are one</h1>
            <h3>Get start to share your knowledge</h3>
        </hgroup>
        <a href="#" class="btn btn-hero btn-lg">Join with us</a>
      </div>
    </div>
  </div>

</div>
@endif