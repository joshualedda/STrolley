<?php
session_start();

// Import database connection
include "../db_conn.php";


// Check if any products are found
if (!isset($_SESSION['user_type'])) {
    header("Location: ../index.php"); // Adjust the path to your login page
    exit;
}

// if (!isset($_GET['id'])) {
//     header("Location: ../products/tbl_products.php");
//     exit;
// }

// $id = $_GET['id'];

// // Fetch the product information
// $sql = "SELECT * FROM products WHERE id = '$id'";
// $result = $con->query($sql);

// // Check if a product with the specified ID exists
// if ($result->num_rows !== 1) {
//     header("Location: ../products/tbl_products.php");
//     exit;
// }

// $product = $result->fetch_assoc();


include '../includes/header.php';
include '../includes/navbar.php';
include '../includes/sidebar.php';
?>

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Coop Staff Registration </h5>
                    <!-- <p class="text-muted">Complete the form below to add new staff</p> -->
                </div>
                <form class="row g-3 needs-validation" action="../settings/addedStaff.php" method="post" novalidate>

                    <div class="col-md-12 position-relative">
                        <label class="form-label">Name<font color="red">*</font></label>
                        <input type="text" class="form-control" id="validationTooltip01" name="name" required autofocus="autofocus">
                        <div class="invalid-tooltip">
                            The Fullname field is required.
                        </div>
                    </div>

                    <div class="col-md-6 position-relative">
                        <label class="form-label">Username<font color="red">*</font></label>
                        <input type="text" class="form-control" id="validationTooltip01" name="username" required>
                        <div class="invalid-tooltip">
                            The Username field is required.
                        </div>
                    </div>

                    <!-- <div class="col-md-6 position-relative">
                        <label class="form-label">Email Address<font color="red">*</font></label>
                        <input type="email" class="form-control" id="validationTooltip01" name="email" required>
                        <div class="invalid-tooltip">
                            The Email Address field is required.
                        </div>
                    </div> -->

                    <div class="col-md-6 position-relative">
                        <label class="form-label">Password<font color="red">*</font></label>
                        <input type="password" class="form-control" id="validationTooltip02" name="password" required>
                        <div class="invalid-tooltip">
                            The Password field is required.
                        </div>
                    </div>

                    <div class="col-md-6 position-relative">
                        <label class="form-label">PhoneNumber (Format: 09XXXXXXXXX)<font color="red">*</font></label>
                        <input type="text" class="form-control" id="validationTooltip01" name="phone_number" maxlength="11" required>
                        <div class="invalid-tooltip">
                            The Contact Number field is required.
                        </div>
                    </div>

                    <div class="col-md-6 position-relative">
                        <label class="form-label">User Type<font color="red">*</font></label>
                        <div class="col-sm-12">
                            <select class="form-select" aria-label="Default select example" name="user_type" id="validationTooltip03" required>
                                <option value="" selected disabled>Select User Type</option>
                                <option value="Admin">Administrator</option>
                                <option value="Staff">Staff</option>
                            </select>
                            <div class="invalid-tooltip">
                                The User Type field is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-warning mb-3" name="submit">Save User</button>
                        <a href="tbl_staff.php" class="btn btn-primary mb-3">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include '../includes/footer.php' ?>

</body>

</html>