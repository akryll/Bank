<?php

/**
 * Description of newPHPClass
 *
 * @author akryll
 */
namespace akryll;
class Document {

    public $doctype;
    public $inbankid;
    public $docdate;
    public $summ;
    public $outdate;
    public $indate;
    public $payeraccount;
    public $payerinfo;
    public $payerinn;
    public $payer;
    public $payerdealaccount;
    public $payerbank1;
    public $payerbank2;
    public $payerbik;
    public $payerfixaccount;
    public $recieveraccount;
    public $recieverinfo;
    public $recieverinn;
    public $reciever1;
    public $recieverdealaccount;
    public $recieverbank1;
    public $recieverbank2;
    public $recieverbik;
    public $recieverfixaccount;
    public $paytype;
    public $paydirection;
    public $makerstatus;
    public $payerkpp;
    public $recieverkpp;
    public $showerkbk;
    public $okato;
    public $showerfundament;
    public $showerperiod;
    public $showernumber;
    public $showerdate;
    public $showertype;
    public $paymentperiod;
    public $quenue;

    public function __construct() {
        
    }

    public function rules($rule) {
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
        return $rules[$rule];
    }

    public function set($section, $param) {
        $rulled = $this->rules($section);
        $this->$rulled = $param;
    }

}
?>