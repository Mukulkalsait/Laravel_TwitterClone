<h4> Share yours ideas </h4>
<div class="row">

    {{-- <form action="/post" method="POST">      <<<====================  Conventional WAY  ====================|||    --}}

    <form action="{{ route('idea.create') }}" method="post">
        @csrf
        <div class="mb-3">
            {{--  ==========================  TEXTAREA with name="idea"  ========================== --}}
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>

            {{-- ==========================  To Show Validation Error  ========================== --}}
            @error('content')
                <p class=" fs-5 text-danger mt-2"> {{ $message }}</p>
            @enderror
        </div>
        <div class="">
            <button type="submit"class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
