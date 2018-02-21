</br><h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>


<?php echo form_open('articles/update'); ?>
<input type="hidden" name="id" value="<?php echo $article['id'] ?>">
<form>
  <fieldset>
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $article['title']; ?>">
    </div>
    <div class="form-group">
      <label>Body</label>
      <textarea id="editor1" rows="10"; class="form-control" name="body" placeholder="Add Body"><?php echo $article['body']; ?></textarea>
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control">
          <?php foreach($categories as $category): ?>
          <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
   </fieldset>
</form>