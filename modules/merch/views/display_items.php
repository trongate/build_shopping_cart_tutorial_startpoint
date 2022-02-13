<section>
	<h1 class="text-center">
		My Shop
	</h1>
	<div class="items-grid">
		<?php
		foreach($items as $item) {
			$pic_path = BASE_URL.'store_items_module/store_items_pics/';
			$pic_path.= $item->id.'/'.$item->picture;
			$item_url = BASE_URL.'merch/display/'.$item->id.'/'.$item->url_string;
            ?>

            <div>
            	<div><a href="<?= $item_url ?>"><img src="<?= $pic_path ?>" alt="<?= $item->item_title ?>"></a></div>
            	<div><?= $item->item_title ?></div>
            	<div><?= anchor($item_url, 'View Item', array('class' => 'button')) ?></div>
            </div>

            <?php
		}
		?>
	</div>
</section>