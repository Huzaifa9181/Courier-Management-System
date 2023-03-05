<?php
include "../php_functionality/header.php"; 


?>
<style>
    .buttons-pdf{
        background: #ff5b5b !important;
    }
</style>
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Track Shipment Data</h4>
                                <p class="text-muted font-14 mb-3">
                                    All Packages Track With Track Order Id If you want to Check Write a Track Order Id. 
                                </p>

                                    <div class="row">
                                        <div class="col-10">
                                            <input type="search" name="track_order" id="track_id" class="form-control" placeholder="Write A Track Order Id LIke AMB00000">
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-success" id="search-btn"><i class="bi bi-search"></i></button>
                                        </div>
                                    </div>

                                    <table id="datatable-buttons"
                                    class="table table-striped mt-3 table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>Customer Name</th>
                                            <th>Track Order Id</th>
                                            <th>Branch</th>
                                            <th>Status</th>
                                            <th>Order Address</th>
                                            <th>Total Price</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>


                                    <tbody id="data-append">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    $("#search-btn").on('click',function(){
        track_search = $("#track_id").val();
        $.ajax({
            url: "../php_functionality/track_shipment_functionality.php",
            type: "POST",
            data: {search:track_search},
            success: function(data){
                $("#data-append").html(data);
                console.log(data);
            }
        })
    })

</script>
<?php include "../php_functionality/footer.php"; ?>