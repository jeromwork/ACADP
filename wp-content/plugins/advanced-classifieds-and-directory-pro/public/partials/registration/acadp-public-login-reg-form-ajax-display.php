<div id="acadp_user_login_form_transport">
    <div id="acadp_user_login_form" class="modal fade mixed-form" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content card">
                <div class="modal-body card-block">
                    <div class="login-card-modal">
                        <div class="md-float-material" fo>
                            <div class="tabbed-modal">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#sign_in" role="tab" aria-expanded="true">
                                            <h6><?php _e('Login', 'advanced-classifieds-and-directory-pro'); ?></h6>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#regi" role="tab" aria-expanded="false">
                                            <h6><?php _e( 'Register', 'advanced-classifieds-and-directory-pro' ); ?></h6>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">


                                    <div class="tab-pane active" id="sign_in" role="tabpanel" aria-expanded="true">
                                        <form id="acadp_login_form" class="form-horizontal" action="<?php echo wp_login_url(home_url());?>" method="post" role="form">
                                            <div class="auth-box">
                                                <div class="row m-b-20 m-t-20">
                                                    <div class="col-md-12">
                                                        <h3 class="text-center txt-primary"><?php _e('Login', 'advanced-classifieds-and-directory-pro'); ?></h3>
                                                    </div>
                                                </div>
                                                <p class="text-inverse b-b-default text-left p-b-5">Вход через соцсети:</p>
                                                <div class="row m-b-20">
                                                <?php echo do_shortcode('[TheChamp-Login style="background-color:#000;"]') ?>
                                                    <div class="col-md-6 col-xl-6">
                                                        <button class="btn btn-facebook m-b-20"><i class="icofont icofont-social-facebook"></i>Вход через Facebook</button>
                                                    </div>
                                                    <div class="col-md-6 col-xl-6">
                                                        <button class="btn btn-twitter m-b-20"><i class="icofont icofont-social-twitter"></i>Вход через Twitter</button>
                                                    </div>
                                                </div>
                                                <p class="text-inverse b-b-default text-left p-b-5">Вход через логин/пароль</p>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="<?php _e('Username or E-mail', 'advanced-classifieds-and-directory-pro'); ?>" name="log" id="acadp-user-login2">
                                                    <span class="md-line"></span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" placeholder="<?php _e('Password', 'advanced-classifieds-and-directory-pro'); ?>" name="pwd" id="acadp-user-pass">
                                                    <span class="md-line"></span>
                                                </div>
                                                <div class="row m-t-25 text-left">
                                                    <div class="col-sm-6 col-xs-12">
                                                        <div class="checkbox-fade fade-in-primary">
                                                            <label>
                                                                <input type="checkbox" value="">
                                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                                <span class="text-inverse"><?php _e('Remember Me', 'advanced-classifieds-and-directory-pro'); ?></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xs-12 forgot-phone text-right">
                                                        <a href="forgot-password.html" class="text-right f-w-600 text-inverse"> <?php _e('Forgot your password?', 'advanced-classifieds-and-directory-pro'); ?></a>
                                                    </div>
                                                </div>
                                                <div class="row m-t-15">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center"><?php _e('Login', 'advanced-classifieds-and-directory-pro'); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>



                                    <div class="tab-pane" id="regi" role="tabpanel" aria-expanded="false">
                                        <form id="acadp_register_form" class="form-horizontal" action="<?php echo wp_registration_url(); ?>" method="post" role="form">
                                            <div class="auth-box">
                                                <div class="row m-b-20 m-t-20">
                                                    <div class="col-md-12 ">
                                                        <h3 class="text-center txt-primary">Регистрация. Легко и быстро.</h3>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="input-group">
                                                    <input type="hidden" name="username" id="acadp_username" class="form-control" required placeholder="<?php _e( 'Username', 'advanced-classifieds-and-directory-pro' ); ?>">
                                                    <span class="md-line"></span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="email" name="email" id="acadp_email" class="form-control" required placeholder="<?php _e( 'E-mail Address', 'advanced-classifieds-and-directory-pro' ); ?>">
                                                    <span class="md-line"></span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="password" name="pass1" id="acadp_pass1" class="form-control" autocomplete="off" required  class="form-control" placeholder="<?php _e( 'Password', 'advanced-classifieds-and-directory-pro' ); ?>">
                                                    <span class="md-line"></span>
                                                </div>
                                                <div class="input-group">
                                                    <input type="password" name="pass2" id="acadp_pass2" class="form-control" autocomplete="off" data-match="#acadp-pass1" required  class="form-control" placeholder="<?php _e( 'Confirm Password', 'advanced-classifieds-and-directory-pro' ); ?>">
                                                    <span class="md-line"></span>
                                                </div>

                                                <div class="row m-t-25 text-left">
                                                    <div class="col-md-12">
                                                        <div class="checkbox-fade fade-in-primary">
                                                            <label>
                                                                <input type="checkbox" value="">
                                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                                <span class="text-inverse">С правилами ознакомлен <a href="#">Terms &amp; Conditions</a></span>
                                                           
                                                                <input type="hidden" name="redirect_to" value="<?php echo home_url(); ?>" />
                                                             </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row m-t-15">
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center" ><?php _e( 'Register', 'advanced-classifieds-and-directory-pro' ); ?></button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <p class="text-inverse text-left m-b-0">Спасибо за интерес к нашему сайту.</p>
                                                        <p class="text-inverse text-left"><b>Ваша команда разработчиков</b></p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img src="wp-content/themes/adminty/images/Logo-small-bottom.png" alt="small-logo.png">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>