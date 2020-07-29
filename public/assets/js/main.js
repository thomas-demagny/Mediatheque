'use strict'
/*
const { cssNumber } = require("jquery");
*/
document.addEventListener('DOMContentLoaded', function(){
    var nuit = document.getElementById('nuit');
    var body = document.querySelector('body');
    var nav = document.getElementById('mainNav');
    var card = document.getElementsByClassName('card-body');
    var tr = document.querySelectorAll('tr');
    var href = document.querySelectorAll('a');
    var input = document.querySelectorAll('input');
    var select = document.querySelectorAll('select');


    nuit.addEventListener('click', function(){
        body.classList.toggle('nuit');
        nav.classList.toggle('bx-nuit')

        for(let i = 0; i < card.length; i++){
            card[i].classList.toggle('nuit-fonce');
        }
        for(let i = 0; i < tr.length; i++){
            tr[i].classList.toggle('white');
        }
        for(let i = 0; i < href.length; i++){
            href[i].classList.toggle('white');
        }
        for(let i = 0; i < input.length; i++){
            input[i].classList.toggle('nuit-fonce');
        }
        for(let i = 0; i < select.length; i++){
            select[i].classList.toggle('nuit-fonce');
        }
    })
});