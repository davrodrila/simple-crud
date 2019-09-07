<div class="modal fade" id="add-user" tabindex="-1" role="dialog" aria-labelledby="add-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-modal">User creation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/index.php?action=create" onSubmit="return checkPassword(this)">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addEmail">Email</label>
                        <input type="email" class="form-control" name="email" required aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="addName">Name</label>
                        <input type="text" class="form-control" name="name" required placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="addLastName">Lastname</label>
                        <input type="text" class="form-control" name="lastname" required placeholder="Enter your Last Name">
                    </div>
                    <div class="form-group">
                        <label for="addSurname">Surname</label>
                        <input type="text" class="form-control" name="surname" required placeholder="Enter your Surname">
                    </div>
                    <div class="form-group">
                        <label for="addPass">Password</label>
                        <input type="password" class="form-control" name="pass1" required placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label for="addPass2">Confirm Password</label>
                        <input type="password" class="form-control" name="pass2" required placeholder="Confirm the password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="hidden" name="token" value="<?=$token?>">
                    <button type="submit" class="btn btn-danger">Create</button>
                </form>
            </div>
        </div>
</div>
