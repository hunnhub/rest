<?php

use humhub\modules\quicknotes\Events;
use humhub\modules\quicknotes\Module;
use humhub\widgets\TopMenu;

return [
    'id' => 'quicknotes',
    'class' => Module::class,
    'namespace' => 'humhub\modules\quicknotes',
    'events' => [
        [
            'class' => TopMenu::class,
            'event' => TopMenu::EVENT_INIT,
            'callback' => [Events::class, 'onTopMenuInit']
        ]
    ]
];
