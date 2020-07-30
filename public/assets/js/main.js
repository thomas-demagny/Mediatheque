'use strict'
document.addEventListener('DOMContentLoaded', function(){
    // INIT VAR
    var nuit = document.getElementById('nuit');
    var body = document.querySelector('body');
    var nav = document.getElementById('mainNav');
    var card = document.getElementsByClassName('card-body');
    var tr = document.querySelectorAll('tr');
    var href = document.querySelectorAll('a');
    var input = document.querySelectorAll('input');
    var select = document.querySelectorAll('select');

    // FUNCTIONS
    function darkness(){
        body.classList.add('nuit');
        nav.classList.add('bx-nuit');
        for(let i = 0; i < card.length; i++){
            card[i].classList.add('nuit-fonce');
        }
        for(let i = 0; i < tr.length; i++){
            tr[i].classList.add('white');
        }
        for(let i = 0; i < href.length; i++){
            href[i].classList.add('white');
        }
        for(let i = 0; i < input.length; i++){
            input[i].classList.add('nuit-fonce');
        }
        for(let i = 0; i < select.length; i++){
            select[i].classList.add('nuit-fonce');
        }
        for(let i = 0; i < drop.length; i++){
            drop[i].classList.add('nuit-fonce')
            drop[i].classList.add('bx-day')
        }
    }
    function brightness(){
        body.classList.remove('nuit');
        nav.classList.remove('bx-nuit');
        for(let i = 0; i < card.length; i++){
            card[i].classList.remove('nuit-fonce');
        }
        for(let i = 0; i < tr.length; i++){
            tr[i].classList.remove('white');
        }
        for(let i = 0; i < href.length; i++){
            href[i].classList.remove('white');
        }
        for(let i = 0; i < input.length; i++){
            input[i].classList.remove('nuit-fonce');
        }
        for(let i = 0; i < select.length; i++){
            select[i].classList.remove('nuit-fonce');
        }
        for(let i = 0; i < drop.length; i++){
            drop[i].classList.remove('nuit-fonce')
            drop[i].classList.remove('bx-day')
        }
    }

    // CODE
    localStorage.setItem('access', 'day');
    console.log(localStorage['access'])

    // test après chargement de la page 'night' or 'day'
    if(localStorage['access'] == 'night'){
        darkness();
        nuit.checked = true
        console.log('night confirmation')
    }
    else if(localStorage['access'] == 'day'){
        brightness();
        nuit.checked = false
        console.log('day confirmation')
    }
    
    // listener on btn-toggle
    nuit.addEventListener('click', function(){
        if(localStorage['access'] == 'day'){
            localStorage.removeItem('access', 'day');
            localStorage.setItem('access', 'night');
            darkness();
        }
        else if(localStorage['access'] == 'night'){
            localStorage.removeItem('access', 'night');
            localStorage.setItem('access', 'day');
            brightness();
        }
        console.log(localStorage['access'])
        
    })
});