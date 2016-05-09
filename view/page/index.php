<?php Template::includeTemplate('html_header.php'); ?>
<?php Template::includeTemplate('navbar.php'); ?>
<div id="page-background"></div>
<div class="container">
	<div class="center-box">
		<div class="content active" data-name="home">
			<img src="img/logo.png" />
		</div>
		<div class="content text" data-name="about">
			<?php Template::includeTemplate('index/about.php') ?>
		</div>
	</div>
</div>
<?php Template::includeTemplate('page_footer.php') ?>
<?php Template::includeTemplate('html_footer.php'); ?>
