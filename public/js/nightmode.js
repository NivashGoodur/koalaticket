let night = document.getElementById("night");
night.addEventListener("click", nightmode);
var body = document.getElementById("body");
var header = document.getElementById("header");
var user = document.getElementById("user");
var statut = document.querySelector(".statut");
var userMenu = document.querySelector(".user_menu");
var ticketForm = document.querySelector(".ticket_form");
var ticketInformation = document.querySelector(".ticket_information");

function nightmode() {

    if (body != null) {
        body.classList.toggle('night_background');
    }

    if (header != null) {
        header.classList.toggle('night_background_more');
    }

    if (user != null) {
        user.classList.toggle('night_background_more_plus');
    }

    if (statut != null) {
        statut.classList.toggle('night_background_more_plus');
    }

    if (userMenu != null) {
        userMenu.classList.toggle('night_background');
    }

    if (ticketForm != null) {
        ticketForm.classList.toggle('night_background_more');
    }

    if (ticketInformation != null) {
        ticketInformation.classList.toggle('night_background_more');
    }

    if (loginInput != null) {
        loginInput.classList.toggle('night_background_more_plus');
    }

    var loginInput = document.querySelectorAll('.login_input');
    if (loginInput != null) {

        loginInput.forEach((b)=> {
        b.classList.toggle('night_background_more_plus');
        });

    }

    var informationBox = document.querySelectorAll('.ticket_information_box');
    if (informationBox != null) {

        informationBox.forEach((b)=> {
        b.classList.toggle('night_background_more_plus');
        });

    }

    var ticket = document.querySelectorAll('.ticket_night');
    ticket.forEach((b)=> {
    b.classList.toggle('night_background_more_plus');
    });

    var open = document.querySelectorAll('.opened');
    open.forEach((b)=> {
    b.classList.toggle('night_background_more');
    });
}