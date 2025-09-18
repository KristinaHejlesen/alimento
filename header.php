<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    wp_head();

    ?>

</head>

<body>
    <header>
        <nav>
            <div class="globalNavTop">
                <a id="logo" href="<?php echo site_url(); ?>">Alimento</a>

                <div id="searchBar">
                    <input type="text" placeholder="Search here..." />
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <a id="login" href="#">Log in <i class="fa-regular fa-user"></i></a>
                <button id="burgerMenu"><i class="fa-solid fa-bars"></i></button>
            </div>

            <div class="globalNavBottom">
                <div class="topSectionMobileNav">
                    <div id="searchBarMobile">
                        <input type="text" placeholder="Search here..." />
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <a href="#">Log in <i class="fa-regular fa-user"></i></a>
                </div>

                <ul>
                    <li><a href="<?php echo site_url(); ?>">Front page</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('recipe'); ?>">Recipes</a></li>
                    <li><a href="#">Kitchen utensils</a></li>
                    <li><a href="<?php echo get_post_type_archive_link('blog'); ?>">Blog</a></li>
                    <li><a href="#">Tips & tricks</a></li>
                    <li><a href="#">About us</a></li>
                </ul>
            </div>
        </nav>
    </header>