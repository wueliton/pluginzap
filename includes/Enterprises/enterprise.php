<?php

namespace Includes\Enterprises;

class Enterprise {
    private $bdConnection;
    private $dir = "../uploads/";
    private $table = "enterprise";
    private $allEnterprises = "";

    function __construct() {
        $this->bdConnection = new \Includes\Crud\bdConnection();
    }

    function newEnterprise($idClient,$image,$site,$name,$whatsapp,$update=true) {
        $fileName = uniqid() . '.png';
        $file_path = $this->dir . $fileName;
        $whatsapp = preg_replace('/\D/', '',$whatsapp);

        $exists = $this->bdConnection->select($this->table,array("whatsapp"=>$whatsapp),"nome");

        if(empty($exists)) {
            if(move_uploaded_file($image['image']['tmp_name'], $file_path)) {
                $params = array(
                    "id" => "",
                    "id_usuario" => $idClient,
                    "imagem" => $fileName,
                    "site" => $site,
                    "nome" => $name,
                    "whatsapp" => $whatsapp,
                    "btn_template" => "",
                    "mensagem" => "",
                );

                if($this->bdConnection->insert($this->table,$params)) {
                    if($update==true) {
                        if($this->bdConnection->update("users",array("id"=>$idClient, "verificationcode"=>"verified"))) {
                            echo \json_response(200,"Empresa criada com sucesso");
                        }
                    }
                    else {
                        $exists = $this->bdConnection->select($this->table,array("whatsapp"=>$whatsapp),"id");
                        echo \json_response(200,array("msg"=>"Empresa criada com sucesso","id"=>$exists['id']));
                    }
                    
                }
                else {
                    echo \json_response(400,"Erro no sistema, consulte o Administrador.");
                }
            }
            else {
                echo \json_response(400,"Erro no sistema, consulte o Administrador.");
            }
        }
        else {
            echo \json_response(400,"Número de WhatsApp já está em uso.");
        }
    }

    function updateEnterpriseData($idClient,$site,$name,$whatsapp,$imageName,$image) {
        $fileName = $imageName;
        $file_path = $this->dir . $fileName;
        $whatsapp = preg_replace('/\D/', '',$whatsapp);
        $exists = $this->bdConnection->select($this->table,array("id"=>$idClient),"nome,whatsapp");

        if(!empty($exists)) {
            if($whatsapp != $exists['whatsapp']) {
                $verifyNumber = $this->bdConnection->select($this->table,array("whatsapp"=>$whatsapp),"id");

                if(!empty($verifyNumber)) {
                    echo \json_response(400,"Número de WhatsApp já está em uso.");
                    return false;
                }
            }

            if($image!=false) {
                unlink($file_path);
                if(move_uploaded_file($image['image']['tmp_name'], $file_path)) {
                    $params = array(
                        "id" => $idClient,
                        "imagem" => $fileName,
                        "site" => $site,
                        "nome" => $name,
                        "whatsapp" => preg_replace('/\D/', '', $whatsapp)
                    );
    
                    if($this->bdConnection->update($this->table,$params)) {
                        echo \json_response(200,"Empresa atualizada com sucesso");
                    }
                    else {
                        echo \json_response(400,"Erro no sistema, consulte o Administrador.");
                    }
                }
                else {
                    echo \json_response(400,"Erro no sistema, consulte o Administrador.");
                }
            }
            else {
                $params = array(
                    "id" => $idClient,
                    "site" => $site,
                    "nome" => $name,
                    "whatsapp" => preg_replace('/\D/', '', $whatsapp)
                );

                if($this->bdConnection->update($this->table,$params)) {
                    echo \json_response(200,"Empresa atualizada com sucesso");
                }
                else {
                    echo \json_response(400,"Erro no sistema, consulte o Administrador.");
                }
            }
        }
        else {
            echo \json_response(400,"Erro no sistema.");
        }
        /*

        if($exists['id'] == $idClient) {
            if($image!=false) {
                unlink($file_path);
                if(move_uploaded_file($image['image']['tmp_name'], $file_path)) {
                    $params = array(
                        "id" => $idClient,
                        "imagem" => $fileName,
                        "site" => $site,
                        "nome" => $name,
                        "whatsapp" => preg_replace('/\D/', '', $whatsapp)
                    );
    
                    if($this->bdConnection->update($this->table,$params)) {
                        echo json_response(200,"Empresa atualizada com sucesso");
                    }
                    else {
                        echo json_response(400,"Erro no sistema, consulte o Administrador.");
                    }
                }
                else {
                    echo json_response(400,"Erro no sistema, consulte o Administrador.");
                }
            }
            else {
                $params = array(
                    "id" => $idClient,
                    "site" => $site,
                    "nome" => $name,
                    "whatsapp" => preg_replace('/\D/', '', $whatsapp)
                );

                if($this->bdConnection->update($this->table,$params)) {
                    echo json_response(200,"Empresa atualizada com sucesso");
                }
                else {
                    echo json_response(400,"Erro no sistema, consulte o Administrador.");
                }
            }
        }
        else {
            echo json_response(400,"Número de WhatsApp já está em uso.");
        }
        */
    }

