<?php
get_header();
?>
<section class="introSection">
    <h1 class="archiveH1">All recipes</h1>
    <p class="introText">
        Here you will find various delicious recipes. All recipes are developed
        by passionate chefs of different skill levels, with the sole purpose to
        inspire people to share and make delicious food.
    </p>
    <a href="#">Filter</a>
</section>

<section class="cardSection">
    <div class="cardWrapper">
        <?php
        //vi laver en custom query, da vi er interessert i at hente vores recipes
        $recipeSite = new WP_Query(array(
            //vi vil have post types der hedder recipe
            'post_type' => 'recipe',
            'posts_per_page' => 6,
        ));
        while ($recipeSite->have_posts()) {
            $recipeSite->the_post(); ?>

            <div>
                <img
                    src="<?php the_post_thumbnail_url(); ?>"
                    alt="Image of a delicious air fryer cheesy chicken recipe" />
                <p class="cardHeadline"><?php
                                        echo wp_trim_words(get_the_title(), 5); ?>


                </p>
                <div class="timeDifficulty">
                    <p>Total time: <?php
                                    the_field('time');
                                    ?>
                        <!--Vi tjekker efter om brugeren har valgt home cook, ameture cook o.s.v. Gemmer acf feltet i en variabel $difficulty og henter feltet. lavet et if statment og spørger om $difficulty == 'home cook'-->
                        | Difficulty:
                        <?php
                        $difficulty = get_field('difficulty'); ?>
                        <?php
                        if ($difficulty == 'Home cook') {
                            echo '<span class="material-symbols-outlined"> chef_hat </span>';
                        } else if ($difficulty == 'Amature cook') {
                            echo '<span class="material-symbols-outlined"> chef_hat </span>';
                            echo '<span class="material-symbols-outlined"> chef_hat </span>';
                        } else if ($difficulty == 'Professional cook') {
                            echo '<span class="material-symbols-outlined"> chef_hat </span>';
                            echo '<span class="material-symbols-outlined"> chef_hat </span>';
                            echo '<span class="material-symbols-outlined"> chef_hat </span>';
                        } else {
                            echo '<p> no difficulty set</p>';
                        }
                        ?>

                    </p>
                </div>
                <div class="rating">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <!--vi anvender the_permalink() til at hente linket til det specifikke post her recipe-->
                <a href="<?php the_permalink(); ?>">Try recipe today</a>
            </div>
        <?php
        }
        ?>
    </div>


    <?php
    /*tilføjer links i bunden af siden */
    echo paginate_links();
    ?>
</section>

<?php
wp_reset_postdata();
?>

<!--blogposts-->
<section class="cardSection">
    <h2>Find inspiration from the latest blog posts:</h2>
    <div class="cardWrapper">
        <?php
        //vi laver en custom query, da vi er interessert i at hente vores recipes
        $blog = new WP_Query(array(
            //vi vil have post types der hedder recipe
            'post_type' => 'blog',
            'posts_per_page' => 3
        ));

        while ($blog->have_posts()) {
            $blog->the_post(); ?>
            <div>
                <img
                    src="<?php the_post_thumbnail_url(); ?>" />
                <p class="cardHeadline"><?php echo wp_trim_words(get_the_title(), 7);

                                        ?>
                </p>
                <div class="timeDifficulty">
                    <p>Forfatter: <?php
                                    //kigger ind i arrayet user
                                    $forfatter = get_field('authoralimento');
                                    //vi printer arrayet ud for at se hvilken key vi skal bruge for kun at få navnet ud. 
                                    // echo '<pre>';
                                    // print_r($forfatter);
                                    // echo '</pre>';
                                    echo $forfatter['display_name'];
                                    ?>
                        <br>Dato: <?php
                                    the_field('date');
                                    ?>

                    </p>
                </div>
                <a href="<?php the_permalink(); ?>">Get inspired</a>
            </div>

        <?php
        }
        ?>
    </div>
</section>


<?php
get_footer();
?>