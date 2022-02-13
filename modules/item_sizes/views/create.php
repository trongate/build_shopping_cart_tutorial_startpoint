<h1><?= $headline ?></h1>
<?= validation_errors() ?>
<div class="card">
    <div class="card-heading">
        Item Size Details
    </div>
    <div class="card-body">
        <?php
        echo form_open($form_location);
        echo form_label('Size Description');
        echo form_input('size_description', $size_description, array("placeholder" => "Enter Size Description"));
        echo form_submit('submit', 'Submit');
        echo anchor($cancel_url, 'Cancel', array('class' => 'button alt'));
        echo form_close();
        ?>
    </div>
</div>