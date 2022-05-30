<?php
include("layout/uheader.php");
?>
<!DOCTYPE html>
<html>
<head>
<script>
$(function(){
    $(document).on("click",".transfer", function(){
        var getselectedvalues=$(".one input:checked").parents("tr").clone().appendTo($(".two tbody").add(getselectedvalues));
    })
})
</script>
    </head>
<body>
    <form action="userdetail.php" method="post">
        <label><h5>User details</h5></label>
        <input class="btn btn-success" type="submit" value="Refresh"/>
        
                    <?php
                        $conn = new mysqli("localhost","root","","myproject");
                        $data = "SELECT * FROM user, account WHERE account.user_id=user.user_id";
                        $result = $conn->query($data);
                        echo "<table border='1' id='productSizes' class='table table-dark one' ><tr class='table-success'><th>Email</th><th>Mobile</th><th>Product name</th><th>Product type</th><th>Product detail</th><th>Other messages</th><th>Date</th><th>Image</th><th>Select</th></tr>";
                        while($row = $result->fetch_assoc())
                        {
                        $x = $row['email'];
                         echo "<tr class='dtHorizontalExampleWrapper'><td>".$row['email']."</td><td>".$row['mobile']."</td><td>".$row['product_name']."</td><td>".$row['product_type']."</td><td>".$row['product_detail']."</td><td>".$row['other_messages']."</td><td>".$row['date']."</td><td>".$row['image']."</td><td><input type='radio' name='select' class='transfer' id='select'/></td></tr>";
                        }
                        echo "</table>";
                        ?>
                        
                        <h3 class="text-center"> Checked table</h3>
<table border="1"id="productSizes" class="table table-dark two">
<tr class="table-info"><th>Email</th><th>Mobile</th><th>Product name</th><th>Product type</th><th>Product detail</th><th>Other messages</th><th>Date</th><th>Image</th></tr>
</table>

    </form>
</body>
</html>
 