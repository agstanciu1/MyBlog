<h2><?php echo $article['title'] ?></h2>
<small class= "article-date">Posted on: <?php echo $article['created_at']; ?></small></br>
<img src="<?php echo site_url(); ?>assets/images/articles/<?php echo $article['article_image']; ?>">
<div class="article-body">
	<?php echo $article['body']; ?>
</div>
<?php if($this->session->userdata('user_id') == $article['user_id']): ?>
		<hr>
		<div class="input-group">
		  <span class="input-group-btn">
		<a class="btn btn-info pull-left" href="<?php echo base_url(); ?>articles/edit/<?php echo $article['slug']; ?>">Edit</a>
		</span>
		<?php echo form_open('articles/delete/'.$article['id']); ?>
		    <input type="submit" value="Delete" class="btn btn-danger">
		</form>
		</div>
<?php endif; ?>
<hr>
<h3>Comments</h3>
<?php if($comments) : ?>
	<?php foreach($comments as $comment) :?>
		<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
	<?php endforeach; ?>
<?php else : ?>
	<p> No Comments to display</p>
<?php endif;?>
<hr>
<h3>Add comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$article['id']); ?>
<div class="form-group">
	<label>Name</label>
	<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
	<label>Email</label>
	<input type="text" name="email" class="form-control">
</div>
<div class="form-group">
	<label>Body</label>
	<textarea name="body" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $article['slug']; ?>">
<button class="btn btn-primary" type="submit">Submit</button>
</form>