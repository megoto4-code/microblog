<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url() ?>resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url() ?>resources/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="panel panel-info" id="header-wrap">
            <div class="panel-body">      
                <div class="row">               
                    <div class="col-md-6">
                        <h1 id="header">
                            <?php echo anchor('/', $site_name); ?>
                            <small><?php echo $site_slogun; ?></small>
                        </h1>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav nav-pills pull-right">                    
                            <li<?php active_menu('login') ?>><?php echo anchor('/auth/login', 'Login'); ?></li>
                            <li<?php active_menu('create_user') ?>><?php echo anchor('/auth/create_user', 'Create an Account'); ?></li>
                            <li<?php active_menu('forgot_password') ?>><?php echo anchor('/auth/forgot_password', 'Forgot Password'); ?></li>                    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">            
            <div class="row">
                <?php
                echo $content . "\n";
                ?>
            </div>
            <div class="footer">
                <p class="text-center">Created by <strong><?php echo $creator; ?></strong>. Copyright &copy;</p>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() ?>resources/bootstrap/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>resources/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>