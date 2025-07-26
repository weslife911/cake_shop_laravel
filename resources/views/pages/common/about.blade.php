<x-layout title="About" >

    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>About</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route("home") }}">Home</a>
                        <span>About</span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <x-about_about/>

    <x-home_testimonial/>

    <x-home_team/>

</x-layout>