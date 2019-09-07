<?php
?>
<div class="modal fade" id="deleteModal-<?=$u->getId()?>" tabindex="-1" role="dialog" aria-labelledby="delete-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete-modal">Are you sure you want to delete the user <?=htmlspecialchars($u->getEmail(),ENT_QUOTES,'UTF-8')?>?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data will be lost forever.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form method="POST" action="/index.php?action=delete">
                    <input type="hidden" name="id" value="<?=$u->getId()?>">
                    <input type="hidden" name="token" value="<?=$token?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>