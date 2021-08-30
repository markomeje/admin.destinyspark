<div class="row dashboard-panels">
    <div class="col-12 col-md-4 col-lg-3 mb-4">
        <div class="card border-0 rounded bg-white p-2 shadow-sm border-raduis-lg">
            <div class="card-body d-flex align-items-center">
                <div class="me-4">
                    <div class="panels-icon border-raduis-sm text-center text-white bg-skyblue">
                        <i class="icofont-speech-comments"></i>
                    </div>
                </div>
                <div class="">
                    <a href="{{ url('/comments'); }}" class="d-block text-muted font-weight-bolder mb-1">
                        Comments
                    </a>
                    <h5 class="text-muted m-0 font-weight-bolder">
                        {{ $comments->count ?? 0 }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-3 mb-4">
        <div class="card border-0 rounded bg-white p-2 shadow-sm border-raduis-lg">
            <div class="card-body d-flex align-items-center">
                <div class="me-4">
                    <div class="panels-icon border-raduis-sm text-center text-white bg-skyblue">
                        <i class="icofont-book"></i>
                    </div>
                </div>
                <div class="">
                    <a href="{{ url('/books'); }}" class="d-block text-muted font-weight-bolder mb-1">
                        Books
                    </a>
                    <h5 class="text-muted m-0 font-weight-bolder">
                        {{ $books->count ?? 0 }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 col-lg-3 mb-4">
        <div class="card border-0 rounded bg-white p-2 shadow-sm border-raduis-lg">
            <div class="card-body d-flex align-items-center">
                <div class="me-4">
                    <div class="panels-icon border-raduis-sm text-center text-white bg-skyblue">
                        <i class="icofont-book"></i>
                    </div>
                </div>
                <div class="">
                    <a href="{{ url('/articles'); }}" class="d-block text-muted font-weight-bolder mb-1">
                        Articles
                    </a>
                    <h5 class="text-muted m-0 font-weight-bolder">
                        {{ $articles->count ?? 0 }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>