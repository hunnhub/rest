<?php

namespace humhub\modules\quicknotes\controllers;

use humhub\components\Controller;
use humhub\modules\quicknotes\models\Note;
use Yii;
use Yii\web\NotFoundHttpException;

class IndexController extends Controller
{
    protected function getAccessRules()
    {
        return [
            ['login'],
            ['post' => ['delete']]
        ];
    }

    public function actionIndex()
    {
        $model = new Note();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->view->saved();
            return $this->redirect(['index']);
        }

        $notes = Note::find()
            ->where(['created_by' => Yii::$app->user->id])
            ->orderBy(['id' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'model' => $model,
            'notes' => $notes
        ]);
    }

    public function actionDelete(int $id)
    {
        $note = Note::findOne(['id' => $id, 'created_by' => Yii::$app->user->id]);

        if ($note == null) {
            throw new NotFoundHttpException(Yii::t('QuicknotesModule.base', 'Note not found'));
        }

        $note->delete();
        $this->view->success(Yii::t('QuicknotesModule.base', 'Note is deleted successfully!!'));

        return $this->redirect(["index"]);
    }
}