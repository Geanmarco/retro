function abreviaturaMes(mes) {
    const meses = ["ENR", "FEBR", "MZO", "ABR", "MYO", "JUN", "JUL", "AGTO", "SPT", "OCT", "NOV", "DIC"]

    return meses[mes];

}

function abreviaturaMesIngles(mes) {
    const meses = ["JAN", "FEB", "MAR", "APR", "MAY", "JUNE", "JULY", "AUG", "SEPT", "OCT", "NOV", "DEC"];

    return meses[mes];
}

function getdiasSemanas(idioma) {
    if (idioma == 'es') {
        return ['Dom', 'Lun', 'Mar', 'Mir', 'Jue', 'Vie', 'Sab']
    } else {
        return ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fir', 'Sat']
    }

}

function formatFechaVisual(fecha) {
    let d = new Date(fecha)
    return abreviaturaMes(d.getMonth()) + " " + (d.getDate() + 1) + " del," + d.getFullYear()
}

function getMesAbreLinst(idioma) {

    if (idioma == 'es') {
        return ["En", "Febr", "Mzo", "Abr", "My", "Jun", "Jul", "Agto", "Spt", "Oct", "Nov", "Dic"];
    } else {
        return ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    }
}

function renombrarURL(url, titulo = '', data = null) {
    window.history.pushState(data, titulo, url);
}

function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function getPathURL() {
    return location.href.slice(_URL.length);
}

function _ajaxDOM(url, contenedor_id) {
    $.ajax({
        headers: {
            'token-app': localStorage.getItem("_token"),
        },
        type: 'POST',
        url: _URL + url,
        success: function (resp) {
            $("#loader-menor").hide()
            $("#" + contenedor_id).html(resp);
            var tables = document.querySelectorAll('#' + contenedor_id + ' table');

            console.log(tables)
            setTimeout(function () {
                tables.forEach(function (table) {
                    console.log($(table).hasClass("dataTable"))
                    if (!$(table).hasClass("dataTable")) {
                        $(table).DataTable({
                            paging: true,
                            bFilter: true,
                            ordering: true,
                            searching: true,
                            destroy: true
                        });
                    }
                });
            }, 200)
        }
    });

}

function alertError(title, msg) {

    return Swal.fire({
        icon: 'error',
        title: title,
        text: msg,
    })
}

function alertExito(title, msg) {
    return Swal.fire({
        icon: 'success',
        title: title,
        text: msg,
    })
}

function alertAdvertencia(title, msg) {
    return Swal.fire({
        icon: 'warning',
        title: title,
        text: msg,
    })
}

function alertInfo(title, msg) {
    return Swal.fire({
        icon: 'info',
        title: title,
        text: msg,
    })
}

function getTime() {
    var d = new Date();
    d.setHours(d.getHours()); // offset from local time
    var h = (d.getHours() % 12) || 12; // show midnight & noon as 12
    return (
        (h < 10 ? '0' : '') + h +
        (d.getMinutes() < 10 ? ':0' : ':') + d.getMinutes() +
        // optional seconds display
        // ( d.getSeconds() < 10 ? ':0' : ':') + d.getSeconds() +
        (d.getHours() < 12 ? ' AM' : ' PM')
    );

}

function _ajax(url, method, data = {}, func) {
    $.ajax({
        type: method,
        url: _URL + url,
        headers: {
            'token-app': localStorage.getItem("_token"),
        },
        data: data,
        success: function (resp) {
            $("#loader-menor").hide()
            if (isJson(resp)) {
                func(JSON.parse(resp));
            } else {
                console.log(resp)
                alertError('ERR', 'Error en el servidor')
            }

        }
    });

}

function _ajax2(url, method, data = {}, files = '', func) {
    console.log(data)

    var parametros = new FormData();


    try {
        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                parametros.append(key, data[key]);
            }
        }
        parametros.append('imagen', document.getElementById(files).files[0]);
    } catch (error) {
    }
    $.ajax({
        type: method,
        url: _URL + url,
        headers: {
            'token-app': localStorage.getItem("_token"),
        },
        processData: false,
        contentType: false,
        data: parametros,
        success: function (resp) {
            $("#loader-menor").hide()
            if (isJson(resp) || onlyTrim(resp) === '') {
                func(JSON.parse(resp));
            } else {
                console.log(resp)
                alertError('ERR', 'Error en el servidor')
            }

        }
    });

}

function downloadFile(filePath) {
    var link = document.createElement('a');
    link.href = filePath;
    link.download = filePath.substr(filePath.lastIndexOf('/') + 1);
    link.click();
}

function _post(url, data = {}, func) {
    _ajax(url, "POST", data, func)
}

function _get(url, func) {
    _ajax(url, "GET", {}, func)
}

function reloadPagDon() {

}

$(document).on('change', "input[type='file']", function (event) {
    console.log($(this));
    var card_img = this;
    var file = event.target.files[0];
    if (file && file.type.startsWith('image/')) {
        if (card_img.nextElementSibling) {
            var reader = new FileReader();
            reader.onload = function () {
                if (card_img.nextElementSibling.tagName === 'IMG') {
                    card_img.nextElementSibling.src = reader.result;
                    card_img.nextElementSibling.classList.remove('input-hidden');
                }

            }
            reader.readAsDataURL(file);
        }
    }
});
$(document).on('click', ".card-image", function (event) {
    var inputFile = this.querySelector('input[type="file"]');
    if (inputFile) {
        inputFile.click();
    }
});


function onlyTrim(str) {
    /* str = str.replace(/[^A-Za-z-0-9]+/g, '');*/
    str = str.replace(/ /g, '');
// Eliminar espacios en blanco al inicio y al final
    str = str.trim();
    return str;
}


function hastext(str_in, str) {
    str_in = str_in.toLowerCase();
    str = str_in.search(str);
    return str >= 0;
}

function onlyMoney(str) {
    str = str.replace(/[^0-9.]+/g, '');
    return str;
}

function onlyNumber(str) {
    str = str.replace(/[^0-9]+/g, '');
    return str;
}

/*
$(document).on('change', "input[type='file']", function (ev) {
    var file = ev.target.files[0];
    if (file && file.type.startsWith('image/')) {
        if (document.querySelector('#previewImage')) {
            var reader = new FileReader();
            reader.onload = function () {
                document.querySelector('#previewImage').src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    }
});*/
