<?php
         $query="select * from time_sheet_detail GROUP BY time_sheet_date ORDER BY time_sheet_date DESC;";
        
         $data = mysqli_query($connection, $query);
            $result = mysqli_num_rows($data);

?>
<form>
<table class="table table-bordered table-hover">
<tr>
        <td>
            <lable for="month">Month</label>
</td>
<td>
<lable for="date">Date</label>
</td>
<td>

</td>
</tr>
    <tr>
        <td>
        <?php $curmonth = date("F");?>
        <select class="form-control form-select-lg" name="month" id="month">
            <?php
for($i = 1 ; $i <= 12; $i++)
{
$allmonth = date("F",mktime(0,0,0,$i,1,date("Y")))
?>
            <option value="<?php echo $i; ?>"
<?php
if($allmonth==$curmonth)
{
  echo ' selected';
}
?>     
>
<?php
echo $allmonth;
}
?>
</option> 
        </select>
</td>
<td>
<?php $curyear = date("Y");?>
    <select class="form-control form-select-lg" name="year" id="year">
    <?php
        for($i=2023;$i<=2025;$i++)
            {
            ?>
            <option value="<?php echo($i);?>"
            <!-- <?php if($year==$i)
{
  echo ' selected';
}
?>  -->
 
            <?php echo($i);?>
            </option>
            <?php }?>
    </select>
</td>
<td>
<input  class="btn btn-primary" type="submit" name="submit" value="Search">
</td>
</tr>
</table>
</form>
<form>
        <h2 class="text-left">Daily Task Details</h2>


        
            <table class="table table-bordered table-hover">

                    <thead style="text-color:orange">
                            <tr>
                                <th style="background-color:black; color:white">Id</th>
                                <th style="background-color:black; color:white">Project</th> 
                                <th style="background-color:black; color:white">Working Hours</th>  
                                <th style="background-color:black; color:white">Summary</th>
                                <th style="background-color:black; color:white">Action</th>
                            </tr>
                    </thead>
                <tbody>
                        <?php

                         if($result > 0){
                            while($row = mysqli_fetch_array($data)){
                                
                        ?>
                        <tr>
                            <td style="background-color:#f0bf2b; font-size: 20px;" colspan="5"><?php echo $row['time_sheet_date']; 
                            $date = $row['time_sheet_date']; 
                            
                            ?></td>
                            </tr>
                            <?php
                                
                                $query1="select * from time_sheet_detail where time_sheet_date= '$date'";
                                
                                $data1 = mysqli_query($connection, $query1);
                                $result1 = mysqli_num_rows($data1);
                                if($result1 > 0){

                                    while($row1 = mysqli_fetch_array($data1)){
                                        
                            ?>
                        <tr>
                            <td><?php echo $row1['id']; ?></td>
                            <td><?php echo $row1['project']; ?></td>
                            <td><?php echo $row1['work_hours'].":".$row1['work_minutes'];?></td>
                            <td><?php echo $row1['task_details']; ?></td>
                            <td><a href='/user/time_sheet.php?id=<?=$row1['id']?>&source=delete_time_sheet'><?=delete_icon()?></a></td>
                        </tr>
                        <?php }?>
        <?php
       

                            }else{
                        ?>
                <tr>
                    <td>No Record Found</td>
                </tr>
            <?php
                            }
                        } 
                    }
    ?>



</table>
    </form>