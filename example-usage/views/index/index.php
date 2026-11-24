<?php

use humhub\helpers\Html;
use humhub\modules\quicknotes\models\Note;
use humhub\widgets\bootstrap\Button;
use humhub\widgets\form\ActiveForm;


$this->setPageTitle(Yii::t('QuicknotesModule.base', 'Quick Notes'));
?>

<?= Html::beginContainer() ?>
<div class="panel panel-default">

    <div class="panel-heading">
        <?= Yii::t("QuicknotesModule.base", '<strong>QUICK</strong> NOTES') ?>
    </div>

    <div class="panel-body">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model, 'message')->textarea(['rows' => 3, 'maxLength' => 255]) ?>
        <?= Button::save()->submit() ?>
        <?php ActiveForm::end() ?>
        
        <hr>

    <?php if (empty($notes)): ?>
            <p class="text-body-secondary"><?= Yii::t("QuicknotesModule.base", 'No notes yet.') ?></p>
    <?php else: ?>
            <ul class="list-unstyled mb-0">
                <?php foreach ($notes as $note): ?>
                        <li class="d-flex justify-content-between align-items-start gap-3 py-2 border-bottom">
                            <div>
                                <div><?= Html::encode($note->message) ?></div>
                                <small class="text-body-secondary">
                                    <?= Yii::$app->formatter->asRelativeTime($note->created_at) ?>
                                </small>
                            </div>

                            <?= Html::a(
                                Yii::t("QuicknotesModule.base", 'Delete'),
                                ['delete', 'id' => $note->id],
                                [
                                    'class' => 'btn btn-danger btn-sm',
                                    'data-method' => 'post',
                                    'data-confirm' => Yii::t("QuicknotesModule.base", 'Are you sure?')
                                ]
                            ) ?>
                        </li>
                <?php endforeach; ?>
            </ul>
    <?php endif ?>

</div>
<?= Html::endContainer() ?>