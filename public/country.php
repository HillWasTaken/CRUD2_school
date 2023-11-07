<?php
require_once "../private/config.php";
$id = 1;
if($_POST) {
    $name = $_POST['countryName'];
    $error = countryManager::addCountry($name);
    if($error) {
        echo "<script>alert('Country already exists.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Country Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center">Country Management</h1>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <h2>Add Country</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="country_name">Country Name</label>
                        <input type="text" name="countryName" class="form-control" id="country_name" placeholder="Enter country name">
                    </div>
                    <input type="submit" value="Add" class="btn btn-primary">
                    <a href="index.php" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <h2>Country List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Country Name</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $results = countryManager::getCountries();
                        foreach($results as $r) {
                            echo "<tr>";
                            echo "<td>$r->name</td>";
                            echo "<td><a href='edit.php?countryId=$r->id&id=$id' class='btn btn-success btn-sm'>Edit</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
