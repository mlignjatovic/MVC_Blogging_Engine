<main>
	<section class="uk-container uk-container-center uk-margin-medium-top">
				<?php foreach (($result?:[]) as $item): ?>
				<article class="uk-article tm-article uk-align-center">
				<div class="uk-card uk-card-default uk-margin-medium uk-padding-small">
					<div class="uk-card-header">
						<h2 class="uk-article-title"><a href="<?php echo $BASE; ?>/post/<?php echo $item['post_id']; ?>"><?php echo $item['post_title']; ?></a></h2>
					</div>	
					<div class="uk-card-body">
				    	<p><?php echo $this->raw($item['post_text']); ?>...</p>
				    </div>
				     <div>
			            <a class="uk-button uk-button-text" href="<?php echo $BASE; ?>/post/<?php echo $item['post_id']; ?>">Read more</a>
			        </div>
			     </div>
		</article>	     
				<?php endforeach; ?>		
		<div class="uk-text-center">
			<a href="<?php echo $BASE; ?>/<?php echo $links['0']; ?>">First</a>
			<?php foreach (($links?:[]) as $item): ?>
				
				<?php if ($item>'1' && $item < count($links)): ?>
			    	<a href="<?php echo $BASE; ?>/<?php echo $item; ?>"><?php echo $item; ?></a>
			    <?php endif; ?>
			    
			<?php endforeach; ?>
			<a href="<?php echo $BASE; ?>/<?php echo count($links); ?>">Last</a>
		</div>	
	</section>
</main>