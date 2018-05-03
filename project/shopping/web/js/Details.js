
$(function () {
$('#addtochart').click(function () {
        $.ajax({
            url: 'Addtochart.php',
            type: 'post',
            data: {productidtochart: $(this).attr("id")},
            success: function (response) {
               
                if (response.success == true) {
                  
                  alert("hello");
                  console.log("hello");
                  console.log($(this).attr("id"));
                  
                }
            }
        });
});
});
