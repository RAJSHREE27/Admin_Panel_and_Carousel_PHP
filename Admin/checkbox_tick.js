$(document).on("click", "#gridCheck", function () {

   var row = $(this).closest("tr")[0];
   var id = row.cells[0].innerHTML;
    
    var active = $(this).is(':Checked');
    //alert(" == " + active);

    $.ajax({
            url: "update_active.php",
            type: "POST",
            data: { id: id , active: active},
            success: function (data, status, xhr){
                alert("successfully updated");
                //window.location=index.php;
                
            } ,
            error: function (jqXhr, textStatus, errorMessage) {
                    alert("updation failed");
                    //make that as it is
            }
            
        });
});
