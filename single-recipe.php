<?php
get_header();
?>

<?php
while (have_posts()) {
    the_post(); ?>

    <section class="singleRecipeSection">
        <div class="recipeInfo">
            <h1 class="recipe_headline_single">Easy spaghetti carbonara</h1>
            <p class="description">
                <?php
                the_field('description');
                ?>

            </p>
            <div class="author_sektion">
                <img
                    class="author_image"
                    src="<?php $forfatter = get_field('authoralimento');
                            echo $forfatter['user_avatar'];
                            ?>"
                    alt="billede Ellis" />
                <a href="#"> <?php
                                //kigger ind i arrayet user
                                $forfatter = get_field('authoralimento');
                                //vi printer arrayet ud for at se hvilken key vi skal bruge for kun at få navnet ud. 
                                // echo '<pre>';
                                // print_r($forfatter);
                                // echo '</pre>';
                                echo $forfatter['display_name'];
                                ?></a>
            </div>
            <div class="timeDifficultyPrint">
                <p class="time"><i class="fa-solid fa-clock"></i> Total time: <?php the_field('time'); ?></p>

                <p class="difficulty">Difficulty:
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
                <p><i class="fa-solid fa-print"></i> Print Recipe</p>
            </div>
        </div>

        <div>
            <img
                src="<?php the_post_thumbnail_url(); ?>"
                alt="image of spaghetti"
                class="recipeImage" />
        </div>
    </section>

    <section class="singleRecipeSection">
        <div>
            <h2 class="ingredients">Ingredients</h2>
            <ul>
                <li>
                    <?php
                    the_field('ingredients');
                    ?>

                </li>


            </ul>
        </div>

        <div>
            <h2 class="method">Method</h2>
            <p>
                <?php
                the_field('method');
                ?>

            </p>
        </div>
    </section>


<?php
}
?>



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
        // vi anvender the while loop
        while ($recipe->have_posts()) {
            $recipe->the_post(); ?>
            <div>
                <img
                    src="<?php the_post_thumbnail_url(); ?>"
                    alt="Image of a delicious air fryer cheesy chicken recipe" />
                <p class="cardHeadline"><?php
                                        the_title();

                                        ?>
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




<!--kommentarer her-->

<section class="comments">
    <div class="firstComment">
        <div class="user">
            <img
                src="./assets/images/ellis_barrie_1x1_(1).jpg"
                alt="billede af user" />
            <div>
                <p>Ellis Barrie</p>
                <p class="time">10.01.25</p>
                <p>Level: Home cook</p>
            </div>
        </div>
        <p>
            Wow! That recipe looks insanely delicious! How about adding some
            guanciale and making it a bit more like a carbonara?
        </p>
        <a href="#" class="answer">Answer</a>
    </div>

    <div class="secondComment">
        <div class="user">
            <img
                src="./assets/images/ellis_barrie_1x1_(1).jpg"
                alt="billede af user" />
            <div>
                <p>Ellis Barrie</p>
                <p class="time">10.01.25</p>
                <p>Level: Home cook</p>
            </div>
        </div>
        <p>
            Hmm...? That’s actually a good question, I haven’t tried that before,
            but it’s definitely something that needs to be tested!
        </p>
        <a href="#" class="answer">Answer</a>
    </div>

    <div class="writeAComment">
        <h3>Write a comment</h3>
        <input
            type="text"
            placeholder="Write your comment here"
            id="recipeComment" />
        <button type="submit">Send</button>
    </div>
</section>



<?php
get_footer();
?>