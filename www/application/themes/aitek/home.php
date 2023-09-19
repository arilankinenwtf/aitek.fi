<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); ?>



<main class="main-content" id="main-content">

<div class="video-wrapper">
    <video autoplay muted loop playsinline playbackRate="0.1">
        <source src="/application/files/3016/9512/8646/tausta.mp4" type="video/mp4">
    </video>
    <div class="dark-overlay"></div>
</div>

    <?php
    $a = new Area('Main');
    $a->enableGridContainer();
    // tai $a->setAreaGridMaximumColumns(12);
    $a->display($c);
    ?>
</main>
<?php  $this->inc('elements/footer.php'); ?>
