<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-login.css" />
<title>Login</title>
</head>

<body>
    <div class="container-login">
        <div class="forms-container">
            <div class="signin">
                <form method="post" action="<?php echo base_url('login/auth') ?>" class="sign-in-form">
                    <img src="<?php echo base_url() ?>assets/img/logo_dikdasmen.svg" alt="" class="image-logo">
                    <?php echo $this->session->flashdata('message'); ?>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username / Email / NISN" id="username" name="username" />
                    </div>
                    <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" id="password" name="password" />
                    </div>
                    <?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
                    <button class="btn solid">Login</button>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h1>SD Muhammadiyah Trini</h1>
                    <p>
                        Sistem Informasi Nilai Siswa
                    </p>
                </div>
                <img src="<?php echo base_url() ?>assets/img/school.svg" class="image" alt="" />
            </div>
        </div>
    </div>