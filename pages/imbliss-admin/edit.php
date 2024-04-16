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
<section class="row">
    <div class="shadow col-sm-12 rounded p-4">

        <h3>Edit Menu Item</h3>
        <hr>
        <div class="row p-2">
            <?php
            $sql = "SELECT
                    item.item_id, item.name, item.price, item.description, item.category, item.image, 
                    meta.meta_id, meta.description AS meta_table_description, meta.title, meta.keywords, meta.robots, meta.alt_text
                FROM item
                INNER JOIN meta
                ON item.meta_id = meta.meta_id";
            $statement = $db->prepare($sql);

            if ($statement->execute()) {
                $items = $statement->fetchAll();
                $statement->closeCursor();
                $success = true;
            } else {
                $success = false;
            }

            if ($success) { ?>
                <?php
                $categories = array_column($items, "category");
                array_multisort($categories, SORT_ASC, $items);

                $categories = array_unique($categories);
                echo "<br>";
            
                $renderedSeparators = [];

                foreach ($categories as $category) { ?>

                    <?php if (!array_search($category, $renderedSeparators)) : ?>

                        <h3 class="p-2 rounded category-header mt-3">
                            <?php
                            $noSpaces = preg_replace('/\s+/', '', $category);
                            echo $category ?>
                        </h3>

                        <?php array_push($renderedSeparators, $category); endif; ?>

                    <table class="col-sm-12 rounded mb-4">
                        <tr>
                            <th>
                                Item Name
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Item Description
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Image
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        <?php
                        foreach ($items as $item) {
                            ?>



                            <?php if ($item["category"] == $category): ?>

                                <tr>
                                    <td class="item.name">
                                        <?php echo $item["name"] ?>
                                    </td>

                                    <td class="item.price">
                                        <?php echo $item["price"] ?>
                                    </td>

                                    <td class="item.description">
                                        <?php echo $item["description"] ?>
                                    </td>

                                    <td class="item.category">
                                        <?php echo $item["category"] ?>
                                    </td>

                                    <td class="item.image">
                                        <?php echo "filename: " . $item["image"] . "<br><br>" ?>
                                        <div class="d-flex justify-content-center">
                                            <img src="./images/<?php echo $item["image"]; ?>" alt="<?php echo $item["alt_text"]; ?>">
                                        </div>
                                    </td>

                                    <td class="actions">
                                        <div class="d-flex justify-content-center align-items-start">
                                            <form action="index.php" method="POST" class="w-50 d-flex justify-content-center">
                                            <input type="hidden" name="item_id" value="<?php echo $item["item_id"]; ?>">
                                            <input type="hidden" name="meta_id" value="<?php echo $item["meta_id"]; ?>">
                                                <input type="hidden" name="query_type" id="query_type" value="update">

                                                <input type="submit" class="btn btn-secondary imbliss-edit-button w-75" value="Edit">
                                            </form>
                                            <form action="finish.php" method="POST" class="w-50 d-flex justify-content-center">
                                                <input type="hidden" name="item_id" value="<?php echo $item["item_id"]; ?>">
                                                <input type="hidden" name="query_type" id="query_type" value="delete">

                                                <input type="submit" class="btn btn-secondary imbliss-edit-button w-75" onClick="return confirm('Really delete:\n\n<?php echo $item["name"] ?>?')" value="Delete">
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            <?php endif ?>
                            <?php
                        }
                        ?>
                        </table>
                        <?php
                }
                ?>
                
                <?php
            }
            ?>

        </div>
    </div>
</section>
<? include ("footer.php") ?>