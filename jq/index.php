<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" language="javascript">

    $("#btn").live("click", function () {


        var fname = $("#fname").val();
        var lname = $("#lname").val();

        $.ajax({

            type: "POST",
            url: "demo.php",
            data: "fname=" + fname + '&lname=' + lname,
            success: function (data) {
                alert(data);
            }

        });

    });

</script>

First name: <input type="text" name="fname" id="fname"><br>
Last name: <input type="text" name="lname" id="lname"><br>
<input type="button" value="Submit" id="btn">