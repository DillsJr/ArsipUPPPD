<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://example.com/fontawesome/v6.5.2/js/all.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title> Login </title>

    <style>
        /* @extend display-flex; */
        display-flex,
        .signin-content,
        .social-login,
        .socials {
            display: flex;
            display: -webkit-flex;
        }

        /* @extend list-type-ulli; */
        list-type-ulli,
        .socials {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
            transition: all 300ms ease 0s;
            -moz-transition: all 300ms ease 0s;
            -webkit-transition: all 300ms ease 0s;
            -o-transition: all 300ms ease 0s;
            -ms-transition: all 300ms ease 0s;
        }

        input,
        select,
        textarea {
            outline: none;
            appearance: unset !important;
            -moz-appearance: unset !important;
            -webkit-appearance: unset !important;
            -o-appearance: unset !important;
            -ms-appearance: unset !important;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            appearance: none !important;
            -moz-appearance: none !important;
            -webkit-appearance: none !important;
            -o-appearance: none !important;
            -ms-appearance: none !important;
            margin: 0;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            box-shadow: none !important;
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            -o-box-shadow: none !important;
            -ms-box-shadow: none !important;
        }

        input[type=checkbox] {
            appearance: checkbox !important;
            -moz-appearance: checkbox !important;
            -webkit-appearance: checkbox !important;
            -o-appearance: checkbox !important;
            -ms-appearance: checkbox !important;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        p {
            margin-bottom: 0px;
            font-size: 15px;
            color: #777;
        }

        h2 {
            line-height: 1.66;
            margin: 0;
            padding: 0;
            font-weight: bold;
            color: #222;
            font-family: Poppins;
            font-size: 36px;
        }

        .main {
            background: #f8f8f8;
            padding: 150px 0;
        }

        body {
            font-size: 13px;
            line-height: 1.8;
            color: #222;
            background: #f8f8f8;
            font-weight: 400;
            font-family: Poppins;
        }

        .container {
            width: 900px;
            background: #fff;
            margin: 0 auto;
            box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
            -webkit-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
            -o-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
            -ms-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
            border-radius: 20px;
            -moz-border-radius: 20px;
            -webkit-border-radius: 20px;
            -o-border-radius: 20px;
            -ms-border-radius: 20px;
        }

        .signin-form,
        .signin-image {
            width: 50%;
            padding-top: 50px;
            overflow: hidden;
        }

        .form-title {
            margin-bottom: 33px;
        }

        figure {
            margin-top: 60px;
            margin-bottom: 50px;
            text-align: center;
        }

        .form-submit {
            display: inline-block;
            background: #6dabe4;
            color: #fff;
            border-bottom: none;
            width: auto;
            padding: 15px 39px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            margin-top: 25px;
            cursor: pointer;
        }

        .form-submit:hover {
            background: #4292dc;
        }

        #signin {
            margin-top: 16px;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
            overflow: hidden;
        }

        .form-group:last-child {
            margin-bottom: 0px;
        }

        input {
            width: 100%;
            display: block;
            border: none;
            border-bottom: 1px solid #999;
            padding: 6px 30px;
            font-family: Poppins;
            box-sizing: border-box;
        }

        label {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            color: #222;
        }

        .label-has-error {
            top: 22%;
        }

        .signin-content {
            padding-top: 67px;
            padding-bottom: 87px;
        }

        .social-label {
            display: inline-block;
            margin-right: 15px;
        }

        .signin-form {
            margin-right: 90px;
            margin-left: 80px;
        }

        .signin-image {
            margin-left: 110px;
            margin-right: 20px;
            margin-top: 10px;
        }

        /* Custom CSS for role select */
        .list-group select#role {
            width: 100%;
            display: block;
            border: none;
            border-bottom: 1px solid #999;
            padding: 6px 30px;
            font-family: Poppins;
            box-sizing: border-box;
            background-color: transparent;
            /* membuat latar belakang transparan */
            -webkit-appearance: none;
            /* menghilangkan tampilan default */
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            /* menampilkan kursor tangan saat di atasnya */
        }

        /* Custom arrow icon for role select */
        .list-group label[for="role"] i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            pointer-events: none;
            /* menghindari ikon dari interaksi */
        }

        /* Custom styling for selected option in role select */
        .list-group select#role option {
            color: #555;
            /* warna teks untuk opsi yang dipilih */
        }

        /* Custom styling for dropdown arrow icon */
        .list-group label[for="role"] i:before {
            content: '\f313';
            /* menggunakan kode unicode untuk ikon panah bawah */
            font-family: 'Material-Design-Iconic-Font';
            /* menggunakan font ikon */
        }

        /* Custom styling when the dropdown is open */
        .list-group select#role:focus+label[for="role"] i:before {
            transform: rotate(180deg);
            /* memutar ikon panah saat dropdown dibuka */
        }
    </style>

</head>

<body>
    <div class="main">
        <!-- Form Login -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoNHLo4kqMkw5aUpPl3vzEAACT5OMi5GNzEQ&s"
                                alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title"> Login </h2>
                        <?php if (session()->has('error')) : ?>
                        <div><?= session('error') ?></div>
                        <?php endif; ?>
                        <form action="/auth/processLogin" method="post" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="glyphicon glyphicon-user"></i></label>
                                <input type="text" id="username" name="username" placeholder="Username" required />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="glyphicon glyphicon-lock"></i></label>
                                <input type="password" id="password" name="password" placeholder="Password" required />
                            </div>
                            <div class="list-group">
                                <label for="role"></label>
                                <select id="role" name="role" type="option" required>
                                    <option select value=""> > Pilih Role < </option> <option value="admin"> Admin
                                    </option>
                                    <option value="petugas"> Petugas </option>
                                    <option value="pimpinan"> Pimpinan </option>
                                </select>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>