@if (@session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif



{{--
<div class="toast border-success text-success show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header border-success text-success">
        <strong class="me-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div>
    <div class="toast-body">
        Hello, world! This is a toast message.
    </div>
</div> --}}
