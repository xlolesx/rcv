	const form = document.getElementById('form_policies');
	let notValidated = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19];
	const emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	const reg = /^\d+$/;
	const btn = document.getElementById('submitButton');

	function removeA(arr) {
		var what, a = arguments, L = a.length, ax;
		while (L > 1 && arr.length) {
			what = a[--L];
			while ((ax= arr.indexOf(what)) !== -1) {
				arr.splice(ax, 1);
			}
		}
		return arr;
	}

	const client_name = document.getElementById('client_name');
	client_name.addEventListener('keyup', () => {
		if (client_name.value === '' || client_name.value == null) {
			client_name.classList.add('is-invalid');
			if (!notValidated.includes(1)) {	 
				notValidated.push(1);
			}
		} else {
			client_name.classList.remove('is-invalid');			
			client_name.classList.add('is-valid');
			removeA(notValidated, 1);
		}	
	
	});

	const client_lastname = document.getElementById('client_lastname');
	client_lastname.addEventListener('keyup', () => {
		if (client_lastname.value === "" || client_lastname.value == null) {
			client_lastname.classList.add('is-invalid');
			if (!notValidated.includes(2)) {	 
				notValidated.push(2);
			}
		} else {
			client_lastname.classList.remove('is-invalid');			
			client_lastname.classList.add('is-valid');
			removeA(notValidated, 2);
		}	
	
	});

	const id_type = document.getElementById('id_type');
	id_type.addEventListener('change', () => {
		if(id_type.value === ''){
			id_type.classList.add('is-invalid');
			if (!notValidated.includes(3)) {
				notValidated.push(3);
			}
		}else {
			id_type.classList.remove('is-invalid');
			id_type.classList.add('is-valid');
			removeA(notValidated, 3);
		}
	});

	const client_ci = document.getElementById('ci');
	client_ci.addEventListener('keyup', () => {
		if (reg.test(client_ci.value) == false || client_ci.value === '' || client_ci.value == null ||  client_ci.value.length > 9 || client_ci.value.length < 7) {
			client_ci.classList.add('is-invalid');
			if (!notValidated.includes(4)) {
				notValidated.push(4);
			}
		} else {
			client_ci.classList.remove('is-invalid');
			client_ci.classList.add('is-valid');
			removeA(notValidated, 4);			
		}
	})

	const number_code = document.getElementById('number_code');
	number_code.addEventListener('change', () => {
		if (number_code.value === '' || number_code.value == null) {
			number_code.classList.add('is-invalid');
			if (!notValidated.includes(5)) {
				notValidated.push(5);
			}
		}else {
			number_code.classList.remove('is-invalid');
			number_code.classList.add('is-valid');
			removeA(notValidated, 5);			
		}
	})

	const client_phone = document.getElementById('client_phone');
	client_phone.addEventListener('keyup', () => {
		if (reg.test(client_phone.value) == false || client_phone.value === '' || client_phone.value == null ||  client_phone.value.length > 8 || client_phone.value.length < 7){
			client_phone.classList.add('is-invalid');
			if (!notValidated.includes(6)) {
				notValidated.push(6);
			}		
		}else {
			client_phone.classList.remove('is-invalid');
			client_phone.classList.add('is-valid');
			removeA(notValidated, 6);			
		}
	})

	const client_email = document.getElementById('client_email');
	client_email.addEventListener('keyup', () => {
		if (emailReg.test(client_email.value) == false || client_email === "" || client_email == null) {
			client_email.classList.add('is-invalid');
			if (!notValidated.includes(7)) {
				notValidated.push(7);
			}
		}else {
			client_email.classList.remove('is-invalid');
			client_email.classList.add('is-valid');
			removeA(notValidated, 7);
		}
	});

	const vehicle_brand = document.getElementById('brand');
	vehicle_brand.addEventListener('change', () => {
		if(vehicle_brand.value === '' || vehicle_brand.value == null){
			vehicle_brand.classList.add('is-invalid');
			if (!notValidated.includes(8)) {
				notValidated.push(8);
			}

		}else {
			vehicle_brand.classList.remove('is-invalid');
			vehicle_brand.classList.add('is-valid');
			removeA(notValidated, 8);
		}
	})

	const vehicle_model = document.getElementById('model');
	vehicle_model.addEventListener('change', () => {
		if(vehicle_model.value === '' || vehicle_model.value == null){
			vehicle_model.classList.add('is-invalid');
			if (!notValidated.includes(9)) {
				notValidated.push(9);
			}
		}else {
			vehicle_model.classList.remove('is-invalid');
			vehicle_model.classList.add('is-valid');
			removeA(notValidated, 9);
		}
	})

	const vehicle_year = document.getElementById('vehicle_year');
	vehicle_year.addEventListener('keyup', () => {
		if (vehicle_year.value > 2100 || vehicle_year.value < 1920 || vehicle_year.value === "" || vehicle_year.value == null) {
			vehicle_year.classList.add('is-invalid');
			if (!notValidated.includes(10)) {
				notValidated.push(10);
			}
		}else {
			vehicle_year.classList.remove('is-invalid');
			vehicle_year.classList.add('is-valid');
			removeA(notValidated, 10);			
		}
	})

	const vehicle_type = document.getElementById('type');
	vehicle_type.addEventListener('keyup', () => {
		if (vehicle_type.value === "" || vehicle_type.value == null) {
			vehicle_type.classList.add('is-invalid');
			if (!notValidated.includes(11)) {
				notValidated.push(11);
			}
		}else {
			vehicle_type.classList.remove('is-invalid');
			vehicle_type.classList.add('is-valid');
			removeA(notValidated, 11);			
		}
	})

	const vehicle_color = document.getElementById('vehicle_color');
	vehicle_color.addEventListener('keyup', () => {
		if (vehicle_color.value === "" || vehicle_color.value == null) {
			vehicle_color.classList.add('is-invalid');
			if (!notValidated.includes(12)) {
				notValidated.push(12);
			}
		}else {
			vehicle_color.classList.remove('is-invalid');
			vehicle_color.classList.add('is-valid');
			removeA(notValidated, 12);			
		}
	})

	const vehicle_use = document.getElementById('used_for');
	vehicle_use.addEventListener('change', () => {
		if(vehicle_use.value === '' || vehicle_use.value == null){
			vehicle_use.classList.add('is-invalid');
			if (!notValidated.includes(13)) {
				notValidated.push(13);
			}
		}else {
			vehicle_use.classList.remove('is-invalid');
			vehicle_use.classList.add('is-valid');
			removeA(notValidated, 13);
		}
	})

	const vehicle_bodywork_serial = document.getElementById('vehicle_bodywork_serial');
	vehicle_bodywork_serial.addEventListener('keyup', () => {
		if (vehicle_bodywork_serial.value === "" || vehicle_bodywork_serial.value == null) {
			vehicle_bodywork_serial.classList.add('is-invalid');
			if (!notValidated.includes(14)) {
				notValidated.push(14);
			}
		}else {
			vehicle_bodywork_serial.classList.remove('is-invalid');
			vehicle_bodywork_serial.classList.add('is-valid');
			removeA(notValidated, 14);			
		}
	})

	const vehicle_motor_serial = document.getElementById('vehicle_motor_serial');
	vehicle_motor_serial.addEventListener('keyup', () => {
		if (vehicle_motor_serial.value === "" || vehicle_motor_serial.value == null) {
			vehicle_motor_serial.classList.add('is-invalid');
			if (!notValidated.includes(15)) {
				notValidated.push(15);
			}
		}else {
			vehicle_motor_serial.classList.remove('is-invalid');
			vehicle_motor_serial.classList.add('is-valid');
			removeA(notValidated, 15);			
		}
	})

	const vehicle_certificate_number = document.getElementById('vehicle_certificate_number');
	vehicle_certificate_number.addEventListener('keyup', () => {
		if (vehicle_certificate_number.value === "" || vehicle_certificate_number.value == null) {
			vehicle_certificate_number.classList.add('is-invalid');
			if (!notValidated.includes(16)) {
				notValidated.push(16);
			}
		}else {
			vehicle_certificate_number.classList.remove('is-invalid');
			vehicle_certificate_number.classList.add('is-valid');
			removeA(notValidated, 16);			
		}
	})

	const vehicle_weight = document.getElementById('vehicle_weight');
	vehicle_weight.addEventListener('keyup', () => {
		if (reg.test(vehicle_weight.value) == false || vehicle_weight.value === "" || vehicle_weight.value == null) {
			vehicle_weight.classList.add('is-invalid');
			if (!notValidated.includes(17)) {
				notValidated.push(17);
			}
		}else {
			vehicle_weight.classList.remove('is-invalid');
			vehicle_weight.classList.add('is-valid');
			removeA(notValidated, 17);			
		}
	})

	const vehicle_registration = document.getElementById('vehicle_registration');
	vehicle_registration.addEventListener('keyup', () => {
		if (vehicle_registration.value === "" || vehicle_registration.value == null) {
			vehicle_registration.classList.add('is-invalid');
			if (!notValidated.includes(18)) {
				notValidated.push(18);
			}
		}else {
			vehicle_registration.classList.remove('is-invalid');
			vehicle_registration.classList.add('is-valid');
			removeA(notValidated, 18);			
		}
	})

	const price = document.getElementById('price');
	price.addEventListener('change', () => {
		if(price.value === '' || price.value == null){
			price.classList.add('is-invalid');
			if (!notValidated.includes(19)) {
				notValidated.push(19);
			}
		}else {
			price.classList.remove('is-invalid');
			price.classList.add('is-valid');
			removeA(notValidated, 19);
		}
	})	

	form.addEventListener('submit', (e) => {
		if (notValidated.length > 0) {
			e.preventDefault();
		}
	})