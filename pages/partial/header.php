<?php
function renderHeader($page_title, $needsDatabase = false)
{
   // global grabs the variable after it from the global scope, which $dirLevel is not within the scope normally here.
  global $dirLevel;
  $php_page_name ??= basename($_SERVER["PHP_SELF"], ".php");
  $php_page_name = preg_replace_callback('/(-)|(\b[a-z])/', function ($matches) {

    if (!empty ($matches[1])) { // If the match is a hyphen

      return " "; // Replace it with a space

    } else { // If the match is the first letter of a word
      
      return strtoupper($matches[0]); // Capitalize it
    }
  }, $php_page_name);

  $js_page_name ??= basename($_SERVER["PHP_SELF"], ".php");
  $js_page_name = preg_replace('/(\s+)|(-)/', "", $js_page_name);
  require("{$dirLevel}/src/php/connect-db.php");

  $php_page_name = $php_page_name == "Index" ? "Home" : $php_page_name ?>

  <script>
    var phpPage = "<?php echo strtolower($js_page_name); ?>";
  </script>

  <title><?php echo !str_contains(ucfirst($page_title), $php_page_name) ? $php_page_name : $page_title ?></title>
  <meta name="title" content="ImBliss :: Healthy, nutritious, and absolutely delicious snacks." />
  <meta name="description"
    content="We sell environmentally friendly, home-grown snacks & treats that serve as a delicious reminder that healthy doesn't have to taste bad at all." />
  <meta name="keywords" content="healthy, snacks, nutritious" />

  <!-- Bootstrap Core -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>theme/style.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>theme/normalize.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>theme/stylesheet.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>theme/sage-styles.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>theme/nav/account-context.css" />
  <!-- Cart Styles -->
  <link rel="stylesheet" href="<?php echo $dirLevel ?>theme/cart/cart.css">

  <!-- Scripts -->


  <!-- Cart JavaScript -->
  <script src="<?php echo $dirLevel ?>src/js/cart.js"></script>
  <script src="<?php echo $dirLevel ?>src/js/function-helpers.js"></script>
  <script src="<?php echo $dirLevel ?>src/js/Item.js"></script>
  <script src="<?php echo $dirLevel ?>src/js/imbliss.js" defer></script>

<?php // <!-- "Global" variables --> 
}

?>
