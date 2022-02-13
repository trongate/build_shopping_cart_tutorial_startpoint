<section>
	<h1><?= $item_title ?></h1>
	<div class="item-showcase">
		<div><img src="<?= $pic_path ?>" alt="<?= $item_title ?>"></div>
		<div>
			<?php
            echo form_label('Description:');
            echo '<div>'.nl2br($item_description).'</div>';
			?>
		</div>
	</div>
</section>