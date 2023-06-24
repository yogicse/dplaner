    <!-- insert query -->
    <?php
        if(!isset($_SESSION['username'])){ 
                header('location:../login.php');
        }
        $uid = $_SESSION['id'];


    if(isset($_POST['submit'])){
        
        // $uid = mysqli_real_escape_string($con , $_POST['user_id']);
                $project = mysqli_real_escape_string($connection , $_POST['projects']);
                $hours = mysqli_real_escape_string($connection , $_POST['hours']);
                $minutes = mysqli_real_escape_string($connection , $_POST['minutes']);
                $details = mysqli_real_escape_string($connection , $_POST['details']);
                $date = mysqli_real_escape_string($connection , $_POST['sheet_date']);

                $query = "INSERT INTO time_sheet_detail (user_id, project,work_hours,work_minutes,task_details,time_sheet_date) 
                VALUE ('$uid', '$project', '$hours','$minutes','$details','$date')";
                
                $data = mysqli_query($connection, $query);
       if($data){
        ?>
                <script type = "text/javascript">
                        alert ("Data save succesfully");
                </script>
        <?php
      }else{
        ?>
                <script type = "text/javascript">
                        alert ("No record found please try again");
                </script>
        <?php
    }


    }
    
    
    
    ?>




        <form action="" method="post" >
                <table class="table table-borderless">
                        <tr>
                                <td colspan="2"><h3>Add Hours</h3></td>
                        </tr>
                        <tr class="table-primary">
                                <td colspan="2">Projects</td>
                        </tr>
                        <tr>
                                        <td colspan="2">
                                                <select class="form-control form-select-lg" name="projects" id="projects" required>
                                                        <option value="0">Select</option>
                                                        <option value="php">Php</option>
                                                        <option value="laravel">Laravel</option>
                                                        <option value="magento">Magento</option>
                                                        <option value="wordpress">Wordpress</option>
                                                        <option value="idle">Idle</option>
                                                </select>
                                        </td>
                        </tr>
                                <tr class="table-primary">
                                        <td colspan="2">Time Consumed</td>
                                </tr>
                        <tr>
                                <td><select class="form-control form-select-lg" name="hours" id="hours" required>
                                        <option value="0">hours</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        </select></td>
                                <td>
                                <select class="form-control form-select-lg" name="minutes" id="minutes">
                                        <option value="0">minutes</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>
                                        <option value="12">12</option>
                                        </select>
                                </td>
                        </tr>
                        <tr>
                                <td colspan="2">Task Details</td>
                        </tr>
                        <tr>
                                <td colspan="2">
                                <textarea type="date" id="exampleFormControlTextarea1" rows="4" class="form-control" name="details" 
                                placeholder="Enter your task details....." required></textarea>
                                </td>
                        </tr>
                        <tr>
                                <td colspan="2">
                                Date
                                </td>
                        </tr>
                        <tr>
                                <td colspan="2">
                                <input type="date" class="form-control" name="sheet_date" required>
                                </td>
                        </tr>
                        <tr>
                                <td colspan="2" style="text-align: center;">
                                <input class="btn btn-success"  type="submit" class="form-control" name="submit" value="Submit" required>
                                <a class="btn btn-danger" href="add_time_sheet.php">Cancel</a>
                                </td>
                        </tr>
                </table>
        </form>