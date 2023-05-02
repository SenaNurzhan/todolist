<hr><div class="page-title">
    <h1>P R O F I L E</h1>
</div><hr>

<div class="profile-wrapper">
    <div class="profile-form">
        <div class="profile-items">
        <?php
            $id = $_SESSION['user']['id'];
            $query = $connection->query("SELECT * FROM users WHERE id = $id");
            if($row=$query->fetch_object()){
                echo "<h1>"." ".$row->name." ".$row->surname."</h1>";
                echo "<h4> <label>Age :</label> "." ".$row->age."</h4>";
                echo "<h4> <label>Login :</label> "." ".$row->login."</h4>";
                echo "<h4> <label>Email:</label> "." ".$row->email."</h4>";
                if($row->active != 0){
                    echo "<h4> <label>Status :</label> "." "."ACTIVE ACCOUNT"."</h4>";
                }else{
                    echo "<h4> <label>Status :</label> "." "."DEACTIVED"."</h4>";
                }
            }
        ?>
        </div>
        <div class="profile-ava">
        <?php
            $image_id = "assets/img/avatar.jpg";

            $query_ava = $connection->query("SELECT * FROM avatar WHERE user_id = $id AND active = 1");
            if($row_ava=$query_ava->fetch_object()){
                echo '<img src="assets/img/'.$row_ava->url.'".jpg" alt="main_ava" class="mainAva">';
            }else{
                echo "<img src='$image_id' alt='main_ava' class='mainAva'>";
            }     
        ?>
        </div>
    </div>

    <hr><div class="page-title">
        <h1>C H A N G E &nbsp;&nbsp; A V A T A R</h1>
    </div><hr>
    <div class="upload-ava">
        <form action="?act=post_pic" method="post" enctype="multipart/form-data">
            <h4>Select image :</h4>
            <label for="fileToUpload">
                <i class='fas fa-sync-alt'></i>
                Click here to select
                <input type="file" name="picUpload" id="fileToUpload">           
             </label>
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
</div>


