<section class="">
    <form method="POST" action="{{ route('timeline.new.post') }}" enctype="multipart/form-data" class="card mx-auto" style="max-width: 600px">
        @csrf


        <div class="card-header">
            <h5>Whats on your mind</h5>
            @error('caption')
                <p class="small fw-bold text-danger m-0">{{ $message }}</p>
            @enderror
            @error('image')
                <p class="small fw-bold text-danger m-0">{{ $message }}</p>
            @enderror
        </div>

        <div class="card-body">
            <textarea name="caption" id="" class="form-control" placeholder="Tell Us" rows="5"></textarea>

            <div class="d-flex justify-content-between align-items-center gap-4">
                <label for="selectImage" >
                    <i class="fa-solid fa-image fs-4 my-3"></i>
                </label>

                <button class="btn btn-primary">
                    Post
                </button>
            </div>
            <input type="file" accept="image/*" name="image" id="selectImage" class="d-none">
        </div>
    </form>
</section>