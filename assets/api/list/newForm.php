<form action="?act=addForm" method="POST">
<div class="addForm-wrapper" id="addForm-modal">
    <div class="addForm-form">
        <div class="btn-class">
            <a href="#" id="cancel-button">Cancel</a>
            <button type="submit" id="addForm-button" action="post">Add</button>
        </div>
        <div class="addForm-items">
            <label for="title">Title</label>
            <input type="text" name="title" id="form-title" placeholder="add a title..">
            <label for="description">Description</label>
            <textarea name="description" id="form-description" cols="30" rows="5" placeholder="add a description.."></textarea>
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