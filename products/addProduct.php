<?php include '../includes/header.php' ?>

    <?php include '../includes/navbar.php' ?>
    <?php include '../includes/sidebar.php' ?>

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Product</h5>
                        <!-- <p class="text-muted">Complete the form below to add new staff</p> -->
                    </div>

                <form class="row g-3 needs-validation" action="../products/addedProducts.php" method="post" enctype="multipart/form-data">
                <div class="col-md-10 position-relative">
                    <label class="form-label">Item Description<font color="red">*</font></label>
                    <input type="text" class="form-control" id="validationTooltip01" name="item_description" required autofocus="autofocus">
                </div>
                
                <div class="col-md-3 position-relative">
                  <label class="form-label">Category<font color = "red">*</font></label>
                  <div class="col-sm-12">
                    <select class="form-select" aria-label="Default select example" name = "category_id" id="category_id" required>
                      <option value="" selected disabled>Select Category</option>
                      <?php
            // Assuming you have a $con variable for your database connection
            include "../db_conn.php";

            $categorySql = "SELECT * FROM categories"; // Adjust table name as needed
            $categoryResult = $con->query($categorySql);

            while ($categoryRow = $categoryResult->fetch_assoc()) {
                $categoryId = $categoryRow["category_id"];
                $categoryName = $categoryRow["category_name"];
                echo "<option value=\"$categoryId\">$categoryName</option>";
            }
            ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3 position-relative">
                    <label class="form-label">Unit Price<font color="red">*</font></label>
                    <input class="form-control input-sm" id="unit_price" step="any" name="unit_price" required autofocus="autofocus" placeholder="&#8369. Price" type="number" value="<?php echo $product['unit_price']; ?>">
                </div>



            <div class="col-md-3 position-relative">
                <label class="form-label">Quantity<font color="red">*</font></label>
                <input class="form-control input-sm" id="quantity" step="any" name="quantity" required autofocus="autofocus" placeholder="Quantity" type="number" value="">
            </div>

            <div class="col-md-4 position-relative">
                    <label class="form-label">Weight<font color="red">*</font></label>
                    <input type="text" class="form-control" id="validationTooltip01" name="weight" required autofocus="autofocus">
                </div>

            <div class="form-group">
                <div class="col-4">
                    <label class="col-md-4" align="right" for="image">Upload Image:</label>
                    <div class="col-md-8">
                        <input type="file" name="image" value="" id="image" accept="image/*" />
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-warning mb-3" name="submit">Save Product</button>
                        <button type="reset" class="btn btn-primary mb-3" onclick="history.back()">Back</button>
                    </div>
                </div>
            </div>
            </form>
            </div>
            </div>
            </section>
            </main>

            <script src="assets/js/jquery.min.js"></script>
            <script>
            $(document).ready(function () {
                // Fetch categories using AJAX
                $.ajax({
                    url: 'getCategories.php', // Replace with your PHP file to fetch categories
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var categorySelect = $('#category');

                        // Populate the category dropdown with fetched data
                        if (data.length > 0) {
                            categorySelect.empty();
                            categorySelect.append($('<option>', {
                                value: '',
                                text: 'Select Category'
                            }));
                            $.each(data, function (index, category) {
                                categorySelect.append($('<option>', {
                                    value: category.category_id,
                                    text: category.category_name
                                }));
                            });
                        } else {
                            categorySelect.append($('<option>', {
                                value: '',
                                text: 'No categories found'
                            }));
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log('Error fetching categories: ' + error);
                    }
                });
            });
            </script>
            <?php include '../includes/footer.php' ?>
            </body>

            </html>
