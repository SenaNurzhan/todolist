<?php
include "controller.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Php project" />
        <meta name="author" content="Sena" />
        <title>Project</title>
        <link href="assets/style/all.css" rel="stylesheet" />
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <?php
                if($online){
                    include "assets/api/list/navbar.php";
                }
            ?>
            <div id="page-content-wrapper">
            <?php 
                if($online){
                    include "assets/api/list/head-menu.php";
                }
            ?>             
                <!-- Page content-->
                <div class="container-fluid">
                    <?php
                        if($online == true){
                            include "assets/api/pages/".$page.".php";
                        }else if($online == false){ 
                            include "assets/api/auth/".$page.".php";
                        }
                    ?>
                </div>
            </div>
        </div>
        
        <script src="assets/js/scripts.js"></script>
        <script ></script>
    </body>
</html>
