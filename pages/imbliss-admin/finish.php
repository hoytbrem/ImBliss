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
include ("header.php"); ?>

<div class="col-sm-6 bg-light rounded">
    <?php

    try {

        $query_type = $_POST["query_type"];
        $item_id_delete = false;
        if ($query_type == "delete") {
            $item_id = $_POST["item_id"] ?? "";
        } else {
            $name = $_POST["name"];
            $price = $_POST["price"];
            $category = $_POST["category"];
            $image = $_POST["image"];
            $meta_table_description = $_POST["meta_table_description"];
            $title = $_POST["title"];
            $description = $_POST["description"];
            $keywords = $_POST["keywords"];
            $robots = $_POST["robots"];
            $alt_text = $_POST["alt_text"];
            $item_id = $_POST["item_id"] ?? "";
            $meta_id = $_POST["meta_id"] ?? "";
        }
        $success = true;
    } catch (Exception $e) {
        $success = false;
    }

    if ($success) {
        $sql;
        switch ($query_type) {
            
            case "insert":
                $sql = "INSERT INTO meta (description, title, keywords, robots, alt_text)
                        VALUES (:description, :title, :keywords, :robots, :alt_text)";
                break;

            case "update":
                $sql = "UPDATE meta
                        SET description = :description, title = :title, keywords = :keywords, robots = :robots, alt_text = :alt_text
                        WHERE meta_id = :meta_id";
                        break;

            case "delete":
                $sql = "DELETE FROM item
                        WHERE item_id = :item_id";
                        break;

            default:
                $success = false;
        }
        $statement = $db->prepare($sql);
        if ($success) {
            
            if ($query_type == "insert" || $query_type == "update") {
                $statement->bindParam(":description", $meta_table_description);
                $statement->bindParam(":title", $title);
                $statement->bindParam(":keywords", $keywords);
                $statement->bindParam(":robots", $robots);
                $statement->bindParam(":alt_text", $alt_text);
                if (isset($_POST["meta_id"]) && $query_type == "update") {
                    
                    $statement->bindParam("meta_id", $meta_id);
                    $item_id_update = true;
                }
            } else if ($query_type == "delete") {
                $statement->bindParam("item_id", $item_id);
                $item_id_delete = true;
            }
        }

        if ($statement->execute()) {
            $meta_id = ($item_id_update) ? $meta_id : $db->lastInsertId();
            $statement->closeCursor();
            echo "<h1 class='text-success m-3'>Success</h1>";
        } else {
            $success = false;
            echo "<h2 class='text-danger m-3'>Error occured inserting meta table for the product.</h2>";
        }

        if ($success) {
            switch ($query_type) {
                case "insert":
                    $sql = "INSERT INTO item (name, price, description, category, image, meta_id)
                    VALUES (:name, :price, :description, :category, :image, :meta_id)";
                    break;
                case "update":
                    $sql = "UPDATE item
                            SET name = :name, price = :price, description = :description, category = :category, image = :image
                            WHERE meta_id = :meta_id";
                    break;
                default:
                if ($item_id_delete) {
                    $success = true;
                }
                    $success = false;
            }

            if ($success) {
                $statement = $db->prepare($sql);
                $statement->bindParam(":name", $name);
                $statement->bindParam(":price", $price);
                $statement->bindParam(":description", $description);
                $statement->bindParam(":category", $category);
                $statement->bindParam(":image", $image);
                $statement->bindParam(":meta_id", $meta_id);

                if ($statement->execute()) {
                    $statement->closeCursor();
                    $success = true;
                } else {
                    $success = false;
                    echo "<h2 class='text-danger m-3'>Error inserting database query.</h2>";
                }
            } else if ($item_id_delete) {
                $success = true;
            } else {
                echo "<h2 class='text-danger m-3'>Missing information during item edit/insert.</h2>";
            }
        }
    }

    if ($success): ?>

        <div class="row rounded">
            <div class="col-sm-6 p-3 m-3 rounded">
                <h4 class='mb-3'>Successfully <?php
                    
                    switch ($query_type) {
                        case "update":
                            echo "Updated";
                            break;
                        case "insert":
                            echo "Inserted";
                            break;
                        case "delete":
                            echo "Deleted";
                            break;
                        default:
                            echo "Processed?";
                    }
                    ?> Product.
                </h4>

                <?php if ($query_type == "update") : ?>
                    <a href="../admin.php" class="btn btn-secondary">Return to Admin Panel</a>
                <?php else : ?>
                    <a href="admin-product-control.php" class="btn btn-secondary">Insert Another</a>
                <?php endif ?>
            </div>
        </div>

    <?php endif ?>
</div>