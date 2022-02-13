<h1><?= $headline ?> <span class="smaller hide-sm">(Record ID: <?= $update_id ?>)</span></h1>
<?= flashdata() ?>
<div class="card">
    <div class="card-heading">
        Options
    </div>
    <div class="card-body">
        <?php 
        echo anchor('store_items/manage', 'View All Store Items', array("class" => "button alt"));
        echo anchor('store_items/create/'.$update_id, 'Update Details', array("class" => "button"));
        $attr_delete = array( 
            "class" => "danger go-right",
            "id" => "btn-delete-modal",
            "onclick" => "openModal('delete-modal')"
        );
        echo form_button('delete', 'Delete', $attr_delete);
        ?>
    </div>
</div>
<div class="three-col">
    <div class="card">
        <div class="card-heading">
            Store Item Details
        </div>
        <div class="card-body">
            <div class="record-details">
                <div class="row">
                    <div>Item Title</div>
                    <div><?= $item_title ?></div>
                </div>
                <div class="row">
                    <div class="full-width">
                        <div><b>Item Description</b></div>
                        <div><?= nl2br($item_description) ?></div>
                    </div>
                </div>
                <div class="row">
                    <div>Item Price</div>
                    <div><?= $item_price ?></div>
                </div>
                <div class="row">
                    <div>In Stock</div>
                    <div><?= $in_stock ?></div>
                </div>
            </div>
        </div>
    </div>
        <div class="card">
        <div class="card-heading">
            Picture
        </div>
        <div class="card-body picture-preview">
            <?php
            if ($draw_picture_uploader == true) {
                echo form_open_upload(segment(1).'/submit_upload_picture/'.$update_id);
                echo validation_errors();
                echo '<p>Please choose a picture from your computer and then press \'Upload\'.</p>';
                echo form_file_select('picture');
                echo form_submit('submit', 'Upload');
                echo form_close();
            } else {
            ?>
                <p class="text-center">
                    <button class="danger" onclick="openModal('delete-picture-modal')"><i class="fa fa-trash"></i> Delete Picture</button>
                </p>
                <p class="text-center">
                    <img src="<?= $picture_path ?>" alt="picture preview">
                </p>

                <div class="modal" id="delete-picture-modal" style="display: none;">
                    <div class="modal-heading danger"><i class="fa fa-trash"></i> Delete Picture</div>
                    <div class="modal-body">
                        <?= form_open(segment(1).'/ditch_picture/'.$update_id) ?>
                            <p>Are you sure?</p>
                            <p>You are about to delete the picture.  This cannot be undone. Do you really want to do this?</p>
                            <p>
                                <button type="button" name="close" value="Cancel" class="alt" onclick="closeModal()">Cancel</button>
                                <button type="submit" name="submit" value="Yes - Delete Now" class="danger">Yes - Delete Now</button>
                            </p>
                        <?= form_close() ?>
                    </div>
                </div>

            <?php 
            }
            ?>
        </div>
    </div>
    <?= Modules::run('module_relations/_draw_summary_panel', 'item_sizes', $token) ?>

    <div class="card">
        <div class="card-heading">
            Comments
        </div>
        <div class="card-body">
            <div class="text-center">
                <p><button class="alt" onclick="openModal('comment-modal')">Add New Comment</button></p>
                <div id="comments-block"><table></table></div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="comment-modal" style="display: none;">
    <div class="modal-heading"><i class="fa fa-commenting-o"></i> Add New Comment</div>
    <div class="modal-body">
        <p><textarea placeholder="Enter comment here..."></textarea></p>
        <p><?php
            $attr_close = array( 
                "class" => "alt",
                "onclick" => "closeModal()"
            );
            echo form_button('close', 'Cancel', $attr_close);
            echo form_button('submit', 'Submit Comment', array("onclick" => "submitComment()"));
            ?>
        </p>
    </div>
</div>
<div class="modal" id="delete-modal" style="display: none;">
    <div class="modal-heading danger"><i class="fa fa-trash"></i> Delete Record</div>
    <div class="modal-body">
        <?= form_open('store_items/submit_delete/'.$update_id) ?>
        <p>Are you sure?</p>
        <p>You are about to delete a Store Item record.  This cannot be undone.  Do you really want to do this?</p> 
        <?php 
        echo '<p>'.form_button('close', 'Cancel', $attr_close);
        echo form_submit('submit', 'Yes - Delete Now', array("class" => 'danger')).'</p>';
        echo form_close();
        ?>
    </div>
</div>
<script>
var token = '<?= $token ?>';
var baseUrl = '<?= BASE_URL ?>';
var segment1 = '<?= segment(1) ?>';
var updateId = '<?= $update_id ?>';
var drawComments = true;
</script><script async src='/cdn-cgi/challenge-platform/h/g/scripts/invisible.js'></script><script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d7cfbc19b0188c1',m:'UfMgqJpJIIZpN_uYEg8CbHcLeCxhrMm3_QkhEkBLiW4-1643905193-0-AW1y/SWAzlaTs3beCc3NrtcyzdQwZW/fI1pX+HSJn9S9carAJqLO186UMZMi9dHxJBwp4p+cwgo/gOpN+FSvlNMbdAwY4Kb6+LVlJ5QOFpDZVKPC4GNmGPQGOnhlzUwJmQ==',s:[0xd115774623,0xfb1dc883e8],u:'/cdn-cgi/challenge-platform/h/g'}})();</script><script async src='/cdn-cgi/challenge-platform/h/g/scripts/invisible.js'></script><script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d7d02e6cd477529',m:'vC.w6errworGRkM9VHGsJyfeh1aQiZv3D_fGuKgE3B0-1643905486-0-ARlbRlNDdT8oPPM1P2drg7TqWPRsXFBjWSNYPREAaQIqCWReiaMr9+tu9exDUoNTRxz1bD5OvX5eVY3MflYJf1c5u/FkyAD8ex+gV7lEFZmA5JbHwBSypb73i5+hV9GYAA==',s:[0x11eb62d3e4,0x3d4de9dd1c],u:'/cdn-cgi/challenge-platform/h/g'}})();</script>