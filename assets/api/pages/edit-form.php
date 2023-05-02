<?php
    $id = $_SESSION['user']['id'];
    if (isset($_GET['id'])){
        $t_id = $_GET['id'];
        $query = $connection->query("SELECT * FROM tasks WHERE id = $t_id");
        if($row=$query->fetch_object()){
            if($row->active){
                $t_title = $row->title;
                $t_desc = $row->description;
            }
        }
    }
?>
<form action="?act=editForm" method="POST">
<div class="editForm-wrapper" id="editForm-modal">
    <div class="editForm-form">
        <div class="edit-btns">
            <a href="?act=cancl" id="cancel-btn">Cancel</a>
            <button type="submit" id="editForm-button" action="post">Save</button>
            <input type="hidden" name="task_id" value="<?php echo $t_id; ?>">
        </div>
        <div class="editForm-items">
            <label for="title">Title</label>
            <input type="text" name="title" id="form-title"
            value="<?php
                echo "$t_title";
            ?>">
            <label for="description">Description</label>
            <textarea name="description" id="form-description" cols="30" rows="5" 
            ><?php echo $t_desc; ?>
            </textarea>
            <div class="form-type">
                <label for="types">Types</label><br>
                <div class="radio"><input type="radio" id="answer1" name="type" value="work">Work</div>
                <div class="radio"><input type="radio" id="answer2" name="type" value="study">Study</div>
                <div class="radio"><input type="radio" id="answer3" name="type" value="personal">Personal</div>
                <div class="radio"><input type="radio" id="answer4" name="type" value="family">Family</div>
                <div class="radio"><input type="radio" id="answer5" name="type" value="health">Health</div>
                <div class="radio"><input type="radio" id="answer6" name="type" value="other">Other</div>          
            </div>
            <div class="form-priority">
                <label for="priority">Priority</label>
                <select id="priority" name="priority_id">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
        </div>
    </div>
</div>
</form>