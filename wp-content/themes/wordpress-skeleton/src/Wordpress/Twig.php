<?php

namespace WPSKL\Wordpress;

use JetBrains\PhpStorm\ArrayShape;

/**
 *
 */
class Twig
{
    /**
     * Twig constructor.
     */
    public function __construct()
    {
        add_filter('timber_context', [$this, 'addToContext']);
    }

    /**
     * This adds stuff to the global context - note this is run on EVERY page
     * so only put in what is really needed AND can't be done via the controller
     *
     * @param $context
     * @return array
     */
    public function addToContext($context): array
    {
        $context['menus'] = $this->getMenus();
        return $context;
    }

    #[ArrayShape(['primary' => "false|string|void", 'footer' => "array"])]
    public function getMenus(): array
    {
        return [
            'primary' => wp_nav_menu([
                'menu' => 'primary-test',
                'container' => '',
                'echo' => false,
                'menu_class' => 'header__nav header__container',
                'walker' => new BEMMenuWalker('nav')
            ]),
            'footer' => [
                'tail' => wp_nav_menu([
                    'menu' => 'footer-metamenu',
                    'echo' => false,
                    'container' => '',
                    'menu_class' => 'nav footer__subnav',
                    'walker' => new BEMMenuWalker('nav')
                ])
            ]
        ];
    }
}

