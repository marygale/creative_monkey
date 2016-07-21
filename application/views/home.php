<?php
    $this->view('template/header');
    $this->view('template/logo');
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php echo $this->session->flashdata('success_msg');?>
    </div>
</div>
<div class="signup">
    <div class="container">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Creative Monkey Sign up <small>It's free!</small></h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open("auth/register")?>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name" value="<?php echo set_value('first_name');?>">
                                    <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name" value="<?php echo set_value('last_name');?>">
                                    <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="<?php echo set_value('email');?>">
                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="cpassword" id="cpassword" class="form-control input-sm" placeholder="Confirm Password">
                                    <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Register" class="btn btn-info btn-block">
                        <span class="small">Already has an account? <a href="<?php echo base_url();?>login"> Signin</a></span>
                       <?php echo form_close();?>
                        <?php echo $this->session->flashdata('msg');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
