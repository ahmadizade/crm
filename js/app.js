window.onload = init;
var $output = document.getElementById('output');
var $saveas = document.getElementById('saveas');
var $result_box = document.getElementById('result_box');
var $result_click = document.getElementById('result_click');


function init() {
    loadjson('GET', "http://localhost/crm/mysql.php?count");

    function loadjson(m, u) {
        var xhr = new XMLHttpRequest;
        xhr.open(m, u);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                build(JSON.parse(xhr.response));
            }
        }
        xhr.send();
    }
    function build(res) {
        $output.innerText = res;
    }

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

};