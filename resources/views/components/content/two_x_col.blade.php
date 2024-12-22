<div>
    <div class="section-title">
        {{-- <h2 class="text-uppercase"></h2> --}}
        <h3><span>{{ $content->content_title }}</span></h3>
        <p class="mt-2">{{ $content->description }}</p>
    </div>
    <div class="row">
        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img src="{{ $content->picture }}" class="img-fluid" alt="{{ $content->content_title }}">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column " data-aos="fade-up" data-aos-delay="100">
            <h3>{{ $content->title }}</h3>
            <p class="fst-italic">
                {{ $content->content }}
            </p>

        </div>
    </div>
</div>
