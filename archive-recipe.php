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
        while (have_posts()) {
            the_post(); ?>
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
</section>





<?php
get_footer();
?>