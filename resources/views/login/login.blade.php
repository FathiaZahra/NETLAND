<html>
    <head>
        @vite(['resources/sass/app.scss','resources/js/app.js'])
        <title>@yield('title')</title>
        @yield('header')
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/3b3dff70a2.js" crossorigin="anonymous"></script>

        <style>
            .login{
                height: 200px;
                width: 250px;
            }

            .vh-200 {
                position: relative;
                background: url('../foto/bg1.png') center/cover no-repeat; /* Sesuaikan dengan path dan nama file gambar Anda */
                height: max-content; /* Sesuaikan tinggi sesuai kebutuhan Anda */
             }

            .container {
                z-index: 1;
            }

            .form-outline {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            .form-label {
                align-self: flex-start;
            }

            .oval-button {
                border-radius: 20px; /* Sesuaikan nilai border-radius sesuai keinginan Anda */
                width: 40%;
                max-width: 500px:;
            }

            .input-group {
                border-radius: 20px; /* Sesuaikan nilai radius sesuai keinginan Anda */
                overflow: hidden; //Mengatasi overflow jika radius terlalu besar
            }
            
            .input-group .input-group-text {
                background-color: #fff; /* Warna latar belakang ikon */
                /* border: none; Hilangkan border ikon */
                border-radius: 20px 0 0 20px; /* Sesuaikan nilai radius sesuai keinginan Anda */
            }

            .input-group .form-control {
                /* border: none; Hilangkan border input */
                border-radius: 0 20px 20px 0; /* Sesuaikan nilai radius sesuai keinginan Anda */
            }
        </style>
    </head>
    <body>
        <section class="vh-200">
            <div class="container h-200">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5  text-center">
                <form method="get" action="dashboard/peminjaman">
                    @csrf
                      <h3>Sign in</h3>
                        <img src="../foto/tourist.jpg" class="login">
                      <div class="form-outline mb-4">
                        <label class="form-label"  for="typeEmailX-2">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" id="typeEmailX-2" name="username"  placeholder="masukkan username" class="form-control form-control-lg" />
                        </div>
                      </div>
          
                      <div class="form-outline mb-4">
                        <label class="form-label" for="typePasswordX-2">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" />
                        </div>
                      </div>
          
                      <!-- Checkbox -->
                      <div class="form-check d-flex justify-content-start mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                        <label class="form-check-label" for="form1Example3">Remember password </label>
                      </div>
          
                      <button class="btn btn-primary btn-block oval-button" style="background-color: #739072;" type="submit">Login</button>
                      <br><br>
                      <div>
                        <p>Not registered? <a href="#">Create an account</a></p>
                      </div>
          
                      <hr class="my-4">
          
                      {{-- <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
                        type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
                      <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
                        type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button> --}}
                </form>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
