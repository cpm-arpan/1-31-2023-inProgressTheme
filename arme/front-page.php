<?php get_header(); ?>

<!-- Mashead header-->
<header class="masthead">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-<?php echo (!empty(get_theme_mod('set_main_img_pos')) ? get_theme_mod('set_main_img_pos') : "2")?>">
                <!-- Mashead text and app badges-->
                <div class="mb-5 mb-lg-0 text-center text-lg-start">
                    <h1 class="display-1 lh-1 mb-3">
                        <?php
                        $abt = get_theme_mod('arme-banner-title');
                        if (!empty($abt)):
                            echo get_theme_mod('arme-banner-title');
                        else:
                            echo get_theme_mod('arme-banner-title','');
                        endif;
                        ?>
                    </h1>
                    <p class="lead fw-normal text-muted mb-5">
                        <?php echo nl2br(__(get_theme_mod('arme-banner-content'))); ?>
                    </p>
                    <div class="d-flex flex-column flex-lg-row align-items-center">
                        <a class="me-lg-3 mb-4 mb-lg-0"
                            href="<?php echo get_theme_mod('arme-banner-badge1-url'); ?>"><img class="app-badge"
                                src="<?php echo get_theme_mod('arme-banner-badge1') ?>" alt="..." /></a>
                        <a href="<?php echo get_theme_mod('arme-banner-badge2-url'); ?>"><img class="app-badge"
                                src="<?php echo get_theme_mod('arme-banner-badge2') ?>" alt="..." /></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-3 ">
                <!-- Masthead device mockup feature-->
                <div class="masthead-device-mockup">
                    <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                <stop class="gradient-start-color" offset="0%"></stop>
                                <stop class="gradient-end-color" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <circle cx="50" cy="50" r="50"></circle>
                    </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                            transform="translate(120.42 -49.88) rotate(45)"></rect>
                        <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                            transform="translate(-49.88 120.42) rotate(-45)"></rect>
                    </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50"></circle>
                    </svg>
                    <div class="device-wrapper">
                        <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black"
                            style="background-image: url('<?php echo get_theme_mod('phone-frame') ?>')" >

                            <div class="screen bg-black">

                                <!-- PUT CONTENTS HERE:-->
                                <!-- * * This can be a video, image, or just about anything else.-->
                                <!-- * * Set the max width of your media to 100% and the height to-->
                                <!-- * * 100% like the demo example below.-->
                                <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%">
                                    <source src="<?php echo wp_get_attachment_url(get_theme_mod('phone-video')); ?>"
                                        type="video/mp4" />

                                </video>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Quote/testimonial aside-->
<?php $quote_section = get_theme_mod('Quote_section_radio', 'yes');
if ($quote_section == 'yes'): ?>

    <aside class="text-center bg-gradient-primary-to-secondary">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-8">
                    <div class="quotation_first h2 fs-1 text-white mb-4">
                        <?php echo get_theme_mod('arme-quote-content') ?>
                    </div>
                    <img src="<?php echo get_theme_mod('arme-quote-logo') ?>" alt="..." style="height: 3rem" />
                </div>
            </div>
        </div>
    </aside>
<?php endif; ?>

<?php 
 $customizer_repeater_example = get_theme_mod('customizer_repeater_example');
if(!empty(($customizer_repeater_example))):
   
    /*This returns a json so we have to decode it*/
    $customizer_repeater_example_decoded = json_decode($customizer_repeater_example);
    foreach ($customizer_repeater_example_decoded as $repeater_item) 
    { ?>
        <aside class="text-center bg-gradient-primary-to-secondary">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-8">
                    <div class="quotation_first h2 fs-1 text-white mb-4">
                        <?php echo $repeater_item->text; ?>
                    </div>
                    <img src="<?php echo get_theme_mod('arme-quote-logo') ?>" alt="..." style="height: 3rem" />
                </div>
            </div>
        </div>
    </aside>
    <?php }
