<?php include "php/header.php"; ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Sign Up</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Sign Up</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Sign Up Section ======= -->
    <section id="get-a-quote" class="get-a-quote">
      <div class="container" data-aos="fade-up">

        <div class="row g-0">

          <div class="col-lg-5 quote-bg" style="background-image: url(assets/img/quote-bg.jpg);"></div>

          <div class="col-lg-7">
            <form action="php/register.php" method="post" class="php-email-form2" style="background: #f3f6fc;padding: 40px;height: 100%;">
              <div class="row gy-4">

                <div class="col-lg-12">
                  <h4>Your Personal Details</h4>
                </div>

                <div class="col-md-12">
                  <label for="" class="form-label">Username <span style="color: red;">*</span></label>
                  <input type="text" name="username" class="form-control" placeholder="Write a username" required>
                </div>

                <div class="col-md-12 ">
                  <label for="" class="form-label">Email <span style="color: red;">*</span></label>
                  <input type="email" class="form-control" name="email" placeholder="Write a email" required>
                </div>

                <div class="col-md-12">
                  <label for="" class="form-label">Password <span style="color: red;">*</span></label>
                  <input type="password" class="form-control" name="password" placeholder="Write a password" required>
                </div>

                <div class="col-md-12">
                  <label for="" class="form-label">Confirm Password <span style="color: red;">*</span></label>
                  <input type="password" class="form-control" name="cpassword" placeholder="Write a confirm password" required>
                </div>

                <div class="col-md-12 text-center">
                  <button style="background: var(--color-primary);
                  border: 0;
                  padding: 10px 30px;
                  color: #fff;
                  transition: 0.4s;
                  border-radius: 4px;" type="submit">Sign Up</button>
                </div>

              </div>
            </form>
          </div><!-- End Quote Form -->

        </div>

      </div>
    </section><!-- End Sign Up Section -->

  </main><!-- End #main -->
  <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
    if(isset($_GET['email']) && $_GET['email'] =='exsist'){
        echo"
        <script>
        Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Email is already exsists!',
            })
        jQuery('.swal2-confirm').on('click',function(){
            window.location.href = 'register.php';
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
          window.location.href = 'register.php';
      });
      </script>
      ";
  }
?>
  <?php include "php/footer.php"; ?>