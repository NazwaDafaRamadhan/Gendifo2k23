@section('title', 'Register')
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
  </style>
</head>

<body>
  <div class="wrapper">
    <form id="register-form" method="POST" action="/register">
    @csrf
    <h2>Register</h2>
    <div class="input-field">
      <input type="text" id="username" autocomplete="off" name="nama" required value="{{ old('nama') }}">
      <label>Masukkan Nama Pengguna</label>
    </div>
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
    <input type="hidden" name="status" value="Non-Active">
    <input type="hidden" name="user_role" value="Admin">
    <button type="submit">Register</button>
    <div class="register">
      <p>Already have an account? <a href="/login">Log In</a></p>
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