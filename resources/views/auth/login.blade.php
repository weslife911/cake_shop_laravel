<x-layout title="Sign in" >

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Login</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route("home") }}">Home</a>
                        <span>Login</span>
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
                            <span>Welcome Back!</span>
                            <h2>Login to your account</h2>
                        </div>
                        <form action="{{ route("login") }}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="email" value="{{ old("email") }}" placeholder="Email" required>
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
                                <div class="col-lg-12 text-center">
                                    <a href="#" class="forgot-password-link">Forgot Password?</a>
                                    <button type="submit" class="site-btn">Login</button>
                                    <p class="mt-3">Don't have an account? <a href="{{ route("register") }}">Register here</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>