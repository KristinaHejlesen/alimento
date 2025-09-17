<?php
get_header();
?>

<h1>Test side. Dette er forsiden/ archive-blog.php</h1>

<?php
while (have_posts()) {
    the_post();

    the_title();
} ?>
<?php
get_footer();
?>