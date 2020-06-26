function activarDesactivarPrecio(id) {
    var s1 = document.getElementById('economico');
    var s2 = document.getElementById('regular');
    var s3 = document.getElementById('premium');

    switch (id) {
        case 1:
            if (s1.checked) {
                s2.checked = false;
                s3.checked = false;

                s1.value = 1;
                s2.value = 0;
                s3.value = 0;
            }else{
                s2.checked = true;
            }
            break;
        case 2:
            if (s2.checked) {
                s1.checked = false;
                s3.checked = false;

                s1.value = 0;
                s2.value = 1;
                s3.value = 0;
            }else{
                s1.checked = true;
            }
            break;
        case 3:
            if (s3.checked) {
                s1.checked = false;
                s2.checked = false;

                s1.value = 0;
                s2.value = 0;
                s3.value = 1;
            }else{
                s2.checked = true;
            }
            break;
    }
}

function activarDesactivarTurista(id) {
    var s1 = document.getElementById('ninos');
    var s2 = document.getElementById('adultos');
    var s3 = document.getElementById('todos');

    switch (id) {
        case 1:
            if (s1.checked) {
                s2.checked = false;
                s3.checked = false;

                s1.value = 1;
                s2.value = 0;
                s3.value = 0;
            }else{
                s2.checked = true;
            }
            break;
        case 2:
            if (s2.checked) {
                s1.checked = false;
                s3.checked = false;

                s1.value = 0;
                s2.value = 1;
                s3.value = 0;
            }else{
                s3.checked = true;
            }
            break;
        case 3:
            if (s3.checked) {
                s1.checked = false;
                s2.checked = false;

                s1.value = 0;
                s2.value = 0;
                s3.value = 1;
            }else{
                s1.checked = true;
            }
            break;
    }
}
function activarDesactivarActividad(id) {
    var s1 = document.getElementById('cultural');
    var s2 = document.getElementById('aventura');
    var s3 = document.getElementById('playa');

    switch (id) {
        case 1:
            if (s1.checked) {
                s2.checked = false;
                s3.checked = false;

                s1.value = 1;
                s2.value = 0;
                s3.value = 0;
            }else{
                s2.checked = true;
            }
            break;
        case 2:
            if (s2.checked) {
                s1.checked = false;
                s3.checked = false;

                s1.value = 0;
                s2.value = 1;
                s3.value = 0;
            }else{
                s1.checked = true;
            }
            break;
        case 3:
            if (s3.checked) {
                s1.checked = false;
                s2.checked = false;

                s1.value = 0;
                s2.value = 0;
                s3.value = 1;
            }else{
                s2.checked = true;
            }
            break;
    }
}