<?php include ("header.php"); ?>

<div class="row">
    <div class="sm-12 bg-light rounded p-3">
        <h1>Results</h1><br>
        <?php
        $target_dir = "images/"; // Specify the directory where the file will be placed
        $target_file = $target_dir . basename($_FILES["image"]["name"]); // Path of the uploaded file
        $uploadOk = 1; // Not used yet (will be used later)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // File extension (in lowercase)
        $fileExists = 0;
        $phpFileUploadErrors = array(
            0 => 'There is no error, the file uploaded with success',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk.',
            8 => 'A PHP extension stopped the file upload.',
        );

        // Check if the uploaded file is an actual image or a fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".<br><br>";
                $uploadOk = 1;
            } else {
                echo "File is not an image.<br><br>";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            echo "<h3 class='text-warning'>Caution: Image file already exists.</h3><br><br><h1>File:</h1><br>";
            $uploadOk = 1;
            $fileExists = 0;
            rename($target_file, $target_file . "." . date("Y-m-d h-i-s-a") . ".old");
        }

        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.<br><br>";
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if ($fileExists == 0) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "<h3 class='text-success'>The file " . basename($_FILES["image"]["name"]) . " has been uploaded.</h3><br>";
                    $success = true;
                } else {
                    echo "Sorry, there was an error uploading your file.<br>";
                    echo $phpFileUploadErrors[(int) $_FILES["image"]["error"]];
                    $success = false;
                }
            } else if ($fileExists == 1) {
                $success = true;
            }
        } else {
            $success = false;
        }


        // variables for database query.
        $name = "";
        $price = 0.00;
        $image = basename($_FILES["image"]["name"]);
        try {
            if ($success) {
                $meta_id = $item["meta_id"] ?? "";
                $name = $_POST["name"] ?? "";
                $category = $_POST["category"] ?? "";
                $meta_table_description = $_POST["meta_table_description"] ?? "";
                $title = $_POST["title"] ?? "";
                $description = $_POST["description"] ?? "";
                $keywords = $_POST["keywords"] ?? "";
                $robots = $_POST["robots"] ?? "";
                $alt_text = $_POST["alt_text"] ?? "";
                $price = str_replace("$", "", $_POST["price"]) ?? "";
                $category = strtolower($_POST["category"]);
                $success = true;
            }
        } catch (Exception $e) {
            $success = false;
        }

        ?>
        </p>
    </div>
</div>

<?php if ($success): ?>

    <div class="row mt-3">
        <div class="col-sm-6 rounded bg-dark text-white p-4">
            <img class="mb-3" src="./images/<?php echo $image ?>" alt="Not yet set.">
            <h3>
                <?php echo $name; ?>
            </h3>

            <p class="mt-3">&dollar;
                <?php echo $price; ?>
            </p>

            <p class="mt-3">
                <?php echo $description; ?>
            </p>
        </div>
<div class="col-sm-6">

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try {
            $query_type = $_POST["query_type"];

            if ($query_type == "update") {
                $item_id = $_POST["item_id"] ?? "";

                $sql = "SELECT
                            item.item_id, item.name, item.price, item.description, item.category, item.image, 
                            meta.meta_id, meta.description AS meta_table_description, meta.title, meta.keywords, meta.robots, meta.alt_text
                        FROM item
                        INNER JOIN meta
                        ON item.meta_id = meta.meta_id
                        WHERE item_id = :item_id";

                $statement = $db->prepare($sql);

                $statement->bindParam("item_id", $item_id);

                if ($statement->execute()) {
                    $items = $statement->fetchAll();
                    $statement->closeCursor();
                    $success = true;
                } else {
                    $success = false;
                }

                if ($success) {
                    $meta_id = $item["meta_id"] ?? "";
                    $name = $_POST["name"] ?? "";
                    $price = $_POST["price"] ?? "";
                    $category = $_POST["category"] ?? "";
                    $meta_table_description = $_POST["meta_table_description"] ?? "";
                    $title = $_POST["title"] ?? "";
                    $description = $_POST["description"] ?? "";
                    $keywords = $_POST["keywords"] ?? "";
                    $robots = $_POST["robots"] ?? "";
                    $alt_text = $_POST["alt_text"] ?? "";
                    foreach ($items as $item) {
                        $meta_id = $item["meta_id"] ?? "";
                        $meta_table_description = $item["meta_table_description"];
                        $title = $item["title"];
                        $keywords = $item["keywords"];
                        $robots = $item["robots"];
                        $alt_text = $item["alt_text"];
                    }
                }
            }
        } catch (Exception $e) {
        }
    }
    ?>

            <form action="finish.php" method="POST" enctype="multipart/form-data" class="form-control col-sm-6">
                <legend class="form-label mb-3">Add Meta Data</legend>

                <label for="meta_table_description" class="form-label">Meta Description </label>
                <input type="text" name="meta_table_description" id="meta_table_description" class="form-control"
                    maxlength="150" value="<?php echo $meta_table_description ?? "" ?>">

                <label for="description" class="form-label">Actual Product Description (Non-Meta)<small>(For
                        Page)</small></label>
                <input type="text" name="description" id="description" class="form-control"
                    value="<?php echo $description ?? "" ?>">

                <label for="title" class="form-label">Meta Title & Title</label>
                <input type="text" name="title" id="title" class="form-control" maxlength="70"
                    value="<?php echo $title ?? "" ?>">

                <label for="keywords" class="form-label">Keywords</label>
                <input type="text" name="keywords" id="keywords" class="form-control" maxlength="50"
                    value="<?php echo $keywords ?? "" ?>">

                <label for="alt_text" class="form-label">Image Alt Text</label>
                <input type="text" name="alt_text" id="alt_text" class="form-control" maxlength="125"
                    value="<?php echo $alt_text ?? "" ?>">

                <label for="robots" class="form-label">Robots</label><br>
                <input type="hidden" name="robots" id="robots" value="" maxlength="50" value="<?php echo $robots ?? "" ?>">

                <input type="checkbox" id="noindex" name="noindex" value="noindex" class="form-check-input"
                    onclick="checkRobots()">
                <label for="noindex">Don't Index Page </label><br>
                <input type="checkbox" id="nofollow" name="nofollow" value="nofollow" class="form-check-input"
                    onclick="checkRobots()">
                <label for="nofollow">Don't Follow Links</label><br>

                <input type="hidden" name="name" id="name" value="<?php echo $name ?>">
                <input type="hidden" name="price" id="price" value="<?php echo $price ?>">
                <input type="hidden" name="category" id="category" value="<?php echo $category ?>">
                <input type="hidden" name="image" id="image" value="<?php echo $image ?>">
                <input type="hidden" name="query_type" id="query_type" value="<?php echo $query_type ?? "" ?>">

                <input type="hidden" name="item_id" value="<?php echo $item_id ?? "" ?>">
                <input type="hidden" name="meta_id" value="<?php echo $meta_id ?? "" ?>">

                <button type="submit" value="Upload Image" name="submit" class="btn btn-secondary mt-3 mb-2">Finish</button>
            </form>
            </div>
        </div>
    </div>

<?php endif;
include ("footer.php"); ?>

<script>
    function checkRobots() {
        let noindex = document.getElementById("noindex");
        let nofollow = document.getElementById("nofollow");
        let robots = document.getElementById("robots");

        if (noindex.checked && nofollow.checked) {
            robots.value = "noindex, nofollow";
        } else {
            robots.value = "";
        }
        if (!noindex.checked && nofollow.checked) {
            robots.value = "nofollow";
        } else if (noindex.checked && !nofollow.checked) {
            robots.value = "noindex";
        }
    }
</script>