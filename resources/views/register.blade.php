<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                <p class="text-white-50 mb-5">Please enter your details to create an account!</p>

                                <!-- Form register -->
                                <form method="POST" action="{{ route('register.submit') }}">
                                    @csrf <!-- Laravel CSRF protection -->
                                    
                                    <!-- Name input -->
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeNameX">Name</label>
                                        <input type="text" id="typeNameX" name="name" class="form-control form-control-lg" required />
                                    </div>

                                    <!-- Email input -->
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeEmailX">Email</label>
                                        <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" required />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Password</label>
                                        <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" required />
                                    </div>

                                    <!-- Confirm Password input -->
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typeConfirmPasswordX">Confirm Password</label>
                                        <input type="password" id="typeConfirmPasswordX" name="password_confirmation" class="form-control form-control-lg" required />
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>

                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
