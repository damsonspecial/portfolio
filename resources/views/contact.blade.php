@extends('layouts.app')
@section('main')
<main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">
        @session('success')
        @if (session('success'))
            <x-flashMsg msg="{{session('success')}}" bg='bg-success'/>
        @endif
        @endsession
        <div class="section-title">
          <h2>Contact</h2>
          <p>Got a question, proposal or just want to say hello? Leave a message</p>
        </div>

        <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d93426.02278311734!2d5.082326065726173!3d7.700866769409465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1047fb0d2a514331%3A0x199e653dc4e2ca56!2sStaleg%20mall!5e0!3m2!1sen!2sng!4v1722264162851!5m2!1sen!2sng" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
                @forelse ($profiles as $profile)
                <div class="address">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Location:</h4>
                    <p>{{$profile->city}}</p>
                  </div>

                  <div class="email">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p>{{$profile->email}}</p>
                  </div>

                  <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Call:</h4>
                    <p>{{$profile->phone}}</p>
                  </div>
                @empty
                  <p>No info provided yet</p>
                @endforelse


            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{route('feedback')}}" method="post">
                @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Your Name">
                  @error('name')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Your Email">
                  @error('email')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" value="{{old('subject')}}" placeholder="Subject">
                @error('subject')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" value="{{old('message')}}"></textarea>
                @error('message')
                  <small class="text-danger">{{$message}}</small>
                  @enderror
              </div>
              <div class="text-center my-3"><button type="submit" class="btn btn-secondary">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
</main>
@endsection
