<?php

namespace Includes\CSV;

class CSV {
    private $bdConnection;

    function __construct() {
        $this->bdConnection = new \Includes\Crud\bdConnection();
    }

    function downloadFile($idEnterprises) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=contatos.csv');

        $output = fopen('php://output', 'w');

        $rows = $this->bdConnection->select("contato",array("identifier"=>"OR","idEnterprise"=>$idEnterprises),"nome AS Name,email AS Email,whatsapp AS Phone",true);

        fputcsv($output, array_keys(reset($rows)));

        foreach($rows as $key=>$line) {
            fputcsv($output, $line);
        }
    }
}