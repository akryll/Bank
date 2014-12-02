<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace akryll;

use akryll\Document;

class Bank {

    protected $documents;

    function __construct($fileaddr) {
        $maas = file($fileaddr);
        $documents = [];
        $docid = 0;
        foreach ($maas as $key => $value) {
            $value2 = rtrim($value);
            $value2 = mb_convert_encoding($value2, "utf-8", "windows-1251");
            $result = explode('=', $value2);
            if (count($result) == 2) {
                if ($result[0] == 'СекцияДокумент') {
                    $workflow = new Document();
                }
                if (isset($workflow)) {
                    $workflow->set($result[0], $result[1]);
                }
            } else {
                if ($result[0] == 'КонецДокумента') {
                    $documents[$docid] = $workflow;
                    $docid++;
                }
            }
        }
        $this->documents = $documents;
    }

    function getDocs() {
        return $this->documents;
    }

}
