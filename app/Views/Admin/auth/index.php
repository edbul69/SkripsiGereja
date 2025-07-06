<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Yinka Enoch Adedokun">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('Admin/img/icon/icon.png'); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    .main-content {
        width: 50%;
        border-radius: 20px;
        box-shadow: 0 5px 5px rgba(0, 0, 0, .4);
        margin: 5em auto;
        display: flex;
        overflow: hidden;
    }

    .company__info {
        background-color: #4e73df;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #fff;
        padding: 2em;
    }

    .company__logo h2 {
        font-size: 3em;
        margin: 0;
    }

    .login_form {
        flex: 2;
        background-color: #fff;
        padding: 2em;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    @media screen and (max-width: 640px) {
        .main-content {
            width: 90%;
            flex-direction: column;
        }

        .company__info {
            display: none;
        }

        .login_form {
            border-radius: 20px;
        }
    }

    .form__input {
        width: 100%;
        border: none;
        border-bottom: 1px solid #aaa;
        padding: 1em 0.5em;
        margin: 1.5em 0;
        outline: none;
        transition: all .3s ease;
    }

    .form__input:focus {
        border-bottom-color: #4e73df;
        box-shadow: 0 0 5px rgba(0, 80, 80, .4);
    }

    .btn {
        width: 100%;
        height: 20%;
        border-radius: 30px;
        color: #4e73df;
        background-color: #fff;
        border: 1px solid #4e73df;
        margin-top: 1.5em;
        transition: all .3s ease;
    }

    .btn:hover,
    .btn:focus {
        background-color: #4e73df;
        color: #fff;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="main-content">
            <div class="company__info">
                <div class="company__logo">
                    <img src="<?= base_url('Admin/img/icon/icon.png'); ?>" alt="GPdI BAHU Logo" style="">
                </div>
            </div>
            <div class="login_form">
                <h2>Log In</h2>
                <?php if (session()->getFlashdata('logout_message')): ?>
                    <div class="alert alert-info">
                        <?= session()->getFlashdata('logout_message') ?>
                    </div>
                <?php endif; ?>
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-danger">' . session()->getFlashdata('pesan') . '</div>';
                }
                ?>
                <form method="post" action="<?php echo base_url('/login/auth') ?>" class="form-group">
                    <input type="text" name="username" id="username" class="form__input" placeholder="Username" required>
                    <input type="password" name="password" id="password" class="form__input" placeholder="Password" required>
                    <input type="submit" value="Submit" class="btn">
                </form>
            </div>
        </div>
    </div>
</body>