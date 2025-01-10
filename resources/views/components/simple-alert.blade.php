{{-- to displays error or success message --}}
@if (session()->has('success'))
    <div class="alert alert-success d-flex justify-content-between">
        <h5>{{ session()->get('success') }}</h5>
        <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close">X</button>
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger d-flex justify-content-between">
        <h5>{{ session()->get('error') }}</h5>
        <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close">X</button>
    </div>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger d-flex justify-content-between">
            <h5>{{ $error }}</h5>
            <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endforeach
@endif
{{-- to displays error or success message end --}}
