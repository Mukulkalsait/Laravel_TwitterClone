<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> Mario
                        </a></h5>
                </div>
            </div>
            <div class="div">
                <form action="{{ route('idea.destroy', $idea->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger border border-black">X</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">

            @if ($editing ?? false)
            <form action="{{ route('idea.update', $idea->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    {{--  ==========================  TEXTAREA with name="idea"  ========================== --}}
                    <textarea name="content" class="form-control" id="content" rows="3">{{$idea->content}}</textarea>

                    {{-- ==========================  To Show Validation Error  ========================== --}}
                    @error('content')
                        <p class=" fs-5 text-danger mt-2"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="">
                    <button type="submit"class="btn btn-sm btn-info border border-black"> Update Idea </button>
                </div>
            </form>
            @else
            <p class="fs-6 fw-light text-muted fw-bolder">
                {{ $idea->content }}
            </p>

            @endif

        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link text-danger fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-info "> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        <div class="d-flex justify-content-end my-2">

            <div class="m-1">
                <a href="{{route('idea.edit',$idea->id)}}" class="btn btn-warning border border-black btn-sm">Edit</a>
            </div>

             <div class="m-1">
                     <a href="{{route('idea.show',$idea->id)}}" class="btn btn-success border border-black btn-sm">Go To Main Post</a>
             </div>





        </div>
        <div>
           @include('shaired.comment-box')
        </div>
    </div>


</div>
