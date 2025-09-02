<?php
//Enable strict typing (first line of your PHP file)
declare(strict_types=1);

// Create a namespace
namespace App;

// Use a namespace
use App\Product;

// Include a PHP file
require 'app/Product.php';

// PHP echo
/* <?php
 * echo "Hello World";
 * ?>
*/
// if no closing tag the rest of the file will be considered PHP

// Short syntax for PHP echo
/* <?= "Hello World" ?> */

// Variable in camelCase
$firstName = 'Mike';  // camelCase

// Function in camelCase
function updateProduct() {
    // function body
}

// Class in StudlyCaps
class ProductItem {
    // class body
}

// Constant in all upper case with underscore separators
const ACCESS_KEY = '123abc'; // all upper case with underscore separators