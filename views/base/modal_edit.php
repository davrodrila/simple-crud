<div class="modal fade" id="editModal-<?=$u->getId()?>" tabindex="-1" role="dialog" aria-labelledby="edit-users" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit user <?=htmlspecialchars($u->getEmail(),ENT_QUOTES,'UTF-8')?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/index.php?action=edit" onSubmit="return checkPassword(this)">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addEmail">Email</label>
                        <input type="email" class="form-control" name="email"  aria-describedby="emailHelp" value="<?=htmlspecialchars($u->getEmail(),ENT_QUOTES,'UTF-8')?>">
                    </div>
                    <div class="form-group">
                        <label for="addName">Name</label>
                        <input type="text" class="form-control" name="name"  value="<?=htmlspecialchars($u->getName(),ENT_QUOTES,'UTF-8')?>">
                    </div>
                    <div class="form-group">
                        <label for="addLastName">Lastname</label>
                        <input type="text" class="form-control" name="lastname"  value="<?=htmlspecialchars($u->getLastName(),ENT_QUOTES,'UTF-8')?>">
                    </div>
                    <div class="form-group">
                        <label for="addSurname">Surname</label>
                        <input type="text" class="form-control" name="surname"  value="<?=htmlspecialchars($u->getSurName(),ENT_QUOTES,'UTF-8')?>">
                    </div>
                    <div class="form-group">
                        <label for="addPass">Password</label>
                        <input type="password" class="form-control" name="pass1"  placeholder="Enter your new password">
                    </div>
                    <div class="form-group">
                        <label for="addPass2">Confirm Password</label>
                        <input type="password" class="form-control" name="pass2"  placeholder="Confirm the password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="id" value="<?=$u->getId()?>">
                    <input type="hidden" name="token" value="<?=$token?>">
                    <button type="submit" class="btn btn-danger">Edit</button>
                </div>
            </form>
        </div>
</div>
</div>
