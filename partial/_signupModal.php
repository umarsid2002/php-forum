<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Signup for Iforum account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action='partial/_handleSignup.php' method='post'>
      <div class="form-group">
        <label for="signupEmail">Username</label>
        <input type="text" class="form-control" name='signupEmail' id="signupEmail" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="signupPassword">Password</label>
        <input type="password" class="form-control" name='signupPassword' id="signupPassword" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="signupCPassword">Confirm Password</label>
        <input type="password" class="form-control" name='signupCPassword' id="signupCPassword" placeholder="Password">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>

    </div>
  </div>
</div>