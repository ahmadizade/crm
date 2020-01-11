window.onload = init;
var $output = document.getElementById('output');
var $saveas = document.getElementById('saveas');
var $resget = document.getElementById('resget');


function init() {
    loadjson('GET', "http://localhost/crm/mysql.php?count");

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
        $output.innerText = res;

        $saveas.addEventListener("click" , function (){
            xhr = new XMLHttpRequest;
            xhr.open('GET', "http://localhost/crm/mysql.php?show");
            xhr.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    $resget.innerText = JSON.parse(xhr.response);
                }
            }
            xhr.send();

        })
    }



}

