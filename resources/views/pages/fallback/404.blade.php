<x-layout title="Page not Found" >

    <style>
        .error-404 {
            padding: 100px 0;
            text-align: center;
        }
        .error-404 h1 {
            font-size: 8rem;
            color: #ff3366; /* A color from the existing theme */
            margin-bottom: 20px;
        }
        .error-404 h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .error-404 p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .error-404 .primary-btn {
            display: inline-block;
            margin-top: 20px;
        }
    </style>

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Page Not Found</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route("home") }}">Home</a>
                        <span>404</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="error-404 spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>404</h1>
                    <h2>Oops! Page Not Found</h2>
                    <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
                    @if (Auth::check() && Auth::user()->role == "admin")
                        <a href="{{ route("admin.dashboard") }}" class="primary-btn">Back to Home</a>
                    @else
                        <a href="{{ route("home") }}" class="primary-btn">Back to Home</a>
                    @endif
                </div>
            </div>
        </div>
    </section>

</x-layout>