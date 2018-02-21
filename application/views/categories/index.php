</br><h2><?= $title ?></h2>


<?php foreach($categories as $category) : ?>



<div class="card text-white bg-secondary mb-3" style="max-width: 20rem; display: inline-block;">
  <div class="card-header">Category</div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $category['name'];?></h4>
    <p class="card-text">Created on: <?php echo $category['created_at']; ?></p>
    <?php echo form_open('categories/delete/'.$category['id']); ?>
		    <input type="submit" value="Delete" class="btn btn-danger">
		</form>
  </div>
</div>

<?php endforeach; ?></br>