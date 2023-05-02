<!-- Sidebar-->
<div class="border-end" id="sidebar-wrapper">
    <div class="sidebar-heading">
    <?php
        $id = $_SESSION['user']['id'];
        $query = $connection->query("SELECT * FROM users WHERE id = $id");
            if($row=$query->fetch_object()){
                $us_name = $row->name;
                $us_surname = $row->surname;
            }
        $image_id = "assets/img/avatar.jpg";
        $query_ava = $connection->query("SELECT * FROM avatar WHERE 
                                        user_id = $id AND active = 1");
        if($row_ava=$query_ava->fetch_object()){
            echo '<img src="assets/img/'.$row_ava->url.'".jpg" alt="main_ava" class="img-fluid rounded-circle">';
        }else{
            echo "<img src='$image_id' alt='main_ava' class='img-fluid rounded-circle'>";
        }     
    ?>
        <h1><a href="?act=main">
        <?php
           echo "$us_name" ."&nbsp;&nbsp". "$us_surname"; 
        ?>
        </a></h1>

    </div>
    <div class="list-group list-group-flush">
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="?page=profile">Profile</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="?page=lists">To do list</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="?page=settings">Settings</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="?act=deac">Deactive</a>
        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="?act=logout">Logout</a>
    </div>
</div>