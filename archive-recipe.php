<?php
get_header();
?>
<h1>achive recipe</h1>
<p>Her er en paragraf test</p>

<h1>All recipes</h1>
<p>Here you will find various delicious recipes. All recipes are developed by passionate chefs of different skill levels,
    with the sole purpose to inspire people to share and make delicious food.</p>
<a href="#">Filter</a>

<?php
while (have_posts()) {
    the_post(); ?>
    <section class="cardSection">

        <div class="cardWrapper">
            <div>
                <img src="./assets/images/air_fryer_cheesy_chicken.jpg"
                    alt="Image of a delicious air fryer cheesy chicken recipe" />
                <p class="cardHeadline"><?php
                                        the_title();
                                        ?>
                </p>
                <div class="timeDifficulty">
                    <p>Total time: 40 min | Difficulty:</p>
                    <span class="material-symbols-outlined"> chef_hat </span>
                </div>
                <div class="rating">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <a href="#">Try recipe today</a>
            </div>
        </div>
    </section>
    <!-- <section class="cardSection">
        <div class="cardWrapper">
            <div>
                <img
                    src="./assets/images/air_fryer_cheesy_chicken.jpg"
                    alt="Image of a delicious air fryer cheesy chicken recipe" />
                <p class="cardHeadline">Air fryer cheesy chicken with bacon</p>
                <div class="timeDifficulty">
                    <p>Total time: 40 min | Difficulty:</p>
                    <span class="material-symbols-outlined"> chef_hat </span>
                </div>
                <div class="rating">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <a href="#">Try recipe today</a>
            </div>
        </div>
    </section> -->
<?php
    //disse virker
    // the_title();
    // the_field('description');
} ?>



<?php
get_footer();
?>