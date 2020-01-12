window.onload = init;
    var $output = document.getElementById('output');
    var $deput = document.getElementById('deput');

    function init() {
        loadjson('GET', "http://localhost/crm/mysql.php?count&yesterday");

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
        }

}
