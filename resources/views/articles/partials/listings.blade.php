<div class="col-12 col-md-6 col-lg-4 mb-4">
    <div class="card">
        <div class="card-img position-relative">
            <div class="position-absolute d-flex justify-content-between px-3 align-items-center" style="left: 0; bottom: 0; right: 0; z-index: 3; height: 50px; line-height: 50px; background-color: rgba(0, 0, 0, 0.4);">
                <div class="text-white">(1260 x 960)</div>
                <div class="d-flex position-relative">
                    <small>
                        <i class="icofont-ui-edit cursor-pointer text-white add-article-image-{{ $article->id; }}" data-id="{{ $article->id; }}">
                        </i>
                    </small>
                </div>
            </div>
            <form action="javascript:;">
                @csrf
                <input type="file" name="image" accept="image/*" class="article-image-input-{{ $article->id; }}" style='display: none;' data-url="/articles/image/upload/{{ $article->id; }}">
            </form>

            <div class="add-article-image-loader-{{ $article->id; }} d-none position-absolute p-3 rounded-circle text-center border" style="bottom: 50%; right: 50%; z-index: 4; transform: translate(50%, 50%); background-color: rgba(0, 0, 0, 0.75); width: 70px; height: 70px; line-height: 35px;" data-id="{{ $article->id; }}">
                <img src="/images/svgs/spinner.svg">
            </div>
            <div style="height: 210px;">
                <img src="/images/articles/{{ $article->image }}" class="img-fluid article-image-preview-{{ $article->id; }} h-100 w-100 object-fit-cover">
            </div>
        </div>
        <div class="card-body">
            <div class="pb-3 mb-3 border-bottom d-flex justify-content-between align-items-center">
                <a href="javascript:;" data-toggle="modal" data-target="#edit-article" class="text-muted" style="text-decoration: underline;">
                    {{ \Str::limit($article->description, 20); }}
                </a>
                <div class="position-relative">
                    <input type="file" name="authorimage" accept="image/*" class="author-image-input-{{ $article->id; }}" style='display: none;' data-url="/articles/author/image/upload/{{ $article->id; }}">

                    <div class="add-author-image-loader-{{ $article->id; }} d-none position-absolute p-3 rounded-circle text-center border" style="bottom: 50%; right: 50%; z-index: 4; transform: translate(50%, 50%); background-color: rgba(0, 0, 0, 0.75); width: 25px; height: 25px; line-height: 25px;" data-id="{{ $article->id; }}">
                        <img src="/images/svgs/spinner.svg" class="position-absolute" style="top: 22.5%; right: 22.5%;">
                    </div>
                    <div class="rounded-circle cursor-pointer add-author-image-{{ $article->id; }}" data-id="{{ $article->id; }}" style="width: 25px; height: 25px;">
                        <img src="/images/authors/{{ empty($article->authorimage) ? 'default.png' : $article->authorimage; }}" class="img-fluid w-100 h-100 rounded-circle border article-author-image-preview-{{ $article->id; }}">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted">
                    {{ ucfirst($article->categoryname); }}
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input article-status" type="checkbox" data-url='{{ url("/articles/status/$article->id"); }}' id="published-{{ $article->id; }}" {{ $article->published ? 'checked' : ''; }} data-status="{{ $article->published }}">
                </div>
            </div>
        </div>
        <div class="card-footer bg-skyblue d-flex justify-content-between">
            <small class="text-white">
                {{ date('jS F Y', strtotime($article->created_at)); }}
            </small>
            <div class="d-flex">
                <small class="me-2">
                    <a href="javascript:;" class=" text-warning">
                        <i class="icofont-edit"></i>
                    </a>
                </small>
                <small class="text-danger cursor-pointer delete-article" data-url='{{ url("/articles/delete/{$article->id}"); }}'>
                    <i class="icofont-trash"></i>
                </small>
            </div>
        </div>
    </div>
</div>