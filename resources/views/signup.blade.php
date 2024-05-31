<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Registration Page</title>

    {{-- jQuery CDN --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
        integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-5/assets/css/registration-5.css">

    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="card border-light-subtle shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6 text-bg-primary">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="col-10 col-xl-8 py-3">
                                <img class="img-fluid rounded mb-4" loading="lazy"
                                    src="{{ asset('assets/images/logo.png') }}" width="245" height="80"
                                    alt="Socialbook Logo">
                                <hr class="border-primary-subtle mb-4">
                                <h2 class="h1 mb-4">We make digital products that drive you to stand out.</h2>
                                <p class="lead m-0">We write words, take photos, make videos, and interact with
                                    SocialBook.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h2 class="h3">Registration</h2>
                                        <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to register
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('signup.store') }}" method="POST" enctype="multipart/form-data"
                                id="signupForm">
                                @csrf
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="username" class="form-label">Userame <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="">
                                        <span class="text-danger" id="usernameError">
                                            @error('username')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="">
                                        <span class="text-danger" id="emailError">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <label for="profile_picture" class="form-label">Profile Picture</label>
                                        <input type="file" class="form-control" name="profile_picture"
                                            id="profile_picture">
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="">
                                        <span class="text-danger" id="passwordError">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Confirm Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" value="">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit">Sign up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <p class="m-0 text-secondary text-center">Already have an account? <a href="/login"
                                            class="link-primary text-decoration-none">Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ url('javascript/signup_valid.js') }}"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
