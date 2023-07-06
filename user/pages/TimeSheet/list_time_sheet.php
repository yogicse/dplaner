<div class="card shadow mb-4">
    <div class="card-body">
        <form name="search" method="POST">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>
                            <lable for="month"><b>Month</b></label>
                        </td>
                        <td>
                            <lable for="date"><b>Year</b></label>
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
                                                $allmonth = date("F",mktime(0,0,0,$i,1,date("Y"))) ?>
                                                <option value="<?php echo $i; ?>"
                                                <?php
                                                if($curmonth==$allmonth)
                                                    echo "selected";
                                                ?> 
                                                ><?php echo $allmonth;?></option> 
                                <?php } ?>
                                    </select>
                            </td>
                            <td>
                                <?php $curyear = date("Y");?>
                                    <select class="form-control form-select-lg" name="year" id="year">
                                <?php
                                    for($i=2023;$i<=2030;$i++)
                                        {  ?>
                                            <option value="<?php echo($i);?>">
                                        <?php echo($i);?> </option>
                                <?php }?>
                                    </select>
                            </td>
                            <td>
                                <input  class="btn btn-primary" type="submit" name="submit" value="Search">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
 <!-- Databse Query -->
<?php
    //cal_days_in_month(Calendar,Month,Year) function to return number of days from month 
if(isset($_POST['month']) && isset($_POST['year']))
    {   
            $startDate=$_POST['year']."/".$_POST['month']."/"."1";
            $to_dt=$_POST['year']."/".$_POST['month']."/".cal_days_in_month(CAL_GREGORIAN,$_POST['month'],$_POST['year']);
            $query="select * from time_sheet_detail where time_sheet_date  BETWEEN '$startDate' AND '$to_dt'
                GROUP BY time_sheet_date ORDER BY time_sheet_date DESC;";
    }
else
    {
            $query="select * from time_sheet_detail GROUP BY time_sheet_date ORDER BY time_sheet_date DESC;";
    }
        
         $data = mysqli_query($connection, $query);
         $result = mysqli_num_rows($data);

?>
<!---Details Form -->
<div class="card-body">
        <form>
                <h2 class="text-left">Daily Task Details</h2>


                <div class="table-responsive">
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
                            <td style="background-color:#ba91e5; font-size: 20px;" colspan="5"><?php echo $row['time_sheet_date']; 
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
                </div>
            </form>
        </div>