
    <html>
    <head><title>HELP LINES</title></head>
    <body>
    
    <div class="container">
        
        <p><h1><p style="color:green">Looking for <i>Hospital Emergency Lines? </i></p>
        
       <form action="help Lines.php" method="post">
        <!--- <label for="search">hospital name</label>
        <select name="names" id="search">
        <option value="name">Al-Radi</option>
        <option value="name">BIRDEM</option>
        <option value="name">Chittagong Medical</option>
        <option value="name">Dhaka Medical</option>
        <option value="name">Ibnesina Hospital</option>
        <option value="name">LabaidHospitals</option>
        <option value="name">Pabna Medical</option>
        <option value="name">Square Hospitals</option>
        <option value="name">Sylet Medical</option>
        </select>--->
        <input type="text" name="search" placeholder="Type hospital name">
        <input type="text" name="district" placeholder="Type district name">
        <input type="submit" name="a"value="search"/>  
        </form>
        </div>
        
        
<?php
$conn= mysqli_connect("localhost","root",""); 
$database= mysqli_select_db($conn,'medica');
     
     if(isset($_POST['a'])) {
         $search=$_POST['search'];
         $t=$_POST['district'];
                if($t==NULL){
                $sqlo= "SELECT * FROM hospital WHERE hospital_name LIKE '%$search%' ";
         
         
                $query_run=(mysqli_query($conn,$sqlo));

                   if($query_run->num_rows >0){
                        while($result=mysqli_fetch_array($query_run)){
                    ?>
                    <form action="firstaid.php" method="post">
                    <input type="text" name="search" placeholder="name" value="<?php echo "name: ".$result['hospital_name'] ?>"size=25>
                    <input type="text" name="search" placeholder="name" value="<?php echo "number: ".$result['contact_number'] ?>"size=15>
                    <input type="text" name="search" placeholder="name" value="<?php echo "location: ".$result['street_no']." ".$result['thana']." - ".$result['postal_code']." ".$result['district'] ?>"size=30>
                </form>

                    <?php
                    
                }
                
            }
                else {
                    echo "0 results found";}
                }


                else if($search==NULL){
                    $sqlu= "SELECT * FROM hospital WHERE district LIKE '$t' ";
                    
                    
                    $query_run=(mysqli_query($conn,$sqlu));
           
                    if($query_run->num_rows >0){
                           while($result=mysqli_fetch_array($query_run)){
                               ?>
                               <form action="firstaid.php" method="post">
                               <input type="text" name="search" placeholder="name" value="<?php echo "name: ".$result['hospital_name'] ?>"size=25>
                               <input type="text" name="search" placeholder="name" value="<?php echo "number: ".$result['contact_number'] ?>"size=15>
                               <input type="text" name="search" placeholder="name" value="<?php echo "location: ".$result['street_no']." ".$result['thana']." - ".$result['postal_code']." ".$result['district'] ?>"size=30>
                           </form>
           
                               <?php
                               
                           }
                           
                       }
                           else {
                               echo "0 results found";}
                           }

                           else{
                            $sqlw= "SELECT * FROM hospital WHERE hospital_name LIKE '$search$' AND district LIKE '$t' ";
                            
                            
                            $query_run=(mysqli_query($conn,$sqlw));
                   
                            if($query_run->num_rows >0){
                                   while($result=mysqli_fetch_array($query_run)){
                                       ?>
                                       <form action="firstaid.php" method="post">
                                       <input type="text" name="search" placeholder="name" value="<?php echo "NAME: ".$result['hospital_name'] ?>"size=25>
                                       <input type="text" name="search" placeholder="name" value="<?php echo "HOTLINE: ".$result['contact_number'] ?>"size=15>
                                       <input type="text" name="search" placeholder="name" value="<?php echo "LOCATION: ".$result['street_no']." ".$result['thana']." - ".$result['postal_code']." ".$result['district'] ?>"size=30>
                                   </form>
                   
                                       <?php
                                       
                                   }
                                   
                               }
                                   else {
                                       echo "0 results found";}
                                   }
                                       
                    

            }
            
            
        


?>
</body>
</html>