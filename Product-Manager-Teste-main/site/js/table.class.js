const EMPTY = "";

class Table {
	constructor(keys, attributes = {})
	{
		this.table = document.createElement("table");

		Object.keys(attributes).forEach((index) => {
			this.table[index] = attributes[index];
		});

		this.thead = [];
		this.tbody = [];
		this.tfoot = [];
		this.keys = keys;
	}	

	setThead (tr, attributes = {})
	{
		this.thead = document.createElement("thead");
		
		Object.keys(attributes).forEach((index) => {
			this.tbody[index] = attributes[index];
		});

		tr.forEach((item) => {
			const row = document.createElement('tr');

			this.keys.forEach((col) => {
				row.innerHTML += `<th>${item[col]}</th>`;
			});

			this.thead.appendChild(row);
		});

		this.table.appendChild(this.thead);
	}

	setTbody (tr, attributes = {})
	{
		this.tbody = document.createElement("tbody");

		Object.keys(attributes).forEach((index) => {
			this.tbody[index] = attributes[index];
		});

		tr.forEach((item) => {
			const row = document.createElement('tr');

			this.keys.forEach((col) => {
				row.innerHTML += `<td>${item[col]}</td>`;
			});
			
			this.tbody.appendChild(row);
		});

		this.table.appendChild(this.tbody);
	}

	setTfoot (tr, attributes = {})
	{
		this.tfoot = document.createElement("tfoot");

		Object.keys(attributes).forEach((index) => {
			this.tbody[index] = attributes[index];
		});

		tr.forEach((item) => {
			const row = document.createElement('tr');

			this.keys.forEach((col) => {
				row.innerHTML += `<td>${item[col]}</td>`;
			});

			this.tfoot.appendChild(row);
		});

		this.table.appendChild(this.tfoot);
	}

	getTable ()
	{
		return this.table;
	}

	getTableResponsive ()
	{
		let div = document.createElement("div");
		div.className = "table-responsive";
		div.appendChild(this.table);

		return div;
	}
}

export default Table;