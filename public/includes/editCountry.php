<?php
    $id = $_GET['countryId'];
    $results = countryManager::getCountry($id);
    if($_POST) {
        $name = $_POST['country_name'];
        countryManager::updateCountry($name, $id);
        header("Location: country.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Country</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Edit Country</h1>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <form method="post">
                    <div class="form-group">
                        <label for="country_name">Country Name</label>
                        <input type="text" name="country_name" class="form-control" id="country_name" value="<?php echo $results->name; ?>">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Update">
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
