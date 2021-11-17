<?php
/**
 * Page not found :: 404
 */

use Timber\Timber;

$context = Timber::get_context();
$context['error']['message'] = 'Page not found';

Timber::render('views/error.twig', $context);
