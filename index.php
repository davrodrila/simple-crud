<?php
require_once('controller/UserController.php');

// Very simple bootstrap for our UserController.
// A more sane way of doing this will be to check for URLs and have the controllers mapped to diferent url prefixes for example.
// As it stands although it works, you lose seo-friendly URLS as well as being nagged about form resend in certain browsers, but it works for demonstration purposes.
// With that in mind, I made the basic interface "Controller" to require the map method to all controllers, so they are interchangeable, so it's easier to have interchangeable controllers
$controller = new UserController();
$controller->map();