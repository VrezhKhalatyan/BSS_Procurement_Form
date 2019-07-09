<?php
    $con = mysqli_connect('localhost', 'root', '','procurement');
    $output = '';
    $query = ' ';
    if(isset($_POST["query"]))
    {
        $search = mysqli_real_escape_string($con, $_POST["query"]);
        $query = "SELECT * FROM product
        WHERE  ID  LIKE '%".$search."%'
        OR ProductDescription LIKE '%".$search."%' 
        OR Qty LIKE '%".$search."%' 
        OR UnitCost LIKE '%".$search."%' 
        OR TotalCost LIKE '%".$search."%' 
        ";
         $result = mysqli_query($con, $query);
         if(mysqli_num_rows($result) > 0)
         {
             $output .= '
             <div class="table-responsive">
                 <table class="table table bordered">
                     <tr>
                         <th>ID</th>
                         <th>Product Description</th>
                         <th>Qty</th>
                         <th>Unit Cost</th>
                         <th>Total Cost</th>
                     </tr>';
                     while($row1 = mysqli_fetch_array($result))
                     {
                             $output .= '
                         <tr class="clickable-row">
                             <td id="d1">'.$row1["ID"].'</td>
                             <td>'.$row1["ProductDescription"].'</td>
                             <td>'.$row1["Qty"].'</td>
                             <td>'.$row1["UnitCost"].'</td>
                             <td>'.$row1["TotalCost"].'</td>
                         </tr class="clickable-row">
                         ';
                     }
                     echo $output;
         }
         else
         {
             echo 'Record Not Found';
         }
    }
        else
        {
            $query = "SELECT * FROM product";
        }
       
?>
<script>
    jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        // window.location = $(this).data("href");
        //add to table
        var res = document.getElementById("d1")[0].value
        alert(res);
    });
});
</script>