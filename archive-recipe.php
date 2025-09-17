<?php
get_header();
?>
<h1>achive recipe</h1>
<p>Her er en paragraf test</p>


<?php
while (have_posts()) {
    the_post();
    the_title();
} ?>



<?php
get_footer();
?>