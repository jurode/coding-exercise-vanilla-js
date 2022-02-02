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

    <div class="col-12 col-sm-9 col-md-10 offset-sm-3 offset-md-2" id="signForm">

        <h1>Please sign in</h1>

        <div class="d-flex flex-column">
            <div class="bg-danger mb-2 p-2" id="feedback"></div>
            <label for="username">Username:</label>
            <input type="text"
                   id="username"
                   class="form-control"
                   placeholder="Username">

            <label for="password">Password:</label>
            <input type="password" placeholder="Password"
                   class="form-control">
            <button type="button" class="btn btn-secondary my-3" (click)="onSubmit()">Sign in</button>
            <div class="bg-light p-2 border">
                Hint:
                <ul>
                    <li>Credentials: 'admin' / 'supersecure'</li>
                    <li>set 'signedIn' manually to 'true' in app.js:179</li>
                </ul>

            </div>
        </div>


    </div>

    <div class="col-12 col-sm-9 col-md-10 offset-sm-3 offset-md-2" id="addForm">

        <h1>Add a new job-ad</h1>

        <div class="d-flex flex-column">

            <label for="title">Title:</label>
            <input type="text" placeholder="Title" class="form-control">

            <label for="description">Description:</label>
            <textarea name="description" class="form-control"
                      cols="30"
                      rows="5">Description</textarea>

            <label for="location">Location:</label>
            <input type="text" class="form-control" placeholder="Location">

            <label for="location">Company:</label>
            <select name="company" class="form-control"
                    id="company-select">
                <option value="" selected disabled>Select a company</option>
            </select>

            <button class="btn btn-secondary mt-3">Submit new job</button>

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

