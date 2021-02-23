<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absen Kontrak Budpar | Login</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>">
</head>
<body style='background-image:url("<?=base_url('assets/img/nature.jpg')?>");background-repeat:no-repeat;background-attachment:fixed;background-size:cover'>
<!-- <body style="background-color: #333333;"> -->

    <div class="wraper " >
        <div class="container" >
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 ml-auto mr-auto mt-5" >
                    <section id="login-body" class="pt-3">
                        <div class="card border-0 shadow pt-3">
                            <div class="card-header bg-transparent border-bottom-20 pb-0 text-center">
                                <img src="<?= base_url('assets/img/budpar1.png') ?>" alt="Logo Indoexpress" class="img-fluid mx-auto d-block">
                                <div class="mt-3">
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if(@$this->session->error): ?>
                                    <div class="alert alert-danger alert-dismissable fade show" role="alert">
                                        <button class="close" aria-dismissable="alert">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <p><?= $this->session->error ?></p>
                                    </div>
                                <?php endif; ?>
								
								
                                <form action="<?= base_url('auth/login') ?>" method="post">
                                    <div class="form-group">
                                        <label for="username">Username :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                            </div>
                                            <input type="text" name="username" id="username" class="form-control" autocomplete="username" placeholder="Username" value="adminabsen"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                            </div>
                                            <input type="password" name="password" id="password" class="form-control" autocomplete="current-password" placeholder="**********" value="ahmad"/>
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</body>
</html>