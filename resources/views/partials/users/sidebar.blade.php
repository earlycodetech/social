<div class="sticky">
    <form action="" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search People, Groups...">
            <button class="btn btn-outline-danger">
                <i class="fa-solid fa-search"></i>
            </button>
        </div>
    </form>

    <!-- Some borders are removed -->
    <h5 class=" mt-5">
        <i class="fa-solid fa-users"></i> Friends
    </h5>
    <ul class="list-group list-group-flush">
        @for ($i = 0; $i < 3; $i++)
            
        <li class="list-group-item">
            <div class="d-flex align-items-center gap-4">
                <img src="{{ asset('avatars/user.png') }}" id="avatar" alt="">
                <div>
                    <p class="fs-5 fw-bold mb-1"> {{ fake()->name }} </p>
                    <p class="mb-1 small">
                        {{ '@'.fake()->username }}
                    </p>
                </div>
            </div>
        </li>
        @endfor

        <li class="list-group-item text-center pt-3">
            <a href="" class="btn btn-outline-danger">
                View All
            </a>
        </li>
    </ul>
</div>
