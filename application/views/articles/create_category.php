</br><h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>


<?php echo form_open_multipart('articles/create_category'); ?>
<form>
  <fieldset>
    <div class="form-group">
      <label>Category</label>
      <input type="text" class="form-control" name="category_name" placeholder="Add Category">
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
   </fieldset>
</form>