    function delete($idEnterprise) {
        if($this->bdConnection->delete($this->table,array("id"=>$idEnterprise))) {
            return true;
        }
        else {
            return false;
        }
    }

    function getEnterprises($idClient) {
        $exists = $this->bdConnection->select($this->table,array("id_usuario"=>$idClient),"id,nome,site,btn_template",true);

        if(!empty($exists)) {
            return $exists;
        }
        else {
            return false;
        }
    }

    function getEnterpriseData($id) {
        $exists = $this->bdConnection->select($this->table,array("id"=>$id),"*",true);

        if(!empty($exists)) {
            echo \json_response(200,$exists);
        }
        else {
            echo \json_response(400,"Houve um erro ao tentar recuperar os dados da Empresa.");
        }
    }

    function getEnterpriseDataApplication($id) {
        $exists = $this->bdConnection->select($this->table,array("id"=>$id),"*",true);
        return $exists;
    }

    function updateEnterprise($id,$mensagem,$themeId) {
        if($this->bdConnection->update($this->table,array("id"=>$id,"mensagem"=>$mensagem,"btn_template"=>$themeId))) {
            return true;
        }
        else {
            return false;
        }
    }

    function quantEnterprise() {
        $id = $_SESSION['id_usuario'];
        $allEnterprises = $this->bdConnection->select($this->table,array("id_usuario"=>$id),"id",true);

        $count = count($allEnterprises);
        return $count;
    }

    function listMessages($idUser = false,$enterprises="all",$page=0,$itens=10,$order="DESC",$between=false,$andBetween=false) {
        $pageActual = $page+1;
        $page = $itens * $pageActual - $itens;
        $id = $idUser!= false ? $idUser : $_SESSION['id_usuario'];
        $allEnterprises = $this->bdConnection->select($this->table,array("id_usuario"=>$id),"id,nome",true);
        $query = array("identifier"=>"OR");
        $enterprisesName = array();
        $between = $between!=false ? array("field"=>"data","between"=>$between,"and"=>$andBetween) : false;
        $enterprisesList = array();

        if(!empty($allEnterprises)) {
            foreach($allEnterprises as $enterprise) {
                $enterprisesName[$enterprise["id"]] = $enterprise["nome"];
            }
    
            if($enterprises=="all") {
                foreach($allEnterprises as $enterprise) {
                    $enterprisesList[] = $enterprise["id"];
                }
    
                $query["idEnterprise"] = array(implode(",",$enterprisesList));
            }
            else {
                $query["idEnterprise"] = array(implode(",",$enterprises['idEnterprise']));
            }
            
            $messages = $this->bdConnection->select("mensagem",$query,"id,idEnterprise,nome,whatsapp,mensagem,data,lido",true,$between,array("field"=>"data {$order}"),array("page"=>$page,"itens"=>$itens));
    
            foreach($messages as $message) {
                $messageTxt = substr($message['mensagem'], 0, 25) . '...';;
                $messageAll = nl2br($message['mensagem']);
                $notRead = $message['lido']==0 ? "<span class=\"notRead\"></span>" : "";
                $template = "
                <tr data-id={$message['id']}>
                    <td class=\"status\">{$notRead}</td>
                    <td>
                        <div class=\"mensagem\">
                            <span class=\"cliente\">
                                {$message['nome']}
                                <span class=\"timeMessage\">{$message['data']}</span>
                            </span>
                            <span class=\"partialMessage\">{$messageTxt}</span>
                            <span class=\"allMessage\">{$messageAll}</span>
                        </div>
                        <span class=\"enterpriseName\">{$enterprisesName[$message['idEnterprise']]}</span>
                        <p class=\"text-right messageReply\"><a href=\"javascript:void(0)\" class=\"close\">Fechar</a> <a href=\"https://api.whatsapp.com/send?phone=+55{$message['whatsapp']}\" target=\"_blank\" class=\"btn-primary\">Responder</a></p>
                    </td>
                </tr>
                ";
                echo $template;
            }
        }
        else {
            echo "";
        }
    }

