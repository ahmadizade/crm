window.onload = init;
var $output = document.getElementById('output');
var $deput = document.getElementById('deput');
var $emput = document.getElementById('emput');

function init() {
    loadjson('GET', "http://localhost/crm/mysql.php?count&yesterday&today");

    function loadjson(m,u){
        xhr = new XMLHttpRequest;
        xhr.open(m,u);
        xhr.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                build(JSON.parse(xhr.response));
            }
        }
        xhr.send();
    }
    function  build(res) {
        $output.innerText = res[0];
        $deput.innerText = res[1];
        $emput.innerText = res[2];
    }





}
