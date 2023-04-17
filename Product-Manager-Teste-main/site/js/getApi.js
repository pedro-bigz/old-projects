export const URL = 'http://localhost/api/';
const produtos = 'products';
const cidades = 'cidades';
export const URLProdutos = URL + produtos;
export const URLCidades = URL + cidades;


const getApi = (url, logged, init = {}) => {
    if (logged)
    {
        init['headers'] = { 'Authorization': 'Bearer ' + localStorage.getItem('user_token_jwt') };
    }

    const promisseCallback = (resolve, reject) => {
        fetch(url, init)
            .then(response => {
                if (!response.ok)
                {
                    throw new Error(`Erro ao executar requisição, status ${response.status}`);
                }

                return response.json();
            })
            .then(resolve)
            .catch(reject)
    }

    return new Promise(promisseCallback);
}

export default getApi;

// const render_prods = () => {
//     getApi(URLProdutos, { method: 'GET' })
//         .then((result) => {console.log(result)})
//         .catch(console.error);
// }

// const render_citys = () => {
//     fetch(URL_CITYS, { method: 'GET' })
//         .then(response => response.json())
//         .then(response => {
//             table_citys(response.data);
//             city_menu(response.data);
//         })
//         .catch(err => console.log(err))
// }

// render_prods();  