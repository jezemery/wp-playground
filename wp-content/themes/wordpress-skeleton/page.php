<?php

use Timber\Timber;

$context = Timber::get_context();
$context['page'] = Timber::get_post();

Timber::render('views/page.twig', $context);
