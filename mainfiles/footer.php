<!-- start footer copyright  -->
<footer class="container-fluid bg-dark text-center p-1">
  <small class="text-white">Copyright &copy; 2019 || Designed by DLearning team || <a class="text-white text-decoration-none" href="#login" data-bs-toggle="modal" data-bs-target="#adminLoginModal">Admin Login</a></small>
</footer>
<!-- End footer copyright  -->


<!-- start Student Registration form  -->
<!-- Modal -->
<div class="modal fade " id="StudentSignUpModal" tabindex="-1" aria-labelledby="StudentSignUpModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="StudentSignUpModalLabel">Sign Up</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- start sign up form  -->
        <?php
        include('studentregistrationform.php');
        ?>
        <!-- End sign up form  -->
      </div>
      <div class="modal-footer">
        <span id="successMsg"></span>
        <button type="button" class="btn btn-primary" id="studSignUpBtn" onclick="addStud()">Sign Up</button>
      </div>
    </div>
  </div>
</div>
<!-- end Student Registration form -->



<!-- start Student Login form   -->
<!-- Modal -->
<div class="modal fade " id="StudentLoginModal" tabindex="-1" aria-labelledby="StudentLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="StudentLoginModalLabel">Login</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- start Login form  -->
        <form id="studentLoginForm">
          <div class="mb-3">
            <i class="fa fa-envelope"></i>
            <label for="studLoginEmail" class="form-label font-weight-bold">Email address</label>
            <small id="logstatusmsg1"></small>
            <input type="email" class="form-control" name="studLoginEmail" id="studLoginEmail" placeholder="Email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <i class="fa fa-key"></i>
            <label for="studLoginPassword" class="form-label font-weight-bold">Password</label>
            <small id="logstatusmsg2"></small>
            <input type="password" class="form-control" name="studLoginPassword" id="studLoginPassword" placeholder="Password">
          </div>
        </form>
        <!-- End Login form  -->
      </div>
      <div class="modal-footer">
        <span id="logsuccessmsg"></span>
        <button type="button" class="btn btn-primary" id="studLoginBtn" onclick="logStud()">Login</button>
      </div>
    </div>
  </div>
</div>
<!-- End Student Login form  -->

<!-- start Admin Login form   -->
<div class="modal fade " id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLoginModalLabel">Admin Login</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- start Login form  -->
        <form id="adminLoginForm" autocomplete="off">
          <div class="mb-3">
            <i class="fa fa-envelope"></i>
            <label for="adminLoginEmail" class="form-label font-weight-bold">Email address</label>
            <small id="admstatusmsg1"></small>
            <input type="email" class="form-control" name="adminLoginEmail" id="adminLoginEmail" placeholder="Email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <i class="fa fa-key"></i>
            <label for="adminLoginPassword" class="form-label font-weight-bold">Password</label>
            <small id="admstatusmsg2"></small>
            <input type="password" class="form-control" name="adminLoginPassword" id="adminLoginPassword" placeholder="Password">
          </div>
        </form>
        <!-- End Login form  -->
      </div>
      <div class="modal-footer">
        <span id="admstatusmsg3"></span>
        <button type="button" class="btn btn-primary" onclick="adminLog()" id="adminLoginBtn">Login</button>
      </div>
    </div>
  </div>
</div>
<!-- End Admin Login form  -->



<!-- JQuery and Bootstrap JS  -->
<script src="./js/jquery.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script>
  $(window).scroll(function() {
    $('nav').toggleClass('scrolled', $(this).scrollTop() > 720);
  });
</script>
<!-- Font Awesome js  -->
<script src="./js/all.min.js"></script>
<!-- Student Ajax call javascript  -->
<script type="text/javascript" src="js/ajaxrequest.js"></script>
<!-- Admin Ajax call javascript  -->
<script type="text/javascript" src="js/adminajaxrequest.js"></script>

</body>

</html>