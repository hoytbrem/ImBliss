<?php
require_once("../../src/php/connect-db.php");

$sql = "SELECT item.*, meta.alt_text as meta_alt_text FROM item INNER JOIN meta ON item.meta_id = meta.meta_id";

$statement = $db->prepare($sql);

if ($statement->execute()) {
    $item = $statement->fetchAll();
    $statement->closeCursor();
}

if (isset($_GET['sort'])) {
    if ($_GET['sort'] === 'low-to-high') {
        usort($item, function($a, $b) {
            return $a['price'] - $b['price'];
        });
    } elseif ($_GET['price'] === 'high-to-low') {
        usort($item, function($a, $b) {
            return $b['price'] - $a['price'];
        });
    }
}

$selectedFilters = isset($_GET['filters']) ? json_decode($_GET['filters']) : [];

$selectedFilters = json_decode($_GET['filters']);

$filteredData = array_filter($item, function($i) use ($selectedFilters) {
    return in_array($i['category'], $selectedFilters);
});

// If no filters are selected, it displays all items or else display all items the category filters match
if($selectedFilters != null){
    foreach ($filteredData as $i) {
        ?>
        <div class="col-md-6">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="../images/product-images/<?php echo $i["image"];?>" class="img-fluid rounded-start" alt="<?php echo $i["meta_alt_text"]; ?>" />
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $i["name"];?></h5>
                            <p class="card-text"><?php echo $i["description"];?></p>
                            <div class="d-flex justify-content-between">
                                <form action="view-product.php" method="GET">
                                    <input type="hidden" name="item_id" value="<?php echo $i["item_id"]; ?>">
                                    <button type="submit" class="btn btn-primary">View</a>
                                </form>
                                <button class="btn btn-success">Add to Cart</button>
                                <button class="btn btn-outline-danger bi bi-heart"></button>
                            </div>
                            <div class="mt-2">
                                <span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star"></span>
                                <!-- Add more stars as needed -->
                                <span class="ms-2">120 Reviews</span>
                                <p class="mt-1">$<?php echo number_format($i["price"], 2);?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}else{
    foreach ($item as $i) {
        ?>
        <div class="col-md-6">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="../images/product-images/<?php echo $i["image"];?>" class="img-fluid rounded-start" alt="<?php echo $i["meta_alt_text"]; ?>" />
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $i["name"];?></h5>
                            <p class="card-text"><?php echo $i["description"];?></p>
                            <div class="d-flex justify-content-between">
                                <form action="view-product.php" method="GET">
                                    <input type="hidden" name="item_id" value="<?php echo $i["item_id"]; ?>">
                                    <button type="submit" class="btn btn-primary">View</a>
                                </form>
                                <button class="btn btn-success">Add to Cart</button>
                                <button class="btn btn-outline-danger bi bi-heart"></button>
                            </div>
                            <div class="mt-2">
                                <span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star-fill"></span><span class="bi bi-star"></span>
                                <!-- Add more stars as needed -->
                                <span class="ms-2">120 Reviews</span>
                                <p class="mt-1">$<?php echo number_format($i["price"], 2);?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

?>