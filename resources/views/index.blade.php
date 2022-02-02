<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="csrf-token"
          content="{{ csrf_token() }}">
    <title>jobs.at coding exercise</title>

    <link rel="stylesheet"
          href="{{ mix('/css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
          crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600"
          rel="stylesheet">
</head>
<body>

<header class="bgr-light w-100 p-3 d-flex fixed-top">
    <div class="col-2">
        <div class="rounded-circle bgr-main h-25-w-25"></div>
    </div>
    <nav class="col-10">
        <a href="/" class="text-dark text-decoration-none">Home</a> |
        <a href="/add-job" class="text-dark text-decoration-none">Add new job ad</a>
    </nav>
</header>


<main class="pt-3 d-flex flex-column flex-sm-row container">

    <aside class="col-12 col-sm-3 col-md-2">
        <div class="col-6 col-md-12 ">
            <div class="fw-bold">Location</div>
            <div class="py-3"
                 id="locations">
            </div>
        </div>
        <div class="col-md-12 col-6">
            <div class="fw-bold">Company</div>
            <div class="py-3"
                 id="companies">
            </div>
        </div>
    </aside>

    <div class="col-12 col-sm-9 col-md-10">

        <div class="d-flex">
            <input type="search"
                   id="input-search"
                   class="form-control"
                   placeholder="Title">
                <div class="bgr-grey h-25-w-25 py-1"><i class="fas fa-search"></i></div>
        </div>

        <div>
            @foreach($jobs as $job)
                <div class="job-container {{ $job->active == 0 ? 'inactive' : ''}} bgr-light my-2 p-2">
                    <div class="fw-bold fs-5">{{ $job->title }}</div>
                    <div class="d-flex">
                        <span class="bgr-main text-white p-1 rounded me-2 font-14 company">
                            <input type="hidden"
                                   value="{{ $job->company_id }}">
                        </span>
                        <span class="bgr-main text-white p-1 rounded me-2 font-14">{{ $job->location }}</span>
                        <span class="bgr-main text-white p-1 rounded me-2 font-14">{{ $job->published_at }}</span>
                    </div>
                    <div>{{ $job->description }}</div>
                </div>
            @endforeach
        </div>
    </div>

</main>

<script src="{{ mix('/js/app.js') }}"
        defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>

