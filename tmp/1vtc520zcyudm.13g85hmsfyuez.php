<header>
	<div>
		<nav class="uk-navbar  uk-navbar-container">
		<div class="uk-navbar-right">
			<ul class="uk-navbar-nav">
				<?php foreach (($menu?:[]) as $link=>$title): ?>
					<?php if ($URI==$BASE.$link): ?>
						
							<li class="uk-active"><a href="<?php echo $BASE.$link; ?>"><?php echo $title; ?></a></li>
						
						<?php else: ?>
							<li><a href="<?php echo $BASE.$link; ?>"><?php echo $title; ?></a></li>
						
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>	
		</nav>
	</div>
</header>