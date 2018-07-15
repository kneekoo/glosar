<?php
require "clase.php";
$glosar = new Glosar();
echo $glosar->getJSObject();
?>
let termeni = objectLength(glosar);
let rezultate = 0;
let termeniPerPagina = 10;
let listaCautare = {};
let contor = {
    'stabili': 0,
    'dezbatere': 0,
    'nesortati': 0
};
let index = {
    "cautare": 0,
    "stabili": 0,
    "dezbatere": 0,
    "nesortati" : 0
}

$.each(glosar, function(termen, date) {
    let tip = tipTermen(date.observatii);
    if (tip === "stabil") {
        contor.stabili += 1;
    } else if (tip === "dezbatere") {
        contor.dezbatere += 1;
    } else {
        contor.nesortati += 1;
    }
});

$("#total").text(termeni);
$("#stabili").text(procente(contor.stabili));
$("#badge-stable").text(contor.stabili);
$("#dezbatere").text(procente(contor.dezbatere));
$("#badge-debate").text(contor.dezbatere);
$("#nesortati").text(procente(contor.nesortati));
$("#badge-unsorted").text(contor.nesortati);

$("#cauta").on("click", function() {
    console.log("în lucru");
});

$("#termen").on("input", function() {
    afiseazaTermenii("cautare");
});

function inStr(search, string) {
    return string.indexOf(search) !== -1;
}

function procente(n) {
    return (n * 100 / termeni).toFixed(1) + "%"
}

function afiseazaTermenii(categorie) {
    listaCautare = {};
    switch (categorie) {
        case "cautare":
            let cautare = $("#termen").val();
            rezultate = 0;
            $.each(glosar, function(termen, date) {
                if (termen.startsWith(cautare.toLowerCase())) {
                    rezultate += 1;
                    listaCautare[termen] = date;
                }
            });
            break;
        case "stabili":
            break;
        case "dezbatere":
            break;
        case "nesortati":
            break;
    }
    makeRows(listaCautare);
}

function makeRows(data) {
    $("#data").empty();
    if (cautareGoala()) {
        $("#cautati").text("0");
        $("#data").html('<tr><th scope="row" colspan="3"></th></tr>');
    } else {
        $("#cautati").text(rezultate);
        $.each(data, function(termen, date) {
            let clasa = "";
            if (paginaActiva("cautare")) {
                clasa = clasaTip(date.observatii);
            }
            let row = "<tr" + clasa + ">";
            row += "<td>" + termen + "</td>";
            row += "<td>" + date.traducere + "</td>";
            row += "<td>" + date.observatii + "</td></tr>";
            $("#data").append(row);
        });
    }
}

function paginaActiva(id) {
    return $("#tab-" + id).attr("aria-selected") === "true";
}

function clasaTip(observatii) {
    let tip = tipTermen(observatii);
    if (tip === "stabil") {
        return ' class="alert-success"';
    } else if (tip === "dezbatere") {
        return ' class="alert-danger"';
    } else {
        return ' class="alert-warning"'
    }
}

function objectLength(object) {
    return Object.keys(object).length;
}

$("#termeniPerPagina a").on("click", function() {
    $("#perPagina span").text($(this).text());
});

function cautareGoala() {
    return $("#termen").val() === "" ? true : false;
}
function tipTermen(termen) {
    return inStr("!", termen) ? "stabil" : (inStr("?", termen) ? "dezbatere" : "nesortat");
}
