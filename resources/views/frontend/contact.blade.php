@extends('frontend.layouts.app')
@section('title')
Blog | Contact
@endsection
@section('content')

<section class="tm-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">

                <section>
                    <h3 class="tm-gold-text tm-form-title">Pellentesque fermentum mauris</h3>
                    <p class="tm-form-description">Vivamus accumsan blandit ligula. Sed lobortis efficitur sapien.
                        Quisque vel sem eu turpis ullamcorper euismod. Praesent quis nisi ac augue luctus viverra. Sed
                        et dui nisi. Fusce vitae dapibus justo.</p>


                    <form action="{{ route('contact-store') }}" method="post" class="tm-contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="contact_name" name="contact_name" class="form-control"
                                placeholder="Name" />
                            @error('contact_name')
                            <p style="color:red; font-size:12px">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" id="contact_email" name="contact_email" class="form-control"
                                placeholder="Email" />
                            @error('contact_email')
                            <p style="color:red; font-size:12px">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" id="contact_subject" name="contact_subject" class="form-control"
                                placeholder="Subject" />
                            @error('contact_subject')
                            <p style="color:red; font-size:12px">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea id="contact_message" name="contact_message" class="form-control" rows="6"
                                placeholder="Message"></textarea>
                            @error('contact_message')
                            <p style="color:red; font-size:12px">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="tm-btn">Submit</button>
                    </form>
                </section>

            </div>

        </div>

    </div>
</section>
@endsection
