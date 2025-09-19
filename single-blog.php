<?php
get_header();
?>
<?php
while (have_posts()) {
    the_post(); ?>
    <section class="blogpostSingleHeroSection">
        <div class="descriptionBlogpost">
            <h1 class="headline headlineBlogpost">
                <?php
                the_title();
                ?>

            </h1>
            <!---obs der står ikke en dato, men synes der skal være en på vores site-->
            <div class="timeDifficulty">
                <p class="time"><?php
                                the_field('time');
                                ?>
                </p>
                <p class="Author">by <?php

                                        //kigger ind i arrayet user
                                        $forfatter = get_field('authoralimento');
                                        //vi printer arrayet ud for at se hvilken key vi skal bruge for kun at få navnet ud. 
                                        // echo '<pre>';
                                        // print_r($forfatter);
                                        // echo '</pre>';
                                        echo $forfatter['display_name'];

                                        ?>
                </p>
            </div>
            <br>
            <p>
                <?php the_field('description');
                ?>

            </p>
            <br>
        </div>
        <div>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
        </div>
    </section>

    <article class="mainContentSingleBlog">
        <div class="allBlogContent">
            <div class="blogContent">
                <h2 class="blogContent1Headline"><?php the_field('headline1');
                                                    ?>
                </h2>
                <p class="blogContent1">
                    <?php
                    the_field('blog_content1');
                    ?>

                </p>
                <!--flere har ikke billeder her, nogen har.-->
                <img class="blogimage1" src="" alt="" />
            </div>
            <div class="blogContent">
                <h2 class="blogContent2Headline"><?php
                                                    the_field('headline2');
                                                    ?></h2>
                <img
                    class="blogimage2"
                    src="<?php the_field('image2'); ?>"
                    alt="" />
                <p class="blogContent2">
                    <?php the_field('blog_content2');
                    ?>

                </p>
            </div>
            <div class="blogContent">
                <h2 class="blogContent2Headline"><?php
                                                    the_field('headline3');
                                                    ?></h2>
                <p class="blogContent3">
                    <?php the_field('blog_content3');
                    ?>
                </p>
                <img class="blogimage3" src="<?php the_field('image3'); ?>" alt="" />
            </div>
            <div class="blogContent">
                <h2 class="blogContent4Headline">
                    <?php the_field('headline4');
                    ?>
                </h2>
                <img
                    class="blogimage4"
                    src="<?php the_field('image4'); ?>"
                    alt="" />
                <p class="blogContent4">
                    <?php the_field('blog_content5');
                    ?>
                </p>
            </div>
            <div class="blogContent">
                <h2 class="blogContent5Headline"><?php the_field('headline5');
                                                    ?></h2>
                <p class="blogContent5">
                    <?php the_field('blog_content5');
                    ?>

                </p>
            </div>
        </div>



    <?php
}
    ?>




    <!--aside her-->


    <aside>
        <h2>Related Blog posts</h2>
        <?php
        //vi laver en custom query, da vi er interessert i at hente vores blogs
        $blog = new WP_Query(array(
            //vi vil have post types der hedder blog
            'post_type' => 'blog',
            'posts_per_page' => 3
        ));

        while ($blog->have_posts()) {
            $blog->the_post(); ?>

            <a href="<?php the_permalink(); ?>">
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
                    <span class="spanButton">Get inspired</span>
                </div>
            </a>
        <?php
        }
        ?>

    </aside>
    </article>

    <?php
    get_footer();
    ?>