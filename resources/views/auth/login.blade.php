@section('title', 'Login')
@include('sweetalert::alert')

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gendifo - @yield('title')</title>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Open Sans", sans-serif;
    }

    body {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    width: 100%;
    padding: 0 10px;
    }

    body::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: url("../img/latar_desa.jpg"), #000;
    background-position: center;
    background-size: cover;
    }

    .wrapper {
    width: 400px;
    border-radius: 8px;
    padding: 30px;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(9px);
    -webkit-backdrop-filter: blur(9px);
    }

    form {
    display: flex;
    flex-direction: column;
    }

    h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #fff;
    }

    .input-field {
    position: relative;
    border-bottom: 2px solid #ccc;
    margin: 15px 0;
    }

    .input-field label {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    color: #fff;
    font-size: 16px;
    pointer-events: none;
    transition: 0.15s ease;
    }

    .input-field input {
    width: 100%;
    height: 40px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 16px;
    color: #fff;
    }

    .input-field input:focus~label,
    .input-field input:valid~label {
    font-size: 0.8rem;
    top: 10px;
    transform: translateY(-120%);
    }

    .forget {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 25px 0 35px 0;
    color: #fff;
    }

    #remember {
    accent-color: #fff;
    }

    .forget label {
    display: flex;
    align-items: center;
    }

    .forget label p {
    margin-left: 8px;
    }

    .wrapper a {
    color: #efefef;
    text-decoration: none;
    }

    .wrapper a:hover {
    text-decoration: underline;
    }

    button {
    background: #fff;
    color: #000;
    font-weight: 600;
    border: none;
    padding: 12px 20px;
    cursor: pointer;
    border-radius: 3px;
    font-size: 16px;
    border: 2px solid transparent;
    transition: 0.3s ease;
    }

    button:hover {
    color: #fff;
    border-color: #fff;
    background: rgba(255, 255, 255, 0.15);
    }

    .register {
    text-align: center;
    margin-top: 30px;
    color: #fff;
    }

    .custom-checkbox-label {
      display: inline-block;
      position: relative;
      padding-left: 0;
      cursor: pointer;
    }

    .custom-checkbox {
      display: none;
    }

    .custom-checkbox-indicator {
      position: absolute;
      top: 0;
      left: 0;
      width: 30px;
      height: 30px;
      background-color: #fff;
      border: 2px solid #333;
      border-radius: 5px;
    }

    span.custom-checkbox-indicator {
      color: #fff !important; /* Mengubah warna teks span menjadi putih */
    }

    .custom-checkbox:checked + .custom-checkbox-indicator::after {
      content: "\2713";
      position: absolute;
      top: 5px;
      left: 7px;
      font-size: 18px;
      color: #333;
    }

    .custom-checkbox-label:hover .custom-checkbox-indicator {
      background-color: #f0f0f0;
      border-color: #666;
    }

    button[type="submit"] {
      margin-top: 10px; /* Atur margin di atas tombol Log In sesuai kebutuhan Anda */
    }


  </style>
</head>

<body>
  <div class="wrapper">
    <form id="login-form" method="POST" action="/login">
        @csrf
      <h2>Login</h2>
        <div class="input-field">
        <input type="email" id="email" autocomplete="off" name="email" required value="{{ old('email') }}">
        <label>Masukkan Email</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" autocomplete="off" name="password" required>
        <label>Masukkan Password</label>
      </div>
      <div class="forget">
        <label for="show">
          <input type="checkbox" id="check">
          <p>Show Password</p>
        </label>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="/register">Register</a></p>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Script sweetalert notification -->
  @if (session('toast_error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('toast_error') }}",
                showConfirmButton: false,
                timer: 3000,
                confirmButtonColor: '#005c97',
            });
        </script>
    @endif

    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                showConfirmButton: true,
                timer: 3000,
                confirmButtonColor: '#005c97',
            });
        </script>
    @endif

    <script>
      check.onclick = TogglePassword;
      function TogglePassword() {
        if(check.checked) password.type="text";
        else password.type="password";
      }
    </script>

</body>
</html>