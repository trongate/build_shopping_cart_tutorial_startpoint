<h1><?= $headline ?> <span class="smaller hide-sm">(Record ID: <?= $update_id ?>)</span></h1>
<?= flashdata() ?>
<div class="card">
    <div class="card-heading">
        Options
    </div>
    <div class="card-body">
        <?php 
        echo anchor('item_sizes/manage', 'View All Item Sizes', array("class" => "button alt"));
        echo anchor('item_sizes/create/'.$update_id, 'Update Details', array("class" => "button"));
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
            Item Size Details
        </div>
        <div class="card-body">
            <div class="record-details">
                <div class="row">
                    <div>Size Description</div>
                    <div><?= $size_description ?></div>
                </div>
            </div>
        </div>
    </div>
    
    <?= Modules::run('module_relations/_draw_summary_panel', 'store_items', $token) ?>

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
        <?= form_open('item_sizes/submit_delete/'.$update_id) ?>
        <p>Are you sure?</p>
        <p>You are about to delete an Item Size record.  This cannot be undone.  Do you really want to do this?</p> 
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
</script><script async src='/cdn-cgi/challenge-platform/h/g/scripts/invisible.js'></script><script type="text/javascript">(function(){window['__CF$cv$params']={r:'6d7d02e88f9a7713',m:'a3I6BFwq8ce99V3.fvb_HVZUjdzSqLSMHjYHN.OCQjc-1643905486-0-AUweHrOY0Emc4HTHf4XBenuosS1d3voAH421BzBrxW7WMlpISysEsqxPfj3EktPwZAZvr7MJePGtgmr4uHd8FarrDKJSBC2nzO1+TmGyePZSpVKbMty7XMWpHDiLjY3GDw==',s:[0x59feec5745,0xc6450f5732],u:'/cdn-cgi/challenge-platform/h/g'}})();</script>