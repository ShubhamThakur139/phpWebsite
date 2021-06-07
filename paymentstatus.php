<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment status</title>
</head>
<body>

    <!-- Start including header section  -->
    <?php
    include('./mainfiles/header.php');
    ?>
    <!-- End including header section  -->

    <!-- start home page  -->
    <div class="container-fluid bg-dark">
        <div class="row">
            <img src="./images/homeBackground.jpg" alt="This is an image"
              style="height: 550px; width: 100%; object-fit:cover; box-shadow: 10px;"  >
        </div>
    </div>
    <!-- End home page  -->

    <!-- Start main content  -->
    <div class="container-fluid courses remove-img-margin">
        <h2 class="text-center pt-3">Payment Status</h2>
        <hr class="mx-auto w-25">
        <form action="" method="post">
            <div class="form-group row pt-4 pb-5">
                <label class="offset-sm-3 col-form-label" for="orderID">Order ID:</label>
                <div>
                    <input type="text" class="form-control mx-3" name="orderID" id="orderID">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary mx-4" value="View">
                </div>
            </div>
        </form>
    </div>
    <!-- End main content  -->

    <!-- start including contact page  -->
    <?php
    include('./contact.php');
    ?>
    <!-- End including contact page  -->

    <!-- Start Include footer section  -->
    <?php
        include('./mainfiles/footer.php');
    ?>
    <!-- End Including footer section  -->

</body>
</html>