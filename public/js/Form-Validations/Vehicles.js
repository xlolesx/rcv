
const form = document.getElementById('vehicle_form');
let notValidated = [1, 2, 3];

const vehicle_brand = document.getElementById('brand');
const vehicle_model = document.getElementById('model');
const vehicle_type = document.getElementById('vehicleType');

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



vehicle_brand.addEventListener('keyup', () => {
    if (vehicle_brand.value === '' || vehicle_brand.value == null) {
        vehicle_brand.classList.add('is-invalid');
        if (!notValidated.includes(1)) {     
            notValidated.push(1);
        }
    } else {
        vehicle_brand.classList.remove('is-invalid');         
        vehicle_brand.classList.add('is-valid');
        removeA(notValidated, 1);
    }   
    console.log(notValidated);  
});

vehicle_model.addEventListener('keyup', () => {
    if (vehicle_model.value === '' || vehicle_model.value == null) {
        vehicle_model.classList.add('is-invalid');
        if (!notValidated.includes(2)) {     
            notValidated.push(2);
        }
    } else {
        vehicle_model.classList.remove('is-invalid');         
        vehicle_model.classList.add('is-valid');
        removeA(notValidated, 2);
    }   
    console.log(notValidated);  
});

vehicle_type.addEventListener('change', () => {
    if (vehicle_type.value === '' || vehicle_type.value == null) {
        vehicle_type.classList.add('is-invalid');
        if (!notValidated.includes(3)) {     
            notValidated.push(3);
        }
    } else {
        vehicle_type.classList.remove('is-invalid');         
        vehicle_type.classList.add('is-valid');
        removeA(notValidated, 3);
    }   
    console.log(notValidated);  
});

form.addEventListener('submit', (e) => {
    if (notValidated.length > 0) {
        e.preventDefault();
    }
})
