<section class="header">
    <div class="row">
        <div class="col-md-12">
            <div class="site-header">
                <div class="mini-header">
                    <!--                    <div class="logout">-->

                    <!--                        --><?php
                    //                        if (isset( $_SESSION['display_name'] )) {
                    //                            if (!$_SESSION['display_name'] == "") {
                    //                                echo ('<a href="?&logout" class="hvr-buzz-out text-decoration-none">' . "LOGOUT" . '</a>');
                    //                            }
                    //                            if (isset( $_GET['logout'] )) {
                    //                                session_destroy ();
                    //                                unset( $_SESSION['login_user'] );
                    //                                header ( 'location:login.php' );
                    //                            }
                    //                        }
//                                             ?>

                    <!--                    </div>-->
                    <div class="container">
                        <div class="mini-header-center">
                            <div class="small-nav-mobile">
                                <i style="color: orange;" class='icon-user'></i>
                                <a class="profile-btn" id="profile_collapse">
                                    Profile
                                </a>
                                <div id="profile_collapse_card" class="profile_collapse_card">
                                    <div class="cart">
                                        <div class="cart-top">
                                            <button id="cart-close" type="button" class="close mt-3" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="cart-center">
                                            <!--                                            <i class='icon-user'></i>-->
                                            <!--                                            <p>Profile Name</p>-->
                                            <?php
                                            if ($display_name == '' && $login_user == '' ) {
                                                echo ('<p>' . '<a href="login.php">' . "LOGIN" . '</a>' . '</p>');
                                            } else {
//                                                echo ('<p>' . '<a class="profile-result" href="login.php">' . ($_SESSION['display_name']) . " / " . $userid . '</a>' . '</p>');
                                                echo ('<i style="color: orange;" class="icon-user">' . '</i>');
                                                echo ('<p>' . "Profile Name" . '</p>');
                                                echo ('<p>' . '<a class="profile-result" href="login.php">' . ucfirst ( ($display_name)) . '</a>' . '</p>');
                                                echo ('<p style="margin-top: 10px">' . "شناسه :" . " $userid" . '</p>');
                                            }
                                            ?>
                                        </div>
                                        <div class="cart-down">
                                            <div class="logout">
                                                <?php
                                                    if (!$display_name == '' || !$login_user == '') {
                                                        echo ('<a href="?&logout" class="hvr-buzz-out text-decoration-none">' . "LOGOUT" . '</a>');
                                                    }
                                                    if (isset( $_GET['logout'] )) {
                                                        session_destroy ();
                                                        unset( $_SESSION['login_user'] );
                                                        header ( 'location:login.php' );
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="small-nav">
                                <li><a class="hvr-underline-from-center" id="mobile_company" href="#" title="همکاران">
                                        داخلی ها</a></li>
                                <li><a class="hvr-underline-from-center" href="#" title="اضافه کاری"> شیفت ها</a></li>
                                <li><a class="hvr-underline-from-center" href="#" title="تقویم میلادی"> تقویم</a></li>
                                <?php

                                if (in_array("$login_user",$admin_group) == 1) {
                                    echo ('<li>' . '<a class="hvr-underline-from-center" href="./php/manager.php?manager_count" title="Administrator">' . "مدیریت" .'</a>'.'</li>');
                                }else {
                                    echo ('<li>' . '<a class="text-muted" title="دسترسی ندارید">' . "مدیریت" . '</a>' . '</li>');
                                }
                                ?>
                                <li><a class="hvr-underline-from-center" href="livetable/livetable.html" title="طراحی و گرافیک"> Design</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mini-header-toggle" id="mini-header-toggle">
                </div>
                <div class="big-header">
                    <div class="setareh-icon">
                        <a href="#">
                            <img src="img/logo.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>