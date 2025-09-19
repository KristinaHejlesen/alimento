<?php
get_header();
?>


<h1 class="blogTitle">Blog</h1>
<p class="blogDescription">
    Read and discover different aspects of food. Everything from “how to”
    videos and personal food stories, to the lastest food related trends.
</p>

<section class="blogposts">
    <div class="blogPostsWrapper">
        <?php
        while (have_posts()) {
            the_post(); ?>
            <div>
                <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
            </div>
            <div>
                <a href=" <?php the_permalink(); ?>">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                </a>
                <div class="timeDifficulty">
                    <p class="author">Forfatter: <?php
                                                    //kigger ind i arrayet user
                                                    $forfatter = get_field('authoralimento');
                                                    //vi printer arrayet ud for at se hvilken key vi skal bruge for kun at få navnet ud. 
                                                    // echo '<pre>';
                                                    // print_r($forfatter);
                                                    // echo '</pre>';
                                                    echo $forfatter['display_name'];
                                                    ?></p>
                    <p class="time">Dato: <?php
                                            the_field('date');
                                            ?></p>
                </div>
                <p class="description">
                    <?php
                    //hvis der en excerpt, anvend denne ellers udskriv description acf felt
                    if (has_excerpt()) {
                        echo get_the_excerpt();
                    } else {
                        //bruger wp functionen trim_words, til kun at vise 35 ord.
                        echo wp_trim_words(get_field('description'), 35);
                    };
                    ?>

                </p>
            </div>
        <?php
        } ?>
    </div>
</section>



<!--sektion med recipes -->


<section class="cardSection">
    <h2>Find delicious recipes</h2>
    <div class="cardWrapper">
        <?php
        //vi laver en custom query, da vi er interessert i at hente vores recipes
        $recipe = new WP_Query(array(
            //vi vil have post types der hedder recipe
            'post_type' => 'recipe',
            'posts_per_page' => 3
        ));

        while ($recipe->have_posts()) {
            $recipe->the_post(); ?>
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
</section>

<?php
get_footer();
?>