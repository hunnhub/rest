<?php

namespace humhub\modules\quicknotes;

use Yii;

class Module extends \humhub\components\Module
{
    public function getName()
    {
        return Yii::t("QuicknotesModule.base", "Quick Notes");
    }

    public function getDescription()
    {
        return Yii::t("QuicknotesModule.base", "Simple Notes App for Learning HumHub");
    }

}