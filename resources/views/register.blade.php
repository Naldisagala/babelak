<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{url('/image/tittle.svg')}}">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/font/css/all.min.css">
    
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    <title>Register</title>
</head>

<body class="kiri">
    <div class="container-fluid">
    <div class="row  ">
        <div class="col ">
                <div class="card-body">
              </div>
        </div>
        <div class="col log" style="height: 100vh!important">
                <div class="card-body mt-4">
                    <form> 
                        <img class="mb-4 pad" src="{{url('/image/logo_log.png')}}" alt="" width="150" height="57">
                        <h1 class="h3 mb-4 fw-bold">Register</h1>
                        <div class="pad-form row">
                            <div class="col">
                            <h6>Nama</h6>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Nama">
                                <label for="floatingInput">Masukkan Nama</label>
                            </div>
                            </div>
                            <div class="col">
                                <h6>Username</h6>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="Username">
                                    <label for="floatingInput">Masukkan Usename</label>
                                </div>
                            </div>
                            <h6  class="mt-4">Email</h6>
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingPassword" placeholder="email">
                                <label for="floatingPassword">&nbsp&nbsp&nbsp Masukkan Email</label>
                            </div>
                            
                            <h6  class="mt-4">No Handphone</h6>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="no hp">
                                <label for="floatingPassword">&nbsp&nbsp&nbsp Masukkan no handphone</label>
                            </div>
                            <h6  class="mt-4">Password</h6>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">&nbsp&nbsp&nbsp Masukkan Password</label>
                            </div>
                            <h6  class="mt-4">Konfirmasi Password</h6>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">&nbsp&nbsp&nbsp Konfirmasi Password</label>
                            </div>
                        
                            <div class="checkbox mb-3 row">
                                <label class="col-7">
                                    <input type="checkbox" value="remember-me"> Ingat saya
                                </label>
                                <label class="col-5">
                                    <a>Lupa Password?</a>
                                </label>
                            </div>
                            <button class="w-100 btn btn-sm btn-primary fw-bold" type="submit">Login</button>
                            <hr style="width: 100%">     
                            <button class="w-100 btn btn-sm btn-light" type="submit">
                                <img src="{{url('/image/google.png')}}" alt="" width="25" height="25">Login dengan Google
                            </button>
                            <div style="text-align: center">
                                <br>
                                Belum punya akun? <a href="">Daftar</a>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>