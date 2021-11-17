<?php
declare(strict_types=1);

use NanoSoup\Zeus\Wordpress\Dashboard;
use NanoSoup\Zeus\Wordpress\Duplicate;
use NanoSoup\Zeus\Wordpress\OptimiseWP;
use NanoSoup\Zeus\Wordpress\Yoast;

use WPSKL\Admin\Optimise;
use WPSKL\App;
use WPSKL\Kernel;
use WPSKL\Wordpress\ImageManager;
use WPSKL\Wordpress\ManifestManager;
use WPSKL\Wordpress\StyleManager;
use WPSKL\Wordpress\ThemeManager;
use WPSKL\Wordpress\Twig;

include_once __DIR__ . '/vendor/autoload.php';

/**
 * This gets the more modern wp framework initiated
 * Register all your classes
 */
$kernel = new Kernel();
$kernel->registerClasses(
    [
        ImageManager::class,
        Dashboard::class,
        Duplicate::class,
        OptimiseWP::class,
        Twig::class,
        Yoast::class,
        Optimise::class,
        StyleManager::class,
        ThemeManager::class,
        ManifestManager::class,
    ]
);

/**
 * Start the app
 */
$app = new App($kernel);
$app->start();
