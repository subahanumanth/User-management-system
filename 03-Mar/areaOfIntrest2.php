<?php
$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
$query = "select * from area_of_intrest";
$row = mysqli_query($connection, $query);
if(mysqli_num_rows($row) > 0) {
             echo "<html><select id='areaOfIntrest' name='areaOfIntrest[]' multiple><option value=''>select</option>";
    while($rows = mysqli_fetch_assoc($row)) {

         ?>
        <option value="<?php echo $rows['area_of_intrest']; ?>" <?php for($i=0;$i<count($areaOfIntrest3);$i++) {if($areaOfIntrest3[$i] == $rows['area_of_intrest']) {echo "selected";} } ?>><?php echo $rows['area_of_intrest']; ?></option>
    <?php

    }
     echo "</select></html>";
}
mysqli_close($connection);
?>





