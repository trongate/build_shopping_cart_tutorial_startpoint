<h1><?= $headline ?></h1>
<?= validation_errors() ?>
<div class="card">
    <div class="card-heading">
        Store Item Details
    </div>
    <div class="card-body">
        <?php
        echo form_open($form_location);
        echo form_label('Item Title');
        echo form_input('item_title', $item_title, array("placeholder" => "Enter Item Title", "autocomplete" => "off"));
        echo form_label('Item Description');
        echo form_textarea('item_description', $item_description, array("placeholder" => "Enter Item Description"));
        echo form_label('Item Price');
        echo form_input('item_price', $item_price, array("placeholder" => "Enter Item Price", "autocomplete" => "off"));
        echo '<div>';
        echo 'In Stock ';
        echo form_checkbox('in_stock', 1, $checked=$in_stock);
        echo '</div>';
        echo form_submit('submit', 'Submit');
        echo anchor($cancel_url, 'Cancel', array('class' => 'button alt'));
        echo form_close();
        ?>
    </div>
</div>