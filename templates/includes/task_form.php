  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="category">
    <?php foreach(getCategories() as $category) : ?>
      <option value="<?php echo $category->id; ?> <?php if($task->category_id == $category->id) echo 'selected'; ?> ">
      <?php echo $category->category ; ?></option>
    <?php endforeach; ?>
  </select>
  </div>
    <div class="form-group">
      <label>Task</label>
      <textarea id="body" rows="10" cols="80" class="form-control" name="body" value="<?php echo $task->task; ?>"></textarea>
    </div>
  <button name="do_create" type="submit" class="btn btn-default">Submit</button>
</form>
