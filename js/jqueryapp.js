$(document).ready(function () {
    $("#phone_company").click(function () {
        $("#mini-header-toggle").fadeToggle('slow');
    });
    var submit = $('#submit');
    submit.click(function () {
        var fancybox = $("#fancybox");
        var user_name = $("#user_name").val();
        var family = $("#family").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var save = $("#save");
        var $fancy_btn = $("#fancy_btn");
        var $fancy_result = $('#fancy_result');
        var fancy_back = $('#fancy_back');
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++Check or not check in jquery
        if ($('#rate0').is(':checked')) {
            var rate = "GOLD";
            window.console && console.log("rate =", rate);
        } else if ($('#rate1').is(':checked')) {
            var rate = "SILVER";
            window.console && console.log("rate =", rate);
        } else if ($('#rate2').is(':checked')) {
            var rate = "BRONZE";
            window.console && console.log("rate =", rate);
        }
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Check or not check in jquery
        //http://localhost/crm/php/mysql.php?rate=bronze&user_name=&family=&email=hr.ahmadi689%40yahoo.com&phone=&date=&save=           url test pasokh
        var dataString = '&rate=' + rate + '&user_name=' + user_name + '&family=' + family + '&email=' + email + "&phone=" + phone + "&save=";
// Returns successful data submission message when the entered information is stored in database.
        if (rate == '' || user_name == '' || family == '' || email == '' || phone == '') {
            alert("لطفا تمام فیلد های داخل جدول را پر کنید");
        } else {
// AJAX code to submit form.
            $.ajax({
                type: "GET",
                url: 'http://localhost/crm/php/mysql.php',
                data: dataString,
                cache: false,
                success: function (respo) {
                    $('#fancy_back').addClass(' fancy');
                    $('#fancybox').addClass(' myjavacss');
                    if (respo == 3000) {
                        $fancy_result.html("<h4>نام وارد شده صحیح نیست!</h4>");
                        $fancy_btn.html("<button type='button' class='btn btn-danger'>بازگشت</button>");
                        $('#user_name').addClass('input-color-red');
                    } else if (respo == 4000) {
                        $fancy_result.html("<h4>نام خانوادگی وارد شده صحیح نیست!</h4>");
                        $fancy_btn.html("<button type='button' class='color:red btn btn-danger'>بازگشت</button>");
                        $('#family').addClass('input-color-red');
                    } else if (respo == 5000) {
                        $fancy_result.html("<h4>فرمت ایمیل وارد شده صحیح نیست!</h4>");
                        $fancy_btn.html("<button type='button' class='border-color:red btn btn-warning'>بازگشت</button>");
                        $('#email').addClass('input-color-red');
                    } else if (respo == 6000) {
                        $fancy_result.html("<h4>فرمت شماره همراه وارد شده صحیح نیست!</h4>");
                        $fancy_btn.html("<button type='button' class='border-color:red btn btn-danger'>بازگشت</button>");
                        $('#phone').addClass('input-color-red');
                    } else if (respo == 1000) {
                        $fancy_result.html("<h4>اطلاعات با موفقیت ذخیره گردید</h4>");
                        $fancy_btn.html("<button type='button' class='border-color:red btn btn-primary'>بازگشت</button>");
                        $fancy_btn.click(function () {
                            window.location.reload();
                        });
                    } else if (respo == 1062) {
                        $fancy_result.html("<h4>ایمیل وارد شده تکراری می باشد!</h4>");
                        $fancy_btn.html("<button type='button' class='border-color:red btn btn-warning'>تغییر ایمیل</button>");
                        $('#email').addClass('input-color-red');
                    } else {
                        $fancy_result.html("<h4>اطلاعات به درستی ذخیره نشد! لطفا دوباره تلاش کنید!</h4>");
                        $fancy_btn.html("<button type='button' class='border-color:red btn btn-danger'>بازگشت</button>");
                    }
                }
            });
            $fancy_btn.click(function () {
                $('#fancy_back').removeClass(' fancy');
                $('#fancybox').removeClass(' myjavacss');
            });
        }
        return false;
    });


    $('#login-input').click(function () {
        $('#message').addClass('animated zoomOutUp delay-1s');
        // $('#try').addClass('animated fadeOutDown');
        // $('#error').hide();
        // $('#try').hide();
        // $('#error-holder').animate({height: '0px'}, 1000);
    });
    $('#login-password').click(function () {
        // $('#message').animate({height: '80px'}, 1000);
        // $('#greeting').html("<h5 class='animated fadeInDown delay-1s'>Setareh Vanak Travel Agency</h5>");

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++Make a element with jquery

        // $('#error-holder').append(
        //     $('<p>')
        //         .attr("id", "greeting")
        //         .addClass("animated fadeInDown delay-1s")
        //         .append("</p>")
        //         .text("hello world")
        // );
    });




});