<?php

function renderHeader($page_title, $dirLevel)
{
  ?>
  <title><?php echo $page_title ?></title>
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
  <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>/theme/style.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>/theme/normalize.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $dirLevel ?>/theme/stylesheet.css" />
  <link rel="stylesheet" href="<?php echo $dirLevel ?>/theme/nav/account-context.css" />

  <!-- Scripts -->
  <script src="<?php echo $dirLevel ?>src/js/imbliss.js" defer></script>

<?php // <!-- "Global" variables --> 
}

?>