<?php 
session_start();
if (isset($_SESSION["admin-login"]) && $_SESSION["admin-login"] == true) {
    } else {
        ?>
            <script>
                window.location.replace("login.php");
            </script>
        <?php
    }
include ("header.php") ?>
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
                        $name = $item["name"];
                        $price = $item["price"];
                        $category = $item["category"];
                        $meta_table_description = $item["meta_table_description"];
                        $title = $item["title"];
                        $description = $item["description"];
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

    <form action="upload.php" method="POST" enctype="multipart/form-data" class="form-control">
        <legend class="form-label mb-3"><?php 
        if (isset($query_type)) {
            switch ($query_type) {
                case "update":
                    echo "Update Product";
                    break;
            }
        } else {
            echo "Upload New Product";
        }
        ?></legend>

        <label for="name" class="form-label">Product Name:</label>
        <input type="text" required name="name" id="name" class="form-control" maxlength="255"
            value="<?php echo $name ?? "" ?>">

        <label for="price" class="form-label">Price:</label>
        <input type="number" required step=".01" min="0" name="price" id="price" class="form-control"
            value="<?php echo (float) $price ?? 0.00 ?>">

        <label for="description" class="form-label">Production Description</label>
        <input type="text" required name="description" id="description" class="form-control"
            value="<?php echo $description ?? "" ?>">

        <label for="category" class="form-label">Category: <small style="font-weight: bolder;">Lowercase Only (refer to
                spreadsheet)</small></label>
        <input type="text" required name="category" id="category" class="form-control"
            value="<?php echo $category ?? "" ?>">

        <label for="image" class="form-label">Select Image</label>
        <input type="file" required name="image" id="image" class="form-control">

        <?php if (isset($image)): ?>
            <img src="./images/<?php echo $image ?? "" ?>" alt="<?php echo $alt_text ?? "" ?>">
        <?php endif ?>
        <input type="hidden" name="meta_table_description" value="<?php echo $meta_table_description ?? "" ?>">
        <input type="hidden" name="title" value="<?php echo $title ?? "" ?>">
        <input type="hidden" name="keywords" value="<?php echo $keywords ?? "" ?>">
        <input type="hidden" name="robots" value="<?php echo $robots ?? "" ?>">
        <input type="hidden" name="alt_text" value="<?php echo $alt_text ?? "" ?>">
        <input type="hidden" name="item_id" value="<?php echo $item_id ?? "" ?>">
        <input type="hidden" name="query_type" value="<?php echo $query_type ?? "insert" ?>">

        <button type="submit" value="Upload Image" name="submit" class="btn btn-secondary mt-3 mb-2"><?php
        if (isset($query_type)) {
            switch ($query_type) {
                case "update":
                    echo "Proceed with Updating";
                    break; 
            }
        } else {
            echo "Upload & Continue";
        }
        ?></button>
    </form>
</div>
<?php include ("footer.php") ?>