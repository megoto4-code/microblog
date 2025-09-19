<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url() ?>resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        
    </head>
    <body>        
        <nav class="navbar navbar-default navbar-static-top" role="navigationr">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">                        
                            <a class="navbar-brand" href="#"><?php echo $site_name; ?></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search" size="80">
                                </div>
                                <button type="submit" class="btn btn-default">Search</button>
                            </form>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo base_url() ?>profile"><span class="glyphicon glyphicon-user"></span> <strong><?php echo $username; ?></strong></a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-wrench"></span> Settings <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#">Privacy</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li><?php echo anchor('home/logout', 'Logout'); ?></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="<?php echo base_url() ?>" class="list-group-item active">
                            <span class="badge"><?php echo $total_posts; ?></span>New Posts 
                        </a>
                        <a href="<?php echo base_url() ?>home/followers" class="list-group-item"><span class="badge"><?php echo $total_followers; ?></span>Followers</a>
                        <a href="<?php echo base_url() ?>home/following" class="list-group-item"><span class="badge"><?php echo $total_followings; ?></span>Following</a>
                        <a href="<?php echo base_url() ?>home/messages" class="list-group-item"><span class="badge"><?php echo $total_unseen_messages; ?></span>Messages</a>
                        <a href="<?php echo base_url() ?>home/pages" class="list-group-item">Pages</a>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Popular Profiles
                        </div>
                        <div class="panel-body">
                            Panel content
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Popular pages
                        </div>
                        <div class="panel-body">
                            Panel content
                        </div>
                    </div>
                </div>
                <div class="col-md-9">

                    <?php
                    echo $content . "\n";
                    ?>

                </div>                
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