
const form = document.getElementById('register_form');

const name = document.getElementById('name');
const id_type = document.getElementById('id_type');
const ci = document.getElementById('ci');
const number_code = document.getElementById('number_code');
const phone_number = document.getElementById('phone_number');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password_confirm = document.getElementById('password-confirm');

const emailReg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const reg = /^\d+$/;

let notValidated = [1, 2, 3, 4, 5, 6, 7, 8];

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

id_type.addEventListener('change', () => {
    if (id_type.value === "" || id_type.value == null) {
        id_type.classList.add('is-invalid');
        if (!notValidated.includes(2)) {     
            notValidated.push(2);
        }
    } else {
        id_type.classList.remove('is-invalid');         
        id_type.classList.add('is-valid');
        removeA(notValidated, 2);
    }   
});

ci.addEventListener('keyup', () => {
    if (reg.test(ci.value) == false || ci.value === '' || ci.value == null ||  ci.value.length > 9 || ci.value.length < 7) {
        ci.classList.add('is-invalid');
        if (!notValidated.includes(3)) {
            notValidated.push(3);
        }
    } else {
        ci.classList.remove('is-invalid');
        ci.classList.add('is-valid');
        removeA(notValidated, 3);           
    }
})

number_code.addEventListener('change', () => {
    if (number_code.value === "" || number_code.value == null) {
        number_code.classList.add('is-invalid');
        if (!notValidated.includes(4)) {     
            notValidated.push(4);
        }
    } else {
        number_code.classList.remove('is-invalid');         
        number_code.classList.add('is-valid');
        removeA(notValidated, 4);
    }   
});

phone_number.addEventListener('keyup', () => {
    if (reg.test(phone_number.value) == false || phone_number.value === '' || phone_number.value == null ||  phone_number.value.length > 8 || phone_number.value.length < 7){
        phone_number.classList.add('is-invalid');
        if (!notValidated.includes(5)) {
            notValidated.push(5);
        }       
    }else {
        phone_number.classList.remove('is-invalid');
        phone_number.classList.add('is-valid');
        removeA(notValidated, 5);           
    }
})

email.addEventListener('keyup', () => {
    if (emailReg.test(email.value) == false || email === "" || email == null) {
        email.classList.add('is-invalid');
        if (!notValidated.includes(6)) {
            notValidated.push(6);
        }
    }else {
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
        removeA(notValidated, 6);
    }
});

password.addEventListener('keyup', () => {
    if (password.value === "" || password.value == null || password.value.length < 8) {
        password.classList.add('is-invalid');
        if (!notValidated.includes(7)) {     
            notValidated.push(7);
        }
    } else {
        password.classList.remove('is-invalid');         
        password.classList.add('is-valid');
        removeA(notValidated, 7);
    }               
})

password_confirm.addEventListener('keyup', () => {
    if (password_confirm.value === "" || password_confirm.value == null || password_confirm.value !== password.value || password_confirm.value.length < 8) {
        password_confirm.classList.add('is-invalid');
        if (!notValidated.includes(8)) {     
            notValidated.push(8);
        }
    } else {
        password_confirm.classList.remove('is-invalid');         
        password_confirm.classList.add('is-valid');
        removeA(notValidated, 8);
    }               
})


form.addEventListener('submit', (e) => {
    if (notValidated.length > 0) {
        e.preventDefault();
    }
})

