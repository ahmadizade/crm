window.onload = init;
var $output = document.getElementById('output');
var $deput = document.getElementById('deput');
var $emput = document.getElementById('emput');

function init() {
    loadjson('GET', "http://localhost/crm/php/mysql.php?count&yesterday&today");

    function loadjson(m, u) {
        xhr = new XMLHttpRequest;
        xhr.open(m, u);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                build(JSON.parse(xhr.response));
            }
        }
        xhr.send();
    }

    function build(res) {
        $output.innerText = res[0];
        $deput.innerText = res[1];
        $emput.innerText = res[2];
    }

    var submit = document.getElementById('submit');
    submit.addEventListener("click", function () {
        var fancybox = document.getElementById("fancybox");
        var rate0 = document.getElementById("rate0").checked;
        var rate1 = document.getElementById("rate1").checked;
        var rate2 = document.getElementById("rate2").checked;
        var user_name = document.getElementById("user_name").value;
        var family = document.getElementById("family").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var save = document.getElementById("save");
        var $fancy_btn = document.getElementById("fancy_btn");
        var $fancy_result = document.getElementById('fancy_result');
        var fancy_back = document.getElementById('fancy_back');

        if (rate0 == true) {
            var rate = rate0 = document.getElementById("rate0").value;
            //console.log(rate);
        } else if (rate1 == true) {
            rate = rate1 = document.getElementById("rate1").value;
            ;
            //console.log(rate);
        } else {
            rate = rate2 = document.getElementById("rate2").value;
            //console.log(rate);
        }


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
                    } else if (respo == 4000) {
                        $fancy_result.innerHTML = "<h4>!نام خانوادگی وارد شده صحیح نیست</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='btn btn-danger'>بازگشت</button>"
                    }
                    else if (respo == 5000) {
                        $fancy_result.innerHTML = "<h4>!فرمت ایمیل وارد شده صحیح نیست</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='btn btn-danger'>بازگشت</button>"
                    }
                    else if (respo == 6000) {
                        $fancy_result.innerHTML = "<h4>!شماره همراه وارد شده صحیح نیست</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='btn btn-danger'>بازگشت</button>"
                    }
                    else if (respo == 1000) {
                        $fancy_result.innerHTML = "<h4>اطلاعات با موفقیت ذخیره گردید</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='btn btn-primary'>بازگشت</button>"
                    } else if (respo == 1062) {
                        $fancy_result.innerHTML = "<h4>!ایمیل وارد شده تکراری می باشد</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='btn btn-warning'>تغییر ایمیل</button>"
                    } else {
                        $fancy_result.innerHTML = "<h4>اطلاعات به درستی ذخیره نشد! لطفا دوباره تلاش کنید</h4>";
                        $fancy_btn.innerHTML = "<button type='button' class='btn btn-danger'>بازگشت</button>"
                    }
                }
            });
        }
        return false;
    });

}