    function listContacts($id=false,$listEnterprises="all",$page=0,$itens=10,$order="ASC") {
        $id = $id==false ? $_SESSION['id_usuario'] : $id;
        $pageActual = $page+1;
        $page = $itens * $pageActual - $itens;
        $query = array("identifier"=>"OR");

        $enterprisesList = $this->bdConnection->select($this->table,array("id_usuario"=>$id),"id,nome",true);
        $enterprisesName = array();

        if(!empty($enterprisesList)) {
            foreach($enterprisesList as $key=>$enterprise) {
                $enterprisesName[$enterprise['nome']] = $enterprise['id'];
            }
    
            $query['idEnterprise'] = $listEnterprises!="all" ? array(implode(",",$listEnterprises['idEnterprise'])) : array(implode(",",$enterprisesName));
    
            $allContacts = $this->bdConnection->select("contato",$query,"*",true,false,array("field"=>"nome {$order}"),array("page"=>$page,"itens"=>$itens));
    
            foreach($allContacts as $contact) {
                $empresa = $this->searchForId($contact['idEnterprise'],$enterprisesName);
    
                $template = "
                        <tr data-id={$contact['id']}>
                            <td><img src=\"source/images/no-image.png\" alt=\"{$contact['nome']}\"></td>
                            <td>{$contact['nome']}</td>
                            <td>{$contact['email']}</td>
                            <td>{$contact['whatsapp']}</td>
                            <td><span class=\"empresa\">{$empresa}</span></td>
                            <td><div class=\"contactOptions\"><a href=\"javascript:void(0)\" class=\"close\">fechar</a> <button class=\"btn-primary danger\">Excluir</button></div></td>
                        </tr>
                ";
    
                echo $template;
            }
        }
        else {
            echo "";
        }
        
    }

    function listEnterprises() {
        $id = $_SESSION['id_usuario'];
        $allEnterprises = $this->bdConnection->select($this->table,array("id_usuario"=>$id),"id,nome",true);

        if(!empty($allEnterprises)) {
            foreach($allEnterprises as $enterprise) {
                echo "<li><label><input type=\"checkbox\" data-id=\"{$enterprise['id']}\" checked> {$enterprise['nome']}</label></li>";
            }
        }
        else {
            echo "";
        }
    }

    function readConfirmation($id) {
        if($this->bdConnection->update("mensagem",array("id"=>$id,"lido"=>1))) {
            return true;
        }
        else {
            return false;
        }
    }

    function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val === $id) {
                return $key;
            }
        }
        return null;
     }

     function generateReport() {
        $id = $_SESSION['id_usuario'];
        $allEnterprises = $this->bdConnection->select($this->table,array("id_usuario"=>$id),"id,nome",true);
        $result = array();
        $this->allEnterprises = $allEnterprises;

        if(!empty($allEnterprises)) {
            foreach($allEnterprises as $key=>$enterprise) {
                $data = $this->bdConnection->select("report",array("identifier"=>"AND","idEnterprise"=>array($enterprise['id']),"mes"=>date("n"),"ano"=>date("Y")),"contagem,url",true,false,array("field"=>"contagem DESC"));
                $result[$enterprise['nome']] = $data;
            }
        }
        else {
            $result = "";
        }

        return $result;
     }

     function getContactsNumber() {
        $allEnterprises = $this->allEnterprises;
        $ids = array();

        if(!empty($allEnterprises)) {
            foreach($allEnterprises as $enterprise) {
                $ids[] = $enterprise['id'];
            }
    
            $ids = implode(",",$ids);
            $result = $this->bdConnection->select("contato",array("identifier"=>"OR","idEnterprise"=>array($ids)," AND MONTH(data)"=>"07"),"COUNT(*)");
            return $result['COUNT(*)'];
        }
        else {
            return 0;
        }
     }

     function todayMessages() {
        $allEnterprises = $this->allEnterprises;
        $ids = array();

        if(!empty($allEnterprises)) {
            foreach($allEnterprises as $enterprise) {
                $ids[] = $enterprise['id'];
            }
    
            $ids = implode(",",$ids);
            $result = $this->bdConnection->select("mensagem",array("identifier"=>"OR","idEnterprise"=>array($ids)," AND MONTH(data)"=>"07"),"COUNT(*)");
            return $result['COUNT(*)'];
        }
        else {
            return 0;
        }
     }

     function exclude($id) {
         if($this->bdConnection->delete("contato",array("id"=>$id))) {
             return true;
         }
         else {
             return false;
         }
     }
}
