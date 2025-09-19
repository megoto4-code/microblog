<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Forgot Password</h3>
        </div>
        <div class="panel-body">
            <?php echo form_open('auth/login') ?>            
            <?php echo validation_errors(); ?>
            <div class="form-group">
                <label>User Name</label>
                <input type="text" name="username" value="" class="form-control input-lg" placeholder="Give your Username here" />
            </div>      
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary btn-block"/>
            </div>
            <?php flash_msg(1, '<div class="alert alert-info">', '</div>'); ?>
            <?php echo form_close() ?>
        </div>
    </div>
</div>