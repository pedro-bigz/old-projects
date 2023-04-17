<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'admin-user' => [
        'title' => 'Admin Users',

        'actions' => [
            'index' => 'Admin Users',
            'create' => 'New Admin User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            
        ],
    ],

    'loja-local' => [
        'title' => 'Loja Locals',

        'actions' => [
            'index' => 'Loja Locals',
            'create' => 'New Loja Local',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'logradouro' => 'Logradouro',
            'numero' => 'Numero',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'Uf',
            'cep' => 'Cep',
            'activated' => 'Activated',
            
        ],
    ],

    'categoria' => [
        'title' => 'Categorias',

        'actions' => [
            'index' => 'Categorias',
            'create' => 'New Categoria',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'setor' => 'Setor',
            'activated' => 'Activated',
            
        ],
    ],

    'estoque' => [
        'title' => 'Estoque',

        'actions' => [
            'index' => 'Estoque',
            'create' => 'New Estoque',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'amount' => 'Amount',
            'places' => 'Places',
            'category' => 'Category',
            'cor' => 'Cor',
            'activated' => 'Activated',
            'description' => 'Description',
            
        ],
    ],

    'oferta' => [
        'title' => 'Ofertas',

        'actions' => [
            'index' => 'Ofertas',
            'create' => 'New Oferta',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'id_estoque' => 'Id estoque',
            'desconto' => 'Desconto',
            'description' => 'Description',
            'min_user_lvl' => 'Min user lvl',
            'activated' => 'Activated',
            'data_inicio' => 'Data inicio',
            'data_fim' => 'Data fim',
            
        ],
    ],

    'cliente' => [
        'title' => 'Clientes',

        'actions' => [
            'index' => 'Clientes',
            'create' => 'New Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'registro_cliente' => 'Registro cliente',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'data_nascimento' => 'Data nascimento',
            'nivel' => 'Nivel',
            'user_id' => 'User',
            
        ],
    ],

    'nivel-cliente' => [
        'title' => 'Nivel Clientes',

        'actions' => [
            'index' => 'Nivel Clientes',
            'create' => 'New Nivel Cliente',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'description' => 'Description',
            
        ],
    ],

    'pedido' => [
        'title' => 'Pedidos',

        'actions' => [
            'index' => 'Pedidos',
            'create' => 'New Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cliente_id' => 'Cliente',
            'bol_parcelado' => 'Bol parcelado',
            'num_parcelas' => 'Num parcelas',
            'valor_parcela' => 'Valor parcela',
            'valor_total' => 'Valor total',
            'prazo_entrega' => 'Prazo entrega',
            'cod_entrega' => 'Cod entrega',
            'tipo_pagamento_id' => 'Tipo pagamento',
            
        ],
    ],

    'tipo-pagamento' => [
        'title' => 'Tipo Pagamento',

        'actions' => [
            'index' => 'Tipo Pagamento',
            'create' => 'New Tipo Pagamento',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            
        ],
    ],

    'pedido' => [
        'title' => 'Pedidos',

        'actions' => [
            'index' => 'Pedidos',
            'create' => 'New Pedido',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'cliente_id' => 'Cliente',
            'bol_parcelado' => 'Bol parcelado',
            'num_parcelas' => 'Num parcelas',
            'valor_parcela' => 'Valor parcela',
            'valor_total' => 'Valor total',
            'prazo_entrega' => 'Prazo entrega',
            'cod_entrega' => 'Cod entrega',
            'tipo_pagamento_id' => 'Tipo pagamento',
            'activated' => 'Activated',
            
        ],
    ],

    'store' => [
        'title' => 'Store',

        'actions' => [
            'index' => 'Store',
            'create' => 'New Store',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'role_id' => 'Role',
            
        ],
    ],

    'redes-sociai' => [
        'title' => 'Redes Sociais',

        'actions' => [
            'index' => 'Redes Sociais',
            'create' => 'New Redes Sociai',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'url' => 'Url',
            'icon' => 'Icon',
            
        ],
    ],

    'redes-sociai' => [
        'title' => 'Redes Sociais',

        'actions' => [
            'index' => 'Redes Sociais',
            'create' => 'New Redes Sociai',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'nome' => 'Nome',
            'url' => 'Url',
            'icon' => 'Icon',
            'activated' => 'Activated',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];