

</br><h2>Latest Articles in <?php echo $title ?></h2>

<div style = "margin-left: auto; margin-right: auto;">
	<?php foreach($categories as $category): ?>
          <a type="button" class="btn btn-primary btn-lg" value="<?php echo $category['id']; ?>" href="<?php echo base_url(); ?>categories/articles/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
        <?php endforeach; ?>
</div>

<?php foreach($articles as $article) : ?>
<div class="jumbotron">
	<h3><?php echo $article['title'];?></h3>

 		<div class="row">
			<div class="col-md-3">
				<img class="article-thumb" src="<?php echo site_url(); ?>assets/images/articles/<?php echo $article['article_image']; ?>">
			</div>
			<div class="col-md-9">
				<small class= "article-date">Posted on: <?php echo $article['created_at']; ?> in <strong><?php echo $article['name']; ?></strong></small></br>
				<?php echo word_limiter($article['body'], 50); ?>
				</br></br>
				<p><a class="btn btn-success" href="<?php echo site_url('articles/'.$article['slug']);?>">Read More</a></P>
			</div>
		</div>
	
	
</div>



<?php endforeach; ?>