<?php
/**
 * Returns a directory prefix for sub-level location;
 * useful for dynamically changing where paths are 
 * located for static objects/elements.
 * @param int $level the sub-domain level you're in (1 = root, 2 = ./folder, etc.)
 * @return string the appropriate prefix for the given sub-domain level in the path.
 */
function getDirLevel (int $level) {
    // if ($level == 1)
    //     return "./";

    return str_repeat("../", (int)$level);
}