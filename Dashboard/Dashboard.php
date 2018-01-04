<?php

declare(strict_types=1);

/*
 * This file is part of Mindy Framework.
 * (c) 2018 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mindy\Bundle\DashboardBundle\Dashboard;

use Mindy\Template\TemplateEngine;

class Dashboard
{
    /**
     * @var array
     */
    protected $widgets = [];

    /**
     * @var TemplateEngine
     */
    protected $template;

    /**
     * Dashboard constructor.
     *
     * @param TemplateEngine $template
     */
    public function __construct(TemplateEngine $template)
    {
        $this->template = $template;
    }

    /**
     * @param WidgetInterface $widget
     */
    public function addWidget(WidgetInterface $widget)
    {
        $this->widgets[] = $widget;
    }

    /**
     * @return array
     */
    public function getWidgets()
    {
        return array_map(function ($widget) {
            return $this->template->render($widget->getTemplate(), $widget->getData());
        }, $this->widgets);
    }
}
