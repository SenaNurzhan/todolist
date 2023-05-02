<hr><div class="page-title">
    <h1>T O D O L I S T</h1>
</div><hr>

<div class="form-row">
    <?php
    $id = $_SESSION['user']['id'];
    $query = $connection->query("SELECT * FROM tasks WHERE active = 1 && user_id = $id");
    while($row=$query->fetch_object()){
        if($row->active){
            $task_user = $row->user_id;
            $task_title = $row->title;
            $task_desc = $row->description;
            $task_date = date('Y-m-d',strtotime($row->date_created));
            $task_type = $row->type_id;
            $task_priority = $row->priority_id;
        }
    ?>

<div class="form" style="border:
    <?php 
        if ($task_priority == 1) {
            echo '2px solid red';
        }
    ?>
">
    <div class="form-header">
        <h2 class="ls-titl" id="task-title"><?php echo "$task_title"; ?></h2>
        <div class="dropdown">
        <button class="dropdown-button"><i class="fa fa-ellipsis-h"></i></button>

        <ul class="dropdown-menu"> 
            <li>
                <a href="?act=edTask&id=<?php echo $row->id;?>">Edit</a>
            </li>
            <li>
                <a href="#" onclick="document.getElementById('delete-form-<?php echo $row->id; ?>').submit();">
                    Delete
                </a>
                <form id="delete-form-<?php echo $row->id; ?>" action="?act=delTask&id=<?php echo $row->id; ?>" method="POST">
                    <input type="hidden" name="del" value="<?php echo $row->id; ?>">
                </form>
            </li>
        </ul>
        </div>
    </div>
    <p class="ls-desc"id="task-desc"><?php echo " - ". "$task_desc"; ?></p>
    <div class="ls-type">
        <label for="type">Type:</label>
        <p class="ls-types"><?php 
            $query_type = $connection->query("SELECT id, type FROM type WHERE id = \"$task_type\"");
            if($row_type=$query_type->fetch_object()){
                echo "$row_type->type";
            }
        ?></p>
    </div>
    <div class="ls-prio">
        <label for="priority">Priority:</label>
        <p class="ls-prios" style="color:
            <?php 
                if ($task_priority == 1) {
                    echo 'red';
                }else if ($task_priority == 2) {
                    echo 'orange';
                }else if ($task_priority == 3) {
                    echo 'green';
                }
            ?>
        "><?php 
            $query_prio = $connection->query("SELECT id, priority FROM priority WHERE id = \"$task_priority\"");
            if($row_prio=$query_prio->fetch_object()){
                echo "$row_prio->priority";
            }
        ?></p>
    </div>
    <div class="ls-div">
        <p class="ls-date"><?php echo "$task_date"; ?></p>
        <form id="task-form" action="?act=doneTask" method="POST">
            <input type="hidden" name="task_id" value="<?php echo $t_id; ?>">
            <div class="ls-chbox"> 
                <input type="checkbox" id="task-status" name="done" value="Done" onchange="toggleDone(this)">
                <label for="done">Done</label>
            </div>
        <form>
    </div>
</div>
<?php
}
?>
</div>