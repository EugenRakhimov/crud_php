  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="category">
    <?php foreach(getCategories() as $category) : ?>
      <option <?php if($task->category_id == $category->id) echo 'selected="selected"'; ?> value="<?php echo $category->id; ?> ">
      <?php echo $category->category ; ?></option>
    <?php endforeach; ?>
  </select>
  </div>
    <div class="form-group">
      <label>Task</label>
      <textarea id="body" rows="10" cols="80" class="form-control" name="body" ><?php echo $task->task; ?></textarea>
    </div>
  
