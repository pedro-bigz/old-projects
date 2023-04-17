<?php

namespace Api\Controllers;

if (!defined("URL"))
{
    header("Location: /");
    exit();
}

class Products
{
    private $Dados;

    private function response ($status, $code, $msg, $dados)
    {
        return array(
            "status" => $status,
            "code" => $code,
            "msg" => $msg,
            "data" => $dados
        );
    }

    public function cadProduct ($Dados)
    {
        $this->Dados = $Dados;

        if (!$this->Dados)
        {
            return $this->response('error', 400, 'Array de msg inválido!', []);
        }

        $loja = new \Api\Models\ApiEstoque();
        $this->Dados = $loja->setProduct($this->Dados);

        if (!$this->Dados)
        {
            return $this->response('error', 403, 'Erro ao inserir produto!', []);
        }

        return $this->response('success', 200, 'Cadastrado com sucesso!', array('id' => $this->Dados));
    }

    public function listar ($id = null)
    {
        if ($id)
        {
            $loja = new \Api\Models\ApiEstoque();
            $this->Dados = $loja->getProduct($id);
            
            if (empty($this->Dados))
            {
                return $this->response('error', 404, 'Produto nao encontrado', []);
            }
        }
        else
        {
            $loja = new \Api\Models\ApiEstoque();
            $this->Dados = $loja->getAll();
            
            if (empty($this->Dados))
            {
                return $this->response('error', 404, 'Nenhum produto encontrado', []);
            }
        }

        return $this->response('success', 200, 'Encontrado com sucesso!', $this->Dados);
    }

    public function edit ($id, $editProduct)
    {
        if ($id)
        {
            $loja = new \Api\Models\ApiEstoque();
            $this->Dados = $loja->editProduct($id, $editProduct);
            
            if (!$this->Dados)
            {
                return $this->response('error', 403, 'Nao foi possivel atualizar produto', []);
            }
        
            return $this->response('success', 200, 'Atualizado com sucesso', $this->Dados);
        }
        else
        {
            return $this->response('error', 403, 'ID do produto nao informado', []);
        }
    }

    public function delete ($id)
    {
        if ($id)
        {
            $loja = new \Api\Models\ApiEstoque();
            $this->Dados = $loja->removeProduct($id);
            
            if (!$this->Dados)
                return $this->response('error', 403, 'Nao foi possivel deletar produto', []);
        
            return $this->response('success', 200, 'Deletado com sucesso', $this->Dados);
        }
        else
        {
            return $this->response('error', 400, 'ID do produto nao informado', []);
        }
    }
}