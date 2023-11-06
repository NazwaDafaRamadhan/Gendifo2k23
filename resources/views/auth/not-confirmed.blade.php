<!DOCTYPE html>
<html>
<head>
    <title>Belum Konfirmasi Akun</title>
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

    h1 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #fff;
    }

    .wrapper p {
    font-size: 16px;
    line-height: 1.5;
    color: #fff;
    }

    .button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #00C27B;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    }

    .button:hover {
        background-color: #fff;
        color: #00C27B;
    }


    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Belum Konfirmasi !</h1>
        <p>Maaf, akun Anda belum dikonfirmasi. Silakan tunggu hingga akun Anda dikonfirmasi.</p></br>
        <p>Jika sudah konfirmasi silahkan login kembali dengan klik tombol berikut.</p></br>
        <a class="button" href="/login">Kembali ke Halaman Login</a>
    </div>
</body>

</html>
