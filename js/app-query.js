$(document).ready(function(){
    $("#result_click").click(function(){
        $.ajax({url: "http://localhost/crm/mysql.php?count", success: function(result){
                $("#result_box").html(result);
            }});
    });
});