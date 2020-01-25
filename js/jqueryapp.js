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




    // var settings = {
    //     "async": true,
    //     "crossDomain": true,
    //     "url": "https://hotels4.p.rapidapi.com/locations/search?locale=en_US&query=new%20york",
    //     "method": "GET",
    //     "headers": {
    //         "x-rapidapi-host": "hotels4.p.rapidapi.com",
    //         "x-rapidapi-key": "aee77541camshd1b9e4eabf15742p11fc54jsnfc6ab8658a57"
    //     }
    // }
    //
    // $.ajax(settings).done(function (response) {
    //     console.log(response);
    // });


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++WEATHER

    //
    // $("#submit2").click(function (e) {
    //     var validate = Validate();
    //     $("#message").html(validate);
    //     if (validate.length == 0) {
    //         $.ajax({
    //             type: "POST",
    //             url: "http://api.openweathermap.org/data/2.5/weather"+ '?q=' + $("#citySelect").val() +"&appid=ff1bd27fe322bd198e286397916a7efd",
    //             dataType: "json",
    //             success: function (result, status, error) {
    //                 var table = $("<table><tr><th>Weather Description</th></tr>");
    //                 table.append("<tr><td>City:</td><td>" + result["name"] + "</td></tr>");
    //                 table.append("<tr><td>Country:</td><td>" + result["sys"]["country"] + "</td></tr>");
    //                 table.append("<tr><td>Current Temperature:</td><td>" + result["main"]["temp"] + "°C</td></tr>");
    //                 table.append("<tr><td>Humidity:</td><td>" + result["main"]["humidity"] + "</td></tr>");
    //                 table.append("<tr><td>Weather:</td><td>" + result["weather"][0]["description"] + "</td></tr>");
    //
    //                 $("#message").html(table);
    //             },
    //             error: function (xhr, status, error) {
    //                 console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText)
    //             }
    //         });
    //     }
    // });
    //
    // $(document).ajaxStart(function () {
    //     $("img").show();
    // });
    //
    // $(document).ajaxStop(function () {
    //     $("img").hide();
    // });
    //
    // function Validate() {
    //     var errorMessage = "";
    //     if ($("#citySelect").val() == "Select") {
    //         errorMessage += "► Select City";
    //     }
    //     return errorMessage;
    // }

    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++WEATHER





    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++SANGAPOUR HOTEL





    var settings = {
        "async": true,
        "crossDomain": true,
        "url": "http://engine.hotellook.com/api/v2/cache.json/api/v2/cache.json?location='+ "$city" +'&hotelId=277083&checkIn=2017-09-13&checkOut=2017-09-18&currency=rub&limit=1&token=PasteYourTokenHere\n",
        "method": "GET",
        "headers": {
            "x-rapidapi-host": "leejaew-hotels-in-singapore-v1.p.rapidapi.com",
            "x-rapidapi-key": "aee77541camshd1b9e4eabf15742p11fc54jsnfc6ab8658a57"
        }
    }

    $.ajax(settings).done(function (response) {
        console.log(response);
    });


    // ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++SANGAPOUR HOTEL





});




