<?php include "php/header.php"; 
if(!isset($_SESSION['login']) &&  empty($_SESSION['login'])){
    header("Location: login.php?track=false");
}
?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Track Order</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Track Order</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <div class="container">
        <main id="main">
        <div class="row mt-3 mb-3">
            <div class="col-10">
                <input type="search" name="track_order" id="track_id" class="form-control" placeholder="Write A Track Order Id LIke AMB00000">
            </div>
            <div class="col-2">
                <button class="btn btn-success" id="search-btn"><i class="bi bi-search"></i></button>
            </div>
        </div>

        <table class="table">
          <thead style="background-color: #0d1d34; color: white;">
            <tr>
              <th>Customer Name</th>
              <th>Track Order Id</th>
              <th>Branch</th>
              <th>Status</th>
              <th>Order Address</th>
              <th>Total Price</th>
            </tr>
          </thead>
          <tbody id="data-append">
                                            
          </tbody>
        </table>
    </div>

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 content order-last  order-lg-first">
            <h3>Track Order</h3>
            <p>
              Dolor iure expedita id fuga asperiores qui sunt consequatur minima. Quidem voluptas deleniti. Sit quia molestiae quia quas qui magnam itaque veritatis dolores. Corrupti totam ut eius incidunt reiciendis veritatis asperiores placeat.
            </p>
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-diagram-3"></i>
                <div>
                  <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                  <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade</p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-fullscreen-exit"></i>
                <div>
                  <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                  <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna pasata redi</p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-broadcast"></i>
                <div>
                  <h5>Voluptatem et qui exercitationem</h5>
                  <p>Et velit et eos maiores est tempora et quos dolorem autem tempora incidunt maxime veniam</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
      
    </section><!-- End About Us Section -->

  
<?php include "php/footer.php"; ?>
<script>
$("#search-btn").on('click',function(){
    track_search = $("#track_id").val();
    $.ajax({
        url: "php/track_order_details.php",
        type: "POST",
        data: {search:track_search},
        success: function(data){
            $("#data-append").html(data);
            console.log(data);
        }
    })
})
</script>