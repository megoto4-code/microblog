<div class="col-md-8">
    <div class="jumbotron">
        <div class="container">
            <h1>Welcome</h1>
            <p>Microblogging has emerged as an important source of real-time news updates for recent crisis situations. The short nature of updates allows users to post news items quickly, reaching its audience in seconds.</p>
            <p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>">Learn more</a></p>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
            <?php echo form_open('auth/login') ?>            
            <?php echo validation_errors(); ?>
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" value="" class="form-control input-lg" placeholder="Give your Username here" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="" class="form-control input-lg" placeholder="Give your Password here" />
            </div>    
            <div class="form-group">
                <input type="submit" value="Log in" class="btn btn-primary btn-block"/>
            </div>
            <?php flash_msg(1, '<div class="alert alert-info">', '</div>'); ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>