<?php include "php/header.php";
 ?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Log In</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Log In</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Log In Section ======= -->
    <section id="get-a-quote" class="get-a-quote">
      <div class="container" data-aos="fade-up">

        <div class="row g-0">

          <div class="col-lg-5 quote-bg" style="background-image: url(assets/img/quote-bg.jpg);min-height:387px !important;"></div>

          <div class="col-lg-7">
            <form action="php/login.php" method="post" class="php-email-form2" style="background: #f3f6fc;padding: 40px;height: 100%;">
              <div class="row gy-4">

                <div class="col-lg-12">
                  <h4>Your Login Details</h4>
                </div>

                <div class="col-md-12">
                  <label for="" class="form-label">Email <span style="color: red;">*</span></label>
                  <input type="email" name="email" class="form-control" placeholder="Write a email" required>
                </div>

                <div class="col-md-12">
                  <label for="" class="form-label">Password <span style="color: red;">*</span></label>
                  <input type="password" class="form-control" name="password" placeholder="Write a password" required>
                </div>
                
                <div class="col-md-12 text-center">
                  <button style="background: var(--color-primary);
                  border: 0;
                  padding: 10px 30px;
                  color: #fff;
                  transition: 0.4s;
                  border-radius: 4px;" type="submit">Log In</button>
                </div>

              </div>
            </form>
          </div><!-- End Quote Form -->

        </div>

      </div>
    </section><!-- End Log In Section -->

  </main><!-- End #main -->
<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
    if(isset($_GET['user_exsist']) && $_GET['user_exsist'] =='false'){
        echo"
        <script>
        Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Email is not exsists!',
            })
        jQuery('.swal2-confirm').on('click',function(){
            window.location.href = 'login.php';
        });
        </script>
        ";
    }

    if(isset($_GET['password']) && $_GET['password'] =='false'){
      echo"
      <script>
      Swal.fire({
              icon: 'error',
              title: 'Error!',
              text: 'Wrong password enter!',
          })
      jQuery('.swal2-confirm').on('click',function(){
          window.location.href = 'login.php';
      });
      </script>
      ";
  }
  if(isset($_GET['user_approve']) && $_GET['user_approve'] =='false'){
    echo"
    <script>
    Swal.fire({
            icon: 'info',
            title: 'Approve!',
            text: 'Admin donot approve you please wait 24 hours!',
        })
    jQuery('.swal2-confirm').on('click',function(){
        window.location.href = 'login.php';
    });
    </script>
    ";
}
  if(isset($_GET['track']) && $_GET['track'] =='false'){
    echo"
    <script>
    Swal.fire({
            icon: 'info',
            title: 'Track Order!',
            text: 'First you loggedin then track you order!',
        })
    jQuery('.swal2-confirm').on('click',function(){
        window.location.href = 'login.php';
    });
    </script>
    ";
}
?>
  <?php include "php/footer.php"; ?>