<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Create an Account</h3>
        </div>
        <div class="panel-body">
            <?php echo form_open('auth/create_user'); ?>
            <?php flash_msg(1, '<div class="alert alert-info">', '</div>'); ?>
            <?php echo validation_errors(); ?>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" name="firstname" value="<?php echo set_value('firstname'); ?>" class="form-control" placeholder="Give your First Name" />
                </div>
                <div class="form-group col-md-6">
                    <label>Second Name</label>
                    <input type="text" name="secondname" value="<?php echo set_value('secondname'); ?>" class="form-control" placeholder="Give your First Name" />
                </div>
            </div>  
            <div class="form-group">
                <label>User Name (a valid email)</label>
                <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Give your Username here" />
            </div>
            <div class="form-group">
                <label>Choose a password</label>
                <input type="password" name="password" value="" class="form-control" placeholder="Give your Password here" />
            </div>    
            <div class="form-group">
                <label>Re-type the password</label>
                <input type="password" name="rpassword" value="" class="form-control" placeholder="Give your Password here" />
            </div>
            <div class="form-group">
                <label>Your date of birth</label>
                <div class="row">
                    <div class="form-group col-md-3"><?php months('form-control input-sm'); ?></div>
                    <div class="form-group col-md-3"><?php days('form-control input-sm'); ?></div>
                    <div class="form-group col-md-3"><?php years('1920', '2014', 'form-control input-sm'); ?></div>
                </div>
            </div>  
            <div class="form-group">        
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" value="male"  <?php echo set_radio('gender', 'male'); ?>>
                        Male
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="gender" value="female" <?php echo set_radio('gender', 'female'); ?>>
                        Female
                    </label>
                </div>
            </div>      
            <div class="form-group">
                <input type="submit" value="Sign up" class="btn btn-primary btn-block"/>
            </div>    
            <?php echo form_close(); ?>
        </div>
    </div>
</div>