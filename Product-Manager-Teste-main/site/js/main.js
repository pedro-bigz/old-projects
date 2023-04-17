import Table from './table.class.js';
import Api from './getApi.js';
import { URL, URLProdutos, URLCidades } from './getApi.js';

const body = document.body;
const getElem = (param) => document.querySelector(param);
const getAllElem = (param) => document.querySelectorAll(param);
const createElem = (param) => document.createElement(param);
const push = (arr, elem) => { arr.push(elem); return arr; };
const window_load = (callback) => window.addEventListener("load", callback);
const elemClick = (elem, callback) => getElem(elem).addEventListener("click", callback);
const splitID = (elem) => elem.id.split("-");
var logged;

const renderProds = (id = '') => {
    const url = `${URLProdutos}/${id}`;
    // console.log(url);

    Api(url, logged)
        .then((data) => {
            // console.log(data);
            const table = new Table(push(Object.keys(data.data[0]), 'buttons'), { className: "table" });

            const header = [
                {
                    id: `<i class="fas fa-sort-amount-down-alt"></i> ID`,
                    name: `Nome`,
                    amount: `Estoque`,
                    city: `Cidade`,
                    description: `Descrição`,
                    price: `Preço`,
                    buttons: ``
                }
            ];

            const rows = data.data.map((obj) => {
                obj['buttons'] = `
                    <div class='text-right'>
                        <button class="${obj.id} btn btn-info update-btn" id="update-${obj.id}" data-toggle="modal" data-target="#editar_produto"><i class="fas fa-edit" aria-hidden="true"></i></button>
                        <button class="${obj.id} btn btn-danger delete-btn" id="delete-${obj.id}"><i class="far fa-trash-alt" aria-hidden="true"></i></button>
                    </div>
                `.trim();

                return obj;
            });

            table.setThead(header);
            table.setTbody(data.data);

            const container = getElem("#table-prods");
            clear(container);

            container.appendChild(table.getTableResponsive());

            data.data.forEach((obj) => {
                $(`#delete-${obj.id}`).click(() => deleteProduct(obj.id));
                $(`#update-${obj.id}`).click(() => {
                    getElem('#edit-id').innerHTML = obj.id;
                    getElem('#edit-title').innerHTML = obj.name;
                    elemClick(".update", () => updateProduct(obj.id));
                });
            });
        })
        .catch(err => {
            console.error(err);
            $(".msg-error").html(err);
            $(".msg-error").fadeIn(500).delay(2000).fadeOut(500);
        });
}

const renderCitys = () => {
    Api(URLCidades, logged)
        .then((data) => {
            // console.log(data);
            citysMenu(data.data);
            const table = new Table(Object.keys(data.data[0]), { className: "table" });

            const header = [
                {
                    id: `<i class="fas fa-sort-amount-down-alt"></i> ID`,
                    nome: `Nome`,
                    uf: `UF`,
                    total_hab: `Nº de Habitantes`
                }
            ];

            table.setThead(header);
            table.setTbody(data.data);

            const container = getElem("#table-citys");
            clear(container);

            container.appendChild(table.getTableResponsive());
        })
        .catch(err => {
            console.error(err);
            $(".msg-error").html(err);
            $(".msg-error").fadeIn(500).delay(2000).fadeOut(500);
        });
}

const clear = (elem) => {
    const childs = elem.children;
    const tam = childs.length;

    for (var i = 0; i < tam; i++) {
        elem.removeChild(childs[0]);
    }
}

const citysMenu = (citys) => {
    const select_insert = getElem("#city");
    const select_update = getElem("#edit-city");

    citys.forEach((city) => {
        select_insert.innerHTML += `<option value='${city.id}'>${city.nome}</option>`;
        select_update.innerHTML += `<option value='${city.id}'>${city.nome}</option>`;
    });
}

const register = () => {
    const form = new FormData(document.querySelector(".cad-form"));

    Api(URLProdutos, logged, { method: "POST", body: form })
        .then(response => {
            console.log(response);
            if (response.code === 200) {
                $('.cad-success').html(response.msg);
                $('.cad-success').fadeIn(500).delay(2000).fadeOut(500);
            }
            else {
                $('.cad-error').html(response.msg);
                $('.cad-error').fadeIn(500).delay(2000).fadeOut(500);
            }

            renderProds();
        })
        .catch(err => {
            console.error(err);
            $('.cad-error').html('Erro ao cadastrar produto');
            $('.cad-error').fadeIn(500).delay(2000).fadeOut(500);
        });
}

const updateProduct = (id) => {
    const form = document.querySelectorAll(".input-edit");
    const url = `${URLProdutos}/${id}`;

    var data = {};
    form.forEach((inp) => {
        if (inp.value != "") {
            let key = splitID(inp);
            data[key[1]] = inp.value;
        }
    });

    Api(url, logged, { method: "PUT", body: JSON.stringify(data) })
        .then(response => {
            console.log(response);
            if (response.code === 200) {
                $('.edit-success').html(response.msg);
                $('.edit-success').fadeIn(500).delay(2000).fadeOut(500);
            }
            else {
                $('.edit-error').html(response.msg);
                $('.edit-error').fadeIn(500).delay(2000).fadeOut(500);
            }

            renderProds();
        })
        .catch(err => {
            console.log(err);
            $('.edit-error').html('Erro ao atualizar produto');
            $('.edit-error').fadeIn(500).delay(2000).fadeOut(500);
        })
}

