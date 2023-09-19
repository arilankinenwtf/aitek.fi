<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>

<div class="video-wrapper">
    <video autoplay muted loop playsinline>
        <source src="/application/files/3016/9512/8646/tausta.mp4" type="video/mp4">
    </video>
</div>

<main class="main-content" id="main-content">
    <?php
    $a = new Area('Main');
    $a->enableGridContainer();
    // tai $a->setAreaGridMaximumColumns(12);
    $a->display($c);
    ?>
</main>
<?php  $this->inc('elements/footer.php'); ?>
