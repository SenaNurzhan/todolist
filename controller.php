<?php
include "assets/config/db.php";

$page = "login";

$login = "";

$password = "";

$online = false;

session_start();

if(isset($_GET['page'])){
    if($_GET['page'] == "login"){
        $_SESSION['page'] = $page;
        $page = "login";
    }else if($_GET['page'] == "register"){
        $_SESSION['page'] = $page;
        $page = "register";
    }
}

if(isset($_SESSION['user'])){ 
    $user = $_SESSION['user']; 
    $add = "SELECT * FROM users WHERE id =\"".$user['id']."\" AND password =\"".$user['password']."\""; 
    $queryy = $connection->query($add); 
    if($row = $queryy->fetch_array()){
        $_SESSION['user'] = $row;   // $_SESSION['user']['id']     $_SESSION['user']['login'];
        $page = "profile";
        $online = true;
    }
}
if($online){
    if(isset($_GET['page']) ){
        if( $_GET['page'] == "profile" ){
            $page = "profile";
        }else if($_GET['page'] == "settings"){
            $page = "settings";
        }else if($_GET['page'] == "lists"){
            $page = "todoList";
        }else if($_GET['page'] == "edit-form"){
            $page = "edit-form";
        }
    }

    if(isset($_GET['act']) ){
        if($_GET['act'] == "post_pic"){
            $user_id = $_SESSION['user']['id'];
            // Check if the user already has an active avatar
            $query_ava = $connection->query("SELECT * FROM avatar WHERE user_id = $user_id AND active = 1");
            if($row_ava = $query_ava->fetch_object()) {
                // If yes, deactivate the old avatar
                $old_ava_id = $row_ava->id;
                $connection->query("UPDATE avatar SET active = 0 WHERE id = $old_ava_id");
            }
        
            if(isset($_FILES['picUpload']['tmp_name'])) {
                $temp_file = $_FILES['picUpload'];
                $file_name = sha1(rand(0,1500)).".jpg";
    
                move_uploaded_file($_FILES['picUpload']['tmp_name'],"assets/img/$file_name");
    
                // Insert the new avatar into the database
                $connection->query("INSERT INTO avatar(id,user_id,url,active)
                                    VALUES(NULL,\"$user_id\",\"$file_name\",1)");
            }

            $page = "todolist";

        }else if($_GET['act'] == "edit"){

            $_id = $_SESSION['user']['id'];
            $query = $connection->query("SELECT * FROM users WHERE id = $_id");
            if($row=$query->fetch_object()){
                $login = $_POST['login'];
                $password = sha1($_POST['password']);
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $age = $_POST['age'];
                $email = $_POST['email'];

                $query = $connection->query("UPDATE users SET login = \"$login\", password = \"$password\",
                name = \"$name\",surname = \"$surname\",age = \"$age\",email = \"$email\" WHERE id = $_id ");
            }

        }else if($_GET['act'] == "addForm"){

            $user_id = $_SESSION['user']['id'];

			$title = $_POST['title'];
			$description = $_POST['description'];
            $type = $_POST['type'];
			$priority = $_POST['priority_id'];
            
            $query_type = $connection->query("SELECT * FROM type WHERE type = '$type'");
            if($rowType=$query_type->fetch_object()){
                $type_id = $rowType->id;
            }

            $query_prio = $connection->query("SELECT * FROM priority WHERE priority = '$priority'");
            if($rowPrio=$query_prio->fetch_object()){
                $priority_id = $rowPrio->id;
            }

            $connection->query("INSERT INTO tasks(id,user_id,title,description,date_created,status,type_id,priority_id,active)
            VALUES(NULL,\"$user_id\",\"$title\",\"$description\",NOW(),1,\"$type_id\",\"$priority_id\",1)");

            $page = "todolist";

        }else if($_GET['act'] == "edTask"){

            $page = "edit-form";
            
        }else if($_GET['act'] == "cancl"){

            $page = "todolist";
            
        }else if($_GET['act'] == "editForm"){

            $_id = $_SESSION['user']['id'];
            $task_id = $_POST['task_id'];
            $query = $connection->query("SELECT * FROM tasks WHERE id = $task_id");
            if($row=$query->fetch_object()){
                $user_id = $_SESSION['user']['id'];

                $title = $_POST['title'];
                $description = $_POST['description'];
                $type = $_POST['type'];
                $priority = $_POST['priority_id'];

                $query_type = $connection->query("SELECT * FROM type WHERE type = '$type'");
                if($rowType=$query_type->fetch_object()){
                    $type_id = $rowType->id;
                }

                $query_prio = $connection->query("SELECT * FROM priority WHERE priority = '$priority'");
                if($rowPrio=$query_prio->fetch_object()){
                    $priority_id = $rowPrio->id;
                }

                $connection->query("UPDATE tasks SET user_id = \"$_id\", title = \"$title\", description = \"$description\",
                type_id = \"$type_id\", priority_id = \"$priority_id\", status = 1, active = 1 WHERE id = $task_id");
            }

            $page = "todolist";
            
        }else if($_GET['act'] == "delTask"){

            $_id = $_SESSION['user']['id'];
            $t_id = $_GET['id'];
            $upd = $connection->query("UPDATE tasks SET active = 0 WHERE user_id = $_id AND id = $t_id");
            $page = "todolist";

        }else if($_GET['act'] == "doneTask"){

            $_id = $_SESSION['user']['id'];
            $task_id = $_POST['task_id'];
            $upd = $connection->query("UPDATE tasks SET status = 0 WHERE user_id = $_id AND id = $task_id");
            $page = "todolist";

        }else if($_GET['act'] == "logout"){

            $online = false;
            Unset($_SESSION['user']);
            $page = "login";

        }else if($_GET['act'] == "deac"){

            $user_id = $_SESSION['user']['id'];
            $deactive = $connection->query("UPDATE users SET active = 0 WHERE id = $user_id ");

            $online = false;
            $page = "login";

        }else if($_GET['act'] == 'main'){

            $page = "profile";

        }
    }    
}else{
    if(isset($_GET['act'])){
        if($_GET['act'] == 'login'){
            
            $login = $_POST['login'];
            $password = sha1($_POST['password']);
            $query = $connection->query("SELECT id,login,password FROM users 
            WHERE login = \"$login\" AND password = \"$password\" AND active = 1 ");

            if($row = $query->fetch_array() ){
                $_SESSION['user'] = $row;   // $_SESSION['user']['id']     $_SESSION['user']['login'];
                $page = "profile";
                $online = true;
            }else{
                $page = "login";
                $online = false;
            }

        }else if($_GET['act'] == 'register') {

            $login = $_POST['login'];
            $password = sha1($_POST['password']);
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $age = $_POST['age'];
            $email = $_POST['email'];

            $connection->query("INSERT INTO users(id,name,surname,age,login,email,password,active)
                                VALUES(NULL,\"$name\",\"$surname\",\"$age\",\"$login\",\"$email\",\"$password\",1)");

        }if($_GET['act'] == 'regis'){

            $page = "registration";
           
        }else if($_GET['act'] == "goback"){

            $page = "login";

        }
    }                
}

?>