const deleteProduct = (id) => {
    const url = `${URLProdutos}/${id}`;

    Api(url, logged, { method: "DELETE" })
        .then(response => {
            console.log(response);
            if (response.code === 200) {
                $('.msg-success').html(response.msg);
                $('.msg-success').fadeIn(500).delay(2000).fadeOut(500);
            }
            else {
                $('.msg-error').html(response.msg);
                $('.msg-error').fadeIn(500).delay(2000).fadeOut(500);
            }
            renderProds();
        })
        .catch(err => {
            console.error(err);
            $('.msg-error').html('Erro ao deletar produto');
            $('.msg-error').fadeIn(500).delay(2000).fadeOut(500);
        })
}

const openPage = (page) => {
    // console.log(page);
    const pages = {
        prods: function () {
            $("#page-citys").fadeOut(500).delay(400);
            $("#page-prods").delay(400).fadeIn(500);
        },
        citys: function () {
            $("#page-prods").fadeOut(500).delay(400);
            $("#page-citys").delay(400).fadeIn(500);
        }
    }

    pages[page]();
}

const menuEvents = () => {
    elemClick('.close-menu', () => getElem("#menu").style.width = "0");
    elemClick('.open-menu', () => getElem("#menu").style.width = "250px");
    elemClick('a.prods', () => openPage('prods'));
    elemClick('a.citys', () => openPage('citys'));
    elemClick('a.loggout', () => { loggout(); location.reload(); });
}

const loggout = () => {
    localStorage.removeItem("user_token_jwt");
}

const searchEvents = () => {
    elemClick("button.search", search);
    elemClick(".show-all-prods", showAllProds);
}

const showAllProds = () => {
    document.querySelector("input.search").value = "";
    renderProds();
}

const registerEvent = () => {
    elemClick("button.register", register);
}

const updateEvent = () => {
    elemClick("button.update",);
}

const search = () => {
    const id = document.querySelector("input.search").value;

    if (!isNaN(parseInt(id)) || id == '') {
        if (id === '') {
            $(".show-all-prods").fadeOut(500);
        }
        else {
            $(".show-all-prods").fadeIn(500);
        }

        renderProds(id);
    }
}

const renderApp = () => {
    if (!!localStorage.getItem("user_token_jwt"))
    {
        logged = true;  
        validaToken (); 
        const menu = `
            <span class="open-menu pl-2 pr-2">&#9776;</span>
        
            <div id="menu" class="sidenav bg-success text-white">
                <a href="javascript:void(0)" class="close-menu text-white">&times;</a>
                <a href="javascript:void(0)" class="prods text-white">Produtos</a>
                <a href="javascript:void(0)" class="citys text-white">Cidades</a>
                <a href="javascript:void(0)" class="loggout text-white">Sair</a>
            </div>
        `;
        
        body.innerHTML += menu;
    
        renderPageProds();
        renderPageCitys();
        menuEvents();
        searchEvents();
        registerEvent();
    }
    else
    {
        logged = false;
        renderLogin();
        login();
    }
}

const validaToken = () => {
    // console.log(localStorage.getItem("user_token_jwt"));
    Api(URLProdutos, logged)
        .then((data) => console.log("Verificação concluída!"))
        .catch(err => {
            console.error(err);
            $(".msg-error").html("Token invalido");
            $(".msg-error").fadeIn(500).delay(2000).fadeOut(500);

            loggout();
            renderApp();
        });
        
}

const renderPageProds = () => {
    const container = createElem("div");
    container.className = "container mt-5 mb-5";
    container.style.display = "block";
    container.id = "page-prods";

    getElem(".pages").appendChild(container);

    const title = '<h1 class="display-4 text-center">Produtos</h1>';

    const searchBar = `
    <div class="container pb-5 mb-5">
        <div class="float-left search-container">
            <div>
                <input type="text" class="search" placeholder="Digite o id do produto"
                    style="" />
                <button type="button" class="search">Procurar</button>
            </div>
        </div>
        <div class="float-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#cadastrar_produto">Adicionar Produto</button>
        </div>
    </div>
    `;

    const showAll = `
        <button class="btn btn-secondary show-all-prods" style="display: none;">Mostrar todos</button>
    `;

    container.innerHTML += title;
    container.innerHTML += searchBar;
    container.innerHTML += showAll;

    const table = createElem('div');
    table.className = "container-fluid border-gray-1 mt-5";
    table.id = "table-prods";

    container.appendChild(table);

    renderProds();
}

const renderPageCitys = () => {
    const container = createElem("div");
    container.className = "container mt-5 mb-5";
    container.style.display = "none";
    container.id = "page-citys";

    getElem(".pages").appendChild(container);

    const title = '<h1 class="display-4 text-center">Cidades</h1>';
    container.innerHTML += title;

    const table = createElem('div');
    table.className = "container-fluid border-gray-1 mt-5";
    table.id = "table-citys";

    container.appendChild(table);

    renderCitys();
}

const renderLogin = () => {
    getElem('.pages').innerHTML += `
    <div class="text-center w-100">
        <form class="form-signin" onsubmit="return false">
            <img class="mb-4" src="img/restrito.png" alt="" style="width: 200px; height: 200px;">
            <h1 class="h3 mb-3 font-weight-normal">Área Restrita</h1>

            <label for="inputEmail" class="sr-only">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Endereço de e-mail" required autofocus>
            
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" id="pwd" name="pwd" class="form-control" placeholder="Senha" required>
            
            <button class="btn btn-lg btn-primary btn-block login" type="button">Entrar</button>
        </form>
    </div>
    `;
}

const login = () => {
    elemClick("button.login", () => {
        const url = URL + 'auth';
        const form = new FormData(getElem("form.form-signin"));
        Api(url, logged, { method: 'POST', body: form })
            .then((data) => {
                // console.log(data);
                localStorage.setItem('user_token_jwt', data.data);
                location.reload();
            })
            .catch(console.error)
    });
}

window_load(renderApp);
// renderApp();