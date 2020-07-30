// Esta funcion hace que todos los select, cada vez que se hace una consulta queden en la opcion por default
// window.addEventListener('load', (event) => {
//   let selects = document.getElementsByTagName('select');

//   //loop through all select elements
//   for (i =  0; i < selects.length; i++) {
//   	selects[i].options[0].selected = 'selected'
//   }
// });


// let ci_input = document.getElementById('ci');
// let id_type = document.getElementById('id_type');

// id_type.addEventListener('change', () => {
// if (id_type.value === "V-" || id_type.value === "E-") {
// 	ci_input.addEventListener('keyup', (e) => {
// 		let input = e.target.value.split('.').join('');
// 		input = input.split('').reverse();

// 		let output = [];
// 		let aux = '';

// 		let pager = Math.ceil(input.length / 3);

// 		for (let i = 0; i < pager; i++) {
// 			for(let j = 0; j < 3; j++){
// 				if (input[j + (i*3)] != undefined) {
// 					aux += input[j + (i*3)];
// 				}
// 			}
// 			output.push(aux);
// 			aux = '';

// 			e.target.value = output.join('.').split("").reverse().join('');
// 		}
// 	}, false)
// } else if (id_type.value != "V-" && id_type.value != "E-") {
// 	ci_input.removeEventListener('keyup', (e)=>{}, false);
// }
// });
