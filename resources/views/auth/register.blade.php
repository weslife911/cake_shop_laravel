<x-layout title="Sign up" >

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Register</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route("home") }}">Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="contact__form">
                        <div class="section-title">
                            <span>Join Us!</span>
                            <h2>Create your account</h2>
                        </div>
                        <form action="{{ route("register") }}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="name" placeholder="Your Name" value="{{ old("name") }}" required>
                                    @error("name")
                                        <strong style="color: red;" >
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <input type="email" name="email" placeholder="Email Address" value="{{ old("email") }}" required>
                                    @error("email")
                                        <strong style="color: red;" >
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" name="password" placeholder="Password" required>
                                    @error("password")
                                        <strong style="color: red;" >
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                                <div class="col-lg-12">
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                    @error("password_confirmation")
                                        <strong style="color: red;" >
                                            {{ $message }}
                                        </strong>
                                    @enderror
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="site-btn">Register</button>
                                    <p class="mt-3">Already have an account? <a href="{{ route("login") }}">Login here</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>