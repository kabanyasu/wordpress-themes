<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="合同会社オントロジーのホームページ">
    <!--
    <link href="<?php get_template_directory_uri(); ?>/wp-content/themes/ontology/common.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php get_template_directory_uri(); ?>/wp-content/themes/ontology/blog.css">
    -->
    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <div class="header-inner">
            <a class="header-logo" href="./index.html">
                <img src="<?php get_template_directory_uri(); ?>/wp-content/themes/ontology/images/common/logo-header.png" alt="会社ロゴ">
            </a>
            <button class="toggle-menu-button"></button>
            <div class="header-site-menu">
                <nav class="site-menu">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="title">
            <?php if (is_month()) : ?>
                <h1>月別アーカイブ:「<?php echo get_the_date('Y年n月'); ?>」の検索結果</h1>
                <p><?php echo get_the_date('Y年n月'); ?>に限定した記事を表示しています。</p>
            <?php else : ?>
                <h1>カテゴリー別アーカイブ:「<?php single_term_title(); ?>」の検索結果</h1>
                <p><?php single_term_title(); ?>に限定した記事を表示しています。</p>
            <?php endif; ?>
            </h1>
        </div>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) :
                the_post(); ?>
                <div class="blog">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('achive_thumbnail'); ?>
                        <?php else : ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php get_template_directory_uri(); ?>/wp-content/themes/ontology/images/concept/img-item01.gif" alt="コーヒーを入れている画像">
                            </a>
                        <?php endif; ?>
                        <div class="blog-text">
                            <a href="<?php the_permalink(); ?>">
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <div class="blog-info">
                                <div class="blog-tag">
                                    <a href="">
                                        <?php the_category(); ?>
                                    </a>
                                </div>
                                <div class="blog-time">
                                    <?php
                                    $year = get_the_date('Y');
                                    $month = get_the_date('m');
                                    ?>
                                    <a href="<?php echo get_month_link($year, $month); ?>">
                                        <time datetime="<?php the_time('Y-m-d'); ?>">
                                            <?php the_time('Y-m-d'); ?>
                                        </time>
                                    </a>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>">
                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                            </a>
                        </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="pagination">
            <?php
            $paginationhtml = get_the_posts_pagination();
            echo preg_replace('/\<h2 class=\"screen-reader-text\"\>(.*?)\<\/h2\>/ui', '', $paginationhtml);
            ?>
        </div>
    </main>
    <?php get_footer(); ?>