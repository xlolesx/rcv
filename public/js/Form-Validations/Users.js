
const form = document.getElementById('register_form');

const name = document.getElementById('name');
const lastname = document.getElementById('lastname');
const id_type = document.getElementById('id_type');
const ci = document.getElementById('ci');
const number_code = document.getElementById('number_code');
const phone_number = document.getElementById('phone_number');
const username = document.getElementById('username');
const email = document.getElementById('email');
const office = document.getElementById('office_id');
const profit_percentage = document.getElementById('profit_percentage');
const password = document.getElementById('password');
const password_confirm = document.getElementById('password-confirm');

const emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const reg = /^\d+$/;

let notValidated = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

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

name.addEventListener('keyup', () => {
    if (name.value === "" || name.value == null) {
        name.classList.add('is-invalid');
        if (!notValidated.includes(1)) {     
            notValidated.push(1);
        }
    } else {
        name.classList.remove('is-invalid');         
        name.classList.add('is-valid');
        removeA(notValidated, 1);
    }   
});

lastname.addEventListener('keyup', () => {
    if (lastname.value === "" || lastname.value == null) {
        lastname.classList.add('is-invalid');
        if (!notValidated.includes(2)) {     
            notValidated.push(2);
        }
    } else {
        lastname.classList.remove('is-invalid');         
        lastname.classList.add('is-valid');
        removeA(notValidated, 2);
    }   
});

id_type.addEventListener('change', () => {
    if (id_type.value === "" || id_type.value == null) {
        id_type.classList.add('is-invalid');
        if (!notValidated.includes(3)) {     
            notValidated.push(3);
        }
    } else {
        id_type.classList.remove('is-invalid');         
        id_type.classList.add('is-valid');
        removeA(notValidated, 3);
    }   
});

ci.addEventListener('keyup', () => {
    if (reg.test(ci.value) == false || ci.value === '' || ci.value == null ||  ci.value.length > 9 || ci.value.length < 7) {
        ci.classList.add('is-invalid');
        if (!notValidated.includes(4)) {
            notValidated.push(4);
        }
    } else {
        ci.classList.remove('is-invalid');
        ci.classList.add('is-valid');
        removeA(notValidated, 4);           
    }
})

number_code.addEventListener('change', () => {
    if (number_code.value === "" || number_code.value == null) {
        number_code.classList.add('is-invalid');
        if (!notValidated.includes(5)) {     
            notValidated.push(5);
        }
    } else {
        number_code.classList.remove('is-invalid');         
        number_code.classList.add('is-valid');
        removeA(notValidated, 5);
    }   
});

phone_number.addEventListener('keyup', () => {
    if (reg.test(phone_number.value) == false || phone_number.value === '' || phone_number.value == null ||  phone_number.value.length > 8 || phone_number.value.length < 7){
        phone_number.classList.add('is-invalid');
        if (!notValidated.includes(6)) {
            notValidated.push(6);
        }       
    }else {
        phone_number.classList.remove('is-invalid');
        phone_number.classList.add('is-valid');
        removeA(notValidated, 6);           
    }
})

username.addEventListener('keyup', () => {
    if (username.value === "" || username.value == null) {
        username.classList.add('is-invalid');
        if (!notValidated.includes(7)) {     
            notValidated.push(7);
        }
    } else {
        username.classList.remove('is-invalid');         
        username.classList.add('is-valid');
        removeA(notValidated, 7);
    }   
});

email.addEventListener('keyup', () => {
    if (emailReg.test(email.value) == false || email === "" || email == null) {
        email.classList.add('is-invalid');
        if (!notValidated.includes(8)) {
            notValidated.push(8);
        }
    }else {
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
        removeA(notValidated, 8);
    }
});

office.addEventListener('change', () => {
    if (office.value === "" || office.value == null) {
        office.classList.add('is-invalid');
        if (!notValidated.includes(9)) {     
            notValidated.push(9);
        }
    } else {
        office.classList.remove('is-invalid');         
        office.classList.add('is-valid');
        removeA(notValidated, 9);
    }   
});

password.addEventListener('keyup', () => {
    if (password.value === "" || password.value == null || password.value.length < 8) {
        password.classList.add('is-invalid');
        if (!notValidated.includes(11)) {     
            notValidated.push(11);
        }
    } else {
        password.classList.remove('is-invalid');         
        password.classList.add('is-valid');
        removeA(notValidated, 11);
    }               
})

password_confirm.addEventListener('keyup', () => {
    if (password_confirm.value === "" || password_confirm.value == null || password_confirm.value !== password.value || password_confirm.value.length < 8) {
        password_confirm.classList.add('is-invalid');
        if (!notValidated.includes(12)) {     
            notValidated.push(12);
        }
    } else {
        password_confirm.classList.remove('is-invalid');         
        password_confirm.classList.add('is-valid');
        removeA(notValidated, 12);
    }               
})


form.addEventListener('submit', (e) => {
    if (notValidated > 0) {
        e.preventDefault();
    }
})