endif; 
?>
<!-- App features section-->
<section id="features">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                <div class="container-fluid px-5">
                    <div class="row gx-5">
                        <div class="col-md-6 mb-5">
                            <!-- Feature item-->
                            <div class="text-center">
                                <i class="bi-phone icon-feature text-gradient d-block mb-3"></i>
                                <h3 class="font-alt">
                                    <?php echo get_theme_mod('arme-first-title') ?>
                                </h3>
                                <p class="text-muted mb-0">
                                    <?php echo nl2br(get_theme_mod('arme-first-content')); ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-5">
                            <!-- Feature item-->
                            <div class="text-center">
                                <i class="bi-camera icon-feature text-gradient d-block mb-3"></i>
                                <h3 class="font-alt">
                                    <?php echo get_theme_mod('arme-second-title') ?>
                                </h3>
                                <p class="text-muted mb-0">
                                    <?php echo nl2br(get_theme_mod('arme-second-content')); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-5 mb-md-0">
                            <!-- Feature item-->
                            <div class="text-center">
                                <i class="bi-gift icon-feature text-gradient d-block mb-3"></i>
                                <h3 class="font-alt">
                                    <?php echo get_theme_mod('arme-third-title') ?>
                                </h3>
                                <p class="text-muted mb-0">
                                    <?php echo nl2br(get_theme_mod('arme-third-content')); ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Feature item-->
                            <div class="text-center">
                                <i class="bi-patch-check icon-feature text-gradient d-block mb-3"></i>
                                <h3 class="font-alt">
                                    <?php echo get_theme_mod('arme-fourth-title') ?>
                                </h3>
                                <p class="text-muted mb-0">
                                    <?php echo nl2br(get_theme_mod('arme-fourth-content')); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-0">
                <!-- Features section device mockup-->
                <div class="features-device-mockup">
                    <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                <stop class="gradient-start-color" offset="0%"></stop>
                                <stop class="gradient-end-color" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <circle cx="50" cy="50" r="50"></circle>
                    </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                            transform="translate(120.42 -49.88) rotate(45)"></rect>
                        <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                            transform="translate(-49.88 120.42) rotate(-45)"></rect>
                    </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="50" cy="50" r="50"></circle>
                    </svg>
                    <div class="device-wrapper">
                        <div class="device" data-device="iPhoneX" data-orientation="portrait" data-color="black">
                            <div class="screen bg-black">
                                <!-- PUT CONTENTS HERE:-->
                                <!-- * * This can be a video, image, or just about anything else.-->
                                <!-- * * Set the max width of your media to 100% and the height to-->
                                <!-- * * 100% like the demo example below.-->
                                <video muted="muted" autoplay="" loop="" style="max-width: 100%; height: 100%">
                                    <source src="assets/img/demo-screen.mp4" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Basic features section-->
<section class="bg-light">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
            <div class="col-12 col-lg-5">
                <h2 class="display-4 lh-1 mb-4">
                    <?php echo get_theme_mod('arme-basic-featured-title') ?>
                </h2>
                <p class="lead fw-normal text-muted mb-5 mb-lg-0">
                    <?php echo nl2br(get_theme_mod('arme-basic-featured-content')); ?>
                </p>
            </div>
            <div class="col-sm-8 col-md-6">
                <div class="px-5 px-sm-0"><img class="img-fluid rounded-circle"
                        src="https://source.unsplash.com/u8Jn2rzYIps/900x900" alt="..." /></div>
            </div>
        </div>
    </div>
</section>
<!-- Call to action section-->
<section class="cta">
    <div class="cta-content">
        <div class="container px-5">
            <h2 class="text-white display-1 lh-1 mb-4">
                <?php echo get_theme_mod('arme-CTA1') ?>
                <br />
                <?php echo get_theme_mod('arme-CTA2') ?>
            </h2>
            <a class="btn btn-outline-light py-3 px-4 rounded-pill" href="<?php echo get_theme_mod('arme-CTA4'); ?>"
                target="_blank"><?php echo get_theme_mod('arme-CTA3') ?></a>
        </div>
    </div>
</section>
<!-- App badge section-->
<section class="bg-gradient-primary-to-secondary" id="download">
    <div class="container px-5">
        <h2 class="text-center text-white font-alt mb-4">
            <?php echo get_theme_mod('get-app-text'); ?>
        </h2>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
            <a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge"
                    src="<?php echo get_theme_mod('arme-getapp-badge-1'); ?>" alt="..." /></a>
            <a href="#!"><img class="app-badge" src="<?php echo get_theme_mod('arme-getapp-badge-2'); ?>"
                    alt="..." /></a>
        </div>
    </div>
</section>

<?php get_footer(); ?>