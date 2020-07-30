    const form = document.getElementById('offices_form');
    let notValidated = [1, 2, 3, 4];

    const address = document.getElementById('address');
    const estado = document.getElementById('estado');
    const municipio = document.getElementById('municipio');
    const parroquia = document.getElementById('parroquia');

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

    address.addEventListener('keyup', () => {
        if (address.value === '' || address.value == null) {
            address.classList.add('is-invalid');
            if (!notValidated.includes(1)) {     
                notValidated.push(1);
            }
        } else {
            address.classList.remove('is-invalid');         
            address.classList.add('is-valid');
            removeA(notValidated, 1);
        }   
        console.log(notValidated);  
    });

    estado.addEventListener('change', () => {
        if (estado.value === '' || estado.value == null) {
            estado.classList.add('is-invalid');
            if (!notValidated.includes(2)) {     
                notValidated.push(2);
            }
        } else {
            estado.classList.remove('is-invalid');         
            estado.classList.add('is-valid');
            removeA(notValidated, 2);
        }   
        console.log(notValidated);  
    });

    municipio.addEventListener('change', () => {
        if (municipio.value === '' || municipio.value == null) {
            municipio.classList.add('is-invalid');
            if (!notValidated.includes(3)) {     
                notValidated.push(3);
            }
        } else {
            municipio.classList.remove('is-invalid');         
            municipio.classList.add('is-valid');
            removeA(notValidated, 3);
        }   
        console.log(notValidated);  
    });

    parroquia.addEventListener('change', () => {
        if (parroquia.value === '' || parroquia.value == null) {
            parroquia.classList.add('is-invalid');
            if (!notValidated.includes(4)) {     
                notValidated.push(4);
            }
        } else {
            parroquia.classList.remove('is-invalid');         
            parroquia.classList.add('is-valid');
            removeA(notValidated, 4);
        }       
        console.log(notValidated);  
    });

    form.addEventListener('submit', (e) => {
        if (notValidated.length > 0) {
            e.preventDefault();
        }
    })