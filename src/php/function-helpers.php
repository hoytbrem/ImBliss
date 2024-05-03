<?php
/**
 * Returns a directory prefix for sub-level location;
 * useful for dynamically changing where paths are 
 * located for static objects/elements.
 * @param int $level the sub-domain level you're in (0 = root, 1 = ../ or 1 level down, 2 = ../../, etc.)
 * @return string the appropriate prefix for the given sub-domain level in the path.
 */
function getDirLevel(int $level)
{
    if ($level == 0)
        return "./";

    $directoryLevel = str_repeat("../", (int) $level);

    ?>
    <script>
    var dirLevel = "<?php echo $directoryLevel ?>"; 
    </script>
    <?php

    return $directoryLevel;
}