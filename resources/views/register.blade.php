<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
      html, body {
        height: 100%;
      }
      body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
      .form-signup {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }
    </style>
  </head>
  <body class="text-center">
    
    <main class="form-signup">
      <form action="/user/simpan" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Register</h1>
        
        <div class="form-floating">
          <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
          <label for="name">Full Name</label>
        </div>
        
        <div class="form-floating">
          <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
          <label for="email">Email address</label>
        </div>
        
        <div class="form-floating">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
          <label for="password">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      </form>
      
      <p class="mt-3">Sudah punya akun? <a href="/login">Login</a></p>
    </main>
    
    @if(session('success'))
        <script>
            Swal.fire({
              title: "Berhasil",
              text: "{{ session('success') }}",
              icon: "success"
            });
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({
              title: "Gagal",
              text: "{{ session('error') }}",
              icon: "error"
            });
        </script>
    @endif

  </body>
</html>
