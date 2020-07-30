    const form = document.getElementById('price_form')
    const description_valid = document.getElementById('description');
    const damage_things_valid = document.getElementById('damage_things');
    const premium1_valid = document.getElementById('premium1');
    const damage_people_valid = document.getElementById('damage_people');
    const premium2_valid = document.getElementById('premium2');
    const disability_valid = document.getElementById('disability');
    const premium3_valid = document.getElementById('premium3');
    const legal_assistance_valid = document.getElementById('legal_assistance');
    const premium4_valid = document.getElementById('premium4');
    const death_valid = document.getElementById('death');
    const premium5_valid = document.getElementById('premium5');
    const medical_expenses_valid = document.getElementById('medical_expenses');
    const premium6_valid = document.getElementById('premium6');
    const crane_valid = document.getElementById('crane');

    const priceReg = /^[0-9.,]+$/;
    let notValidated = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];

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

    description_valid.addEventListener('keyup', () => {
        console.log(notValidated);
        if (description_valid.value === "" || description_valid.value == null) {
            description_valid.classList.add('is-invalid');
            if (!notValidated.includes(1)) {
                notValidated.push(1);
            }
        } else {
            description_valid.classList.remove('is-invalid');         
            description_valid.classList.add('is-valid');
            removeA(notValidated, 1);
        }
    })

    damage_things_valid.addEventListener('keyup', () => {
        if (damage_things_valid.value === "" || damage_things_valid.value == null || priceReg.test(damage_things_valid.value) == false) {
            damage_things_valid.classList.add('is-invalid');
            if (!notValidated.includes(2)) {
                notValidated.push(2);
            }
        } else {
            damage_things_valid.classList.remove('is-invalid');         
            damage_things_valid.classList.add('is-valid');
            removeA(notValidated, 2);
        }
    })

    premium1_valid.addEventListener('keyup', () => {
        if (premium1_valid.value === "" || premium1_valid.value == null || priceReg.test(premium1_valid.value) == false) {
            premium1_valid.classList.add('is-invalid');
            if (!notValidated.includes(3)) {
                notValidated.push(3);
            }
        } else {
            premium1_valid.classList.remove('is-invalid');         
            premium1_valid.classList.add('is-valid');
            removeA(notValidated, 3);
        }
    })

    damage_people_valid.addEventListener('keyup', () => {
        if (damage_people_valid.value === "" || damage_people_valid.value == null || priceReg.test(damage_people_valid.value) == false) {
            damage_people_valid.classList.add('is-invalid');
            if (!notValidated.includes(4)) {
                notValidated.push(4);
            }
        } else {
            damage_people_valid.classList.remove('is-invalid');         
            damage_people_valid.classList.add('is-valid');
            removeA(notValidated, 4);
        }
    })

    premium2_valid.addEventListener('keyup', () => {
        if (premium2_valid.value === "" || premium2_valid.value == null || priceReg.test(premium2_valid.value) == false) {
            premium2_valid.classList.add('is-invalid');
            if (!notValidated.includes(5)) {
                notValidated.push(5);
            }
        } else {
            premium2_valid.classList.remove('is-invalid');         
            premium2_valid.classList.add('is-valid');
            removeA(notValidated, 5);
        }
    })

    disability_valid.addEventListener('keyup', () => {
        if (disability_valid.value === "" || disability_valid.value == null || priceReg.test(disability_valid.value) == false) {
            disability_valid.classList.add('is-invalid');
            if (!notValidated.includes(6)) {
                notValidated.push(6);
            }
        } else {
            disability_valid.classList.remove('is-invalid');         
            disability_valid.classList.add('is-valid');
            removeA(notValidated, 6);
        }
    })

    premium3_valid.addEventListener('keyup', () => {
        if (premium3_valid.value === "" || premium3_valid.value == null || priceReg.test(premium3_valid.value) == false) {
            premium3_valid.classList.add('is-invalid');
            if (!notValidated.includes(7)) {
                notValidated.push(7);
            }
        } else {
            premium3_valid.classList.remove('is-invalid');         
            premium3_valid.classList.add('is-valid');
            removeA(notValidated, 7);
        }
    })

    legal_assistance_valid.addEventListener('keyup', () => {
        if (legal_assistance_valid.value === "" || legal_assistance_valid.value == null || priceReg.test(legal_assistance_valid.value) == false) {
            legal_assistance_valid.classList.add('is-invalid');
            if (!notValidated.includes(8)) {
                notValidated.push(8);
            }
        } else {
            legal_assistance_valid.classList.remove('is-invalid');         
            legal_assistance_valid.classList.add('is-valid');
            removeA(notValidated, 8);
        }
    })

    premium4_valid.addEventListener('keyup', () => {
        if (premium4_valid.value === "" || premium4_valid.value == null || priceReg.test(premium4_valid.value) == false) {
            premium4_valid.classList.add('is-invalid');
            if (!notValidated.includes(9)) {
                notValidated.push(9);
            }
        } else {
            premium4_valid.classList.remove('is-invalid');         
            premium4_valid.classList.add('is-valid');
            removeA(notValidated, 9);
        }
    })

    death_valid.addEventListener('keyup', () => {
        if (death_valid.value === "" || death_valid.value == null || priceReg.test(death_valid.value) == false) {
            death_valid.classList.add('is-invalid');
            if (!notValidated.includes(10)) {
                notValidated.push(10);
            }
        } else {
            death_valid.classList.remove('is-invalid');         
            death_valid.classList.add('is-valid');
            removeA(notValidated, 10);
        }
    })

    premium5_valid.addEventListener('keyup', () => {
        if (premium5_valid.value === "" || premium5_valid.value == null || priceReg.test(premium5_valid.value) == false) {
            premium5_valid.classList.add('is-invalid');
            if (!notValidated.includes(11)) {
                notValidated.push(11);
            }
        } else {
            premium5_valid.classList.remove('is-invalid');         
            premium5_valid.classList.add('is-valid');
            removeA(notValidated, 11);
        }
    })

    medical_expenses_valid.addEventListener('keyup', () => {
        if (medical_expenses_valid.value === "" || medical_expenses_valid.value == null || priceReg.test(medical_expenses_valid.value) == false) {
            medical_expenses_valid.classList.add('is-invalid');
            if (!notValidated.includes(12)) {
                notValidated.push(12);
            }
        } else {
            medical_expenses_valid.classList.remove('is-invalid');         
            medical_expenses_valid.classList.add('is-valid');
            removeA(notValidated, 12);
        }
    })

    premium6_valid.addEventListener('keyup', () => {
        if (premium6_valid.value === "" || premium6_valid.value == null || priceReg.test(premium6_valid.value) == false) {
            premium6_valid.classList.add('is-invalid');
            if (!notValidated.includes(13)) {
                notValidated.push(13);
            }
        } else {
            premium6_valid.classList.remove('is-invalid');         
            premium6_valid.classList.add('is-valid');
            removeA(notValidated, 13);
        }
    })

    crane_valid.addEventListener('keyup', () => {
        if (crane_valid.value === "" || crane_valid.value == null || priceReg.test(crane_valid.value) == false) {
            crane_valid.classList.add('is-invalid');
            if (!notValidated.includes(14)) {
                notValidated.push(14);
            }
        } else {
            crane_valid.classList.remove('is-invalid');         
            crane_valid.classList.add('is-valid');
            removeA(notValidated, 14);
        }
    })

    form.addEventListener('submit', (e) => {
        if (notValidated.length > 0) {
            e.preventDefault();
        }
    }) 