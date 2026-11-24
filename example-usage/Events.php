<?php

namespace humhub\modules\quicknotes;

use humhub\helpers\ControllerHelper;
use humhub\modules\ui\menu\MenuLink;
use humhub\widgets\TopMenu;
use Yii;

class Events
{
    public static function onTopMenuInit($event)
    {
        if(Yii::$app->user->isGuest){
            return;
        }

        $menu = $event->sender;

        $menu->addEntry(new MenuLink([
            'id' => 'quicknotes',
            'label' => Yii::t('QuicknotesModule.base', 'Notes'),
            'url' => ['/quicknotes/index'],
            'icon' => 'pencil',
            // 'sortOrder' => 500,
            'isActive' => ControllerHelper::isActivePath("quicknotes")
        ]));
    }
}