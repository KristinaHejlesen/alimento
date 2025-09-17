<?php
get_header();
?>
<h1>dette er vores front-page.php</h1>
<?php
while (have_posts()) {
    the_post();
    the_title();
}
?>

<?php
get_footer();
?>