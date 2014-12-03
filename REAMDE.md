Bank
====
Это расширение добавляет Парсер 1С БанкКлиент файлов.
### Установка

```
Добавить "akryll/bank": "dev-master" в composer.json
или выполнить composer require akryll/bank "dev-master"

```

Создаем контроллер и добавляем в него следующее:

```
use akryll\Bank;
use yii\web\UploadedFile;

//...
    public function actionUpload() {
        $model = new BankForm();
        $uploaded = '';
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->validate()) {
                $file = 'export_' . rand(0, 999) . '.' . $model->file->extension;
                $model->file->saveAs('uploads/' . $file);
                return $this->redirect(['parse', 'file' => $file]);
            }
        }

        return $this->render('upload', ['model' => $model, 'uploaded' => $uploaded,]);
    }
    public function actionParse($file) {
        $filewr = 'uploads/' . $file;
        $bank = new Bank($filewr);
        $docs = $bank->getDocs();
        $vars = get_class_vars('akryll\Document');
        //Проверка правильности работы
		var_dump($vars);// Перечень свойств
		var_dump($docs);// Дамп всех документов
    }
//...
```
Создаем модели:

```
//BankForm.php
<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class BankForm extends Model {

    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;
    public $image;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['file'], 'file'],
        ];
    }

}

?>

```
Создаем простую view для загрузки файла:

```
<?php
// Upload.php
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'file')->fileInput() ?>

<button>Submit</button>

<?php ActiveForm::end(); ?>

```
Готово! Модель для сохранения нужных данных создать так сказать "по вкусу".

Перечень свойств объекта возвращаемого ```getDocs()```:

```
        $rules = [
            'СекцияДокумент' => 'doctype',
            'Номер' => 'inbankid',
            'Дата' => 'docdate',
            'Сумма' => 'summ',
            'ДатаСписано' => 'outdate',
            'ДатаПоступило' => 'indate',
            'ПлательщикСчет' => 'payeraccount',
            'Плательщик' => 'payerinfo',
            'ПлательщикИНН' => 'payerinn',
            'Плательщик1' => 'payer',
            'ПлательщикРасчСчет' => 'payerdealaccount',
            'ПлательщикБанк1' => 'payerbank1',
            'ПлательщикБанк2' => 'payerbank2',
            'ПлательщикБИК' => 'payerbik',
            'ПлательщикКорсчет' => 'payerfixaccount',
            'ПолучательСчет' => 'recieveraccount',
            'Получатель' => 'recieverinfo',
            'ПолучательИНН' => 'recieverinn',
            'Получатель1' => 'reciever1',
            'ПолучательРасчСчет' => 'recieverdealaccount',
            'ПолучательБанк1' => 'recieverbank1',
            'ПолучательБанк2' => 'recieverbank2',
            'ПолучательБИК' => 'recieverbik',
            'ПолучательКорсчет' => 'recieverfixaccount',
            'ВидОплаты' => 'paytype',
            'НазначениеПлатежа' => 'paydirection',
            'СтатусСоставителя' => 'makerstatus',
            'ПлательщикКПП' => 'payerkpp',
            'ПолучательКПП' => 'recieverkpp',
            'ПоказательКБК' => 'showerkbk',
            'ОКАТО' => 'okato',
            'ПоказательОснования' => 'showerfundament',
            'ПоказательПериода' => 'showerperiod',
            'ПоказательНомера' => 'showernumber',
            'ПоказательДаты' => 'showerdate',
            'ПоказательТипа' => 'showertype',
            'СрокПлатежа' => 'paymentperiod',
            'Очередность' => 'quenue',
        ];
```
getDocs(); возвращает массив объектов с данными.

Спасибо за внимание!
