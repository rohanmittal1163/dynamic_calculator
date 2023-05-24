const buttons = document.querySelectorAll('#calci_btn button');
const input = document.querySelector('#box');
const master = document.querySelector('#master');
const save = document.querySelector('.save');
const title = document.querySelector('#title');
const error = document.querySelector('.error');
const content = document.querySelector('.content');

let cal = '';
let string = '';
let arr = Array.from(buttons);

arr.forEach((item) => {
	item.addEventListener('click', (e) => {
		if (e.target.value == '=') {
			string = `(${string})`;
			cal = eval(cal);
			input.value = cal;
		} else if (e.target.value == 'AC') {
			string = '';
			cal = ' ';
			input.value = cal;
		} else if (e.target.value == '%') {
			if (calc != '') {
				string = `(${string})/100`;
				cal = eval(cal) / 100;
				input.value = cal;
			}
		} else if (e.target.value == 'DEL') {
			string = input.value;
			cal = String(cal);
			cal = cal.substring(0, cal.length - 1);
			input.value = cal;
		} else {
			string += e.target.value;
			cal = input.value;
			cal += e.target.value;
			input.value = cal;
		}
	});
});

input.addEventListener('keydown', (e) => {
	if (e.key == 'Enter' && cal != '') {
		string = `(${string})`;
		cal = eval(input.value);
		input.value = cal;
	} else if (e.key == 'Backspace') {
		cal = String(cal);
		cal = cal.substring(0, cal.length - 1);
		input.value = cal;
		string = cal;
	}
});

function loadTable() {
	let data = { title: title.value, calculation: string, result: cal };
	let xhr = new XMLHttpRequest();
	xhr.onload = () => {
		if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
			let data = xhr.responseText;
			content.innerHTML = data;
		}
	};
	xhr.open('POST', 'php/getData.php', true);
	xhr.send(JSON.stringify(data));
}
loadTable();

save.addEventListener('click', function () {
	let data = { title: title.value, calculation: string, result: cal };
	let xhr = new XMLHttpRequest();
	xhr.onload = (e) => {
		let resp = xhr.responseText;
		error.style.display = 'block';
		if (resp == 'success') {
			error.innerHTML = 'success';
			error.style.color = 'green';
			cal = ' ';
			string = ' ';
			title.value = ' ';
			input.value = ' ';
			loadTable();
		} else {
			error.innerHTML = resp;
			error.style.color = 'red';
		}
	};
	xhr.open('POST', 'php/insert-calc.php', true);
	xhr.send(JSON.stringify(data));
});

setInterval(() => {
	error.innerHTML = '';
}, 2000);

master.addEventListener('click', function () {
	const checkbox = document.querySelectorAll('input[type="checkbox"]');

	if (this.checked) {
		checkbox.forEach((item) => {
			item.checked = true;
		});
	} else {
		checkbox.forEach((item) => {
			item.checked = false;
		});
	}
});

$(document).on('click', '.delete', function () {
	if (confirm('Do you want to DELETE the data') === true) {
		var id = $(this).data('id');
		console.log(id);
		var element = this;
		$.ajax({
			url: 'php/delete-calc.php',
			type: 'POST',
			data: { id: id },
			success: function (data) {
				console.log(data);
				if (data == 'success') {
					loadTable();
				}
			},
		});
	}
});
