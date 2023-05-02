<div class="oldInfo-wrapper" id="showinfomodal">
    <div class="oldInfo-form">
        <div class="oldInfo-form-items">
            <?php
                $id = $_SESSION['user']['id'];
                                
                $query = $connection->query("SELECT * FROM users WHERE id = $id");
                if($row=$query->fetch_object()){

                    echo "<label><h5>N A M E:</h5></label> "." ".$row->name."<br>";	
                    echo "<label><h5>S U R N A M E:</h5></label> "." ".$row->surname."<br>";	
                    echo "<label><h5>A G E:</h5></label> "." ".$row->age."<br>";	
                    echo "<label><h5>L O G I N:</h5></label> "." ".$row->login."<br>";
                    echo "<label><h5>E M A I L:</h5></label> "." ".$row->email."<br>";
                                            
                }
            ?>
        </div>
        <button id="oldInfo-cls" class="oldInfo-cls"> Close me </button>
    </div>
</div>