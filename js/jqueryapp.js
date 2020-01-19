$(document).ready(function () {
    $("#phone_company").click(function () {
        $("#mini-header-toggle").fadeToggle('slow');
    });


    var submit = $('#submit');
    $("#submit").click(function () {

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
                    fancy_back.className += ' fancy';
                    fancybox.className += ' myjavacss';
                    //console.log(respo);

                    if (respo == 3000) {
                        $fancy_result.innerHTML = "<h4>!نام وارد شده صحیح نیست</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='btn btn-danger'>بازگشت</button>"
                        $fancy_btn.addEventListener("click", function () {
                            fancybox.style.visibility = "hidden";
                            fancy_back.style.visibility = "hidden";
                            document.getElementById("user_name").className += " input-color-red";
                        });
                    } else if (respo == 4000) {
                        $fancy_result.innerHTML = "<h4>!نام خانوادگی وارد شده صحیح نیست</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='color:red btn btn-danger'>بازگشت</button>"
                    } else if (respo == 5000) {
                        $fancy_result.innerHTML = "<h4>!فرمت ایمیل وارد شده صحیح نیست</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='border-color:red btn btn-danger'>بازگشت</button>"
                    } else if (respo == 6000) {
                        $fancy_result.innerHTML = "<h4>!شماره همراه وارد شده صحیح نیست</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='border-color:red btn btn-danger'>بازگشت</button>"
                    } else if (respo == 1000) {
                        $fancy_result.innerHTML = "<h4>اطلاعات با موفقیت ذخیره گردید</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='border-color:red btn btn-primary'>بازگشت</button>"
                    } else if (respo == 1062) {
                        $fancy_result.innerHTML = "<h4>!ایمیل وارد شده تکراری می باشد</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='border-color:red btn btn-warning'>تغییر ایمیل</button>"
                    } else {
                        $fancy_result.innerHTML = "<h4>اطلاعات به درستی ذخیره نشد! لطفا دوباره تلاش کنید</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='border-color:red btn btn-danger'>بازگشت</button>"
                    }
                }
            });
        }
        return false;

    });
});
;