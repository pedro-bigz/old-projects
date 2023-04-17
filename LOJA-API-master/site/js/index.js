const URL = 'http://apiteste.mywebcommunity.org/';
//const URl = 'http://localhost/';
const URL_PRODS = `${URL}api/products/`;
const URL_CITYS = `${URL}api/cidades/`;

document.addEventListener("DOMContentLoaded", () => {
    render_prods ();
    render_citys ();
});

window.addEventListener("load", () => {
    $("button.register").click(() => { 
        form = new FormData(document.querySelector(".cad-form"));

        fetch(URL_PRODS, { method: "POST", body: form })
            .then(response => response.json() )
            .then(response => { 
                console.log(response);
                if (response.code === 200)
                {
                    $('.cad-success').html(response.msg);
                    $('.cad-success').fadeIn(500).delay(2000).fadeOut(500);
                }
                else
                {
                    $('.cad-error').html(response.msg);
                    $('.cad-error').fadeIn(500).delay(2000).fadeOut(500);
                }
                render_prods ();
            })
            .catch(err => {
                console.log(err);
                $('.cad-error').html('Erro ao cadastrar produto');
                $('.cad-error').fadeIn(500).delay(2000).fadeOut(500);
            });
    });

    $("button.search").click(() => {
        id = document.querySelector("input.search").value;

        if (isNaN(parseInt(id)) && id != "")
        {
            return;
        }

        if (id === "")
        {
            $(".show-all-prods").fadeOut(500);
        }
        else
        {
            $(".show-all-prods").fadeIn(500);
        }

        url = URL_PRODS + id;

        fetch(url, { method: "GET" })
            .then(response => response.json())
            .then(response => table_prods(response.data))
            .catch(err => console.log(err))

    });

    $(".show-all-prods").click(() => {
        render_prods();
        document.querySelector("input.search").value = "";
        $(".show-all-prods").fadeOut(500);
    });

    document.querySelector('.close-menu').addEventListener("click", () => {
        document.getElementById("menu").style.width = "0";
    });
    document.querySelector('.open-menu').addEventListener("click", () => {
        document.getElementById("menu").style.width = "250px";
    });

    document.querySelector('.update').addEventListener("click", update_product);

    document.querySelector('a.prods').addEventListener("click", () => openMenu('prods'));
    document.querySelector('a.citys').addEventListener("click", () => openMenu('citys'));
});

const render_prods = () => {
    fetch(URL_PRODS, { method: 'GET' })
        .then(response => response.json())
        .then(response => table_prods(response.data))
        .catch(err => console.log(err))
}

const render_citys = () => {
    fetch(URL_CITYS, { method: 'GET' })
        .then(response => response.json())
        .then(response => {
            table_citys(response.data);
            city_menu(response.data);
        })
        .catch(err => console.log(err))
}

const city_menu = (citys) => {
    select_insert = document.querySelector("#city");
    select_update = document.querySelector("#edit-city");

    citys.forEach((city) => {
        select_insert.innerHTML += `<option value='${city.id}'>${city.nome}</option>`;
        select_update.innerHTML += `<option value='${city.id}'>${city.nome}</option>`;
    });
}

const process_form = (key, value) => {
    treatment_obj = {
        'price': parseFloat,
        'amount': parseInt,
        'city': parseInt
    }

    treatment = treatment_obj[key];

    if (treatment)
        return treatment(value);

    return value;
}

const openMenu = (page) => {
    open_pages = {
        prods: function () {
            $("div.citys").fadeOut(500).delay(400);
            $("div.prods").delay(400).fadeIn(500);
        },
        citys: function (){
            $("div.prods").fadeOut(500).delay(400);
            $("div.citys").delay(400).fadeIn(500);
        }
    }

    open_pages[page]();
}

const delete_product = (id) => {
    url = URL_PRODS + id;

    console.log(url);
    fetch(url, {
        method: "DELETE"
    })
        .then(response => response.json())
        .then(response => {
            console.log(response);
            if (response.code === 200)
            {
                $('.msg-success').html(response.msg);
                $('.msg-success').fadeIn(500).delay(2000).fadeOut(500);
            }
            else
            {
                $('.msg-error').html(response.msg);
                $('.msg-error').fadeIn(500).delay(2000).fadeOut(500);
            }
            render_prods ();
        })
        .catch(err => {
            console.log(err);
            $('.msg-error').html('Erro ao deletar produto');
            $('.msg-error').fadeIn(500).delay(2000).fadeOut(500);
        })
}

const update_product = () => {
    form = document.querySelectorAll(".input-edit");

    console.log(form);

    url = URL_PRODS + document.querySelector("#id").value;

    data = {};
    for (i = 0; i < form.length; i++)
    {
        if (form[i].value != "")
        {
            key = form[i].id.split("-")[1];
            data[key] = form[i].value;
        }
    }

    console.log(data);

    console.log(url);
    fetch(url, { method: "PUT", body: JSON.stringify(data) })
        .then(response => response.json())
        .then(response => {
            console.log(response);
            if (response.code === 200)
            {
                $('.edit-success').html(response.msg);
                $('.edit-success').fadeIn(500).delay(2000).fadeOut(500);
            }
            else
            {
                $('.edit-error').html(response.msg);
                $('.edit-error').fadeIn(500).delay(2000).fadeOut(500);
            }
            render_prods ();
        })
        .catch(err => {
            console.log(err);
            $('.edit-error').html('Erro ao atualizar produto');
            $('.edit-error').fadeIn(500).delay(2000).fadeOut(500);
        })
}

const table_citys = (arr) => {
    removeChildrens(".table-content-citys");

    arr.forEach((curr, index) => {
        table = set_table_citys(curr);
    });
}

const table_prods = (arr) => {
    removeChildrens(".table-content-prods");

    arr.forEach((curr, index) => {
        table = set_table_prods(curr);
    });
}

const removeChildrens = (id) => {
    elem = document.querySelector(id).children;

    for (i = elem.length - 1; i >= 0; i--)
    {
        elem[i].remove();
    }
}

const set_table_citys = (obj) => {
    var { id, nome, uf, total_hab } = obj;
    table = document.querySelector(".table-content-citys");

    table.innerHTML += `
			<tr>

				<td>${id}</td>
				<td>${nome}</td>
				<td>${uf}</td>
				<td>${total_hab}</td>

			</tr>`;
}

const setId = (id) => {
    document.querySelector("#id").value = id;
}

const set_table_prods = (obj) => {
    var { id, name, price, amount, city, description } = obj;
    table = document.querySelector(".table-content-prods");

    table.innerHTML += `
			<tr>
	    
				<td>${id}</td>
				<td>${name}</td>
				<td>${price}</td>
				<td>${amount}</td>
                <td>${city}</td>
				<td>${description}</td>
				<td class='text-right'>
					<button class="${id} btn btn-info update-btn" data-toggle="modal" data-target="#editar_produto" onclick='setId (this.classList[0])'><i class="fas fa-edit"></i></button>
					<button class="${id} btn btn-danger delete-btn" onclick='delete_product (this.classList[0])'><i class="far fa-trash-alt"></i></button>
				</td>

			</tr>`;
}
