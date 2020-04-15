<!DOCTYPE html>
<html>
  <head>
    <?php
    require_once('./links.php');
    ?>
  </head>
  <body>
    <?php
      require_once('./navbar.php');
    ?>
    <div class="page">
    <?php
        require_once('./header.php');
      ?>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder">
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Forms       </li>
          </ul>
        </div>
      </div>
      <section class="forms">
        <div class="container-fluid">
          <!-- Page Header-->
          <header> 
            <h1 class="h3 display">Forms            </h1>
          </header>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4>Add Users </h4>
                </div>
                <div class="card-body">
                  <form class="form-horizontal">

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Username </label>
                      <div class="col-sm-10">
                        <input type="text" placeholder="Username " class="form-control">
                      </div>
                    </div>
                    <div class="line"></div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Email </label>
                      <div class="col-sm-10">
                        <input type="email" placeholder="Email" class="form-control" required>
                      </div>
                    </div>
                    <div class="line"></div>
                    
                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control">
                      </div>
                    </div>
                    <div class="line"></div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Shop Location </label>
                      <div class="col-sm-10">
                        <input type="text" placeholder="Location" class="form-control">
                      </div>
                    </div>
                    <div class="line"></div>

                    <div class="form-group row">
                      <label class="col-sm-2 form-control-label">Phone number </label>
                      <div class="col-sm-10">
                        <input type="text" placeholder="phone number" class="form-control">
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <button type="submit" class="btn btn-secondary">Cancel</button>
                        <input type="submit" value="submit" class="btn btn-primary" name="submit">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
        require_once('./footer.php');
      ?>

    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>

  <?php
    
  ?>
</html>