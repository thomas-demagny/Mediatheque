'use strict'
document.addEventListener('DOMContentLoaded', function(){
    // INIT VAR
    var nuit = document.getElementById('nuit');
    var body = document.querySelector('body');
    var nav = document.getElementById('mainNav');
    var card = document.getElementsByClassName('card-body');
    var tr = document.querySelectorAll('tr');
    var drop = document.getElementsByClassName('dropdown-menu')
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

    /* *//* CODE *//* */

    localStorage.setItem('access', 'day');
    console.log('start page with: ' + localStorage['access'])

    // test after page loaded 'night' or 'day'
    if(localStorage['access'] == 'night'){
        darkness();
        nuit.checked = true
        console.log(' ')
        console.log('confirmation: ' + localStorage['access'])
        console.log(' ')
    }
    else if(localStorage['access'] == 'day'){
        brightness();
        nuit.checked = false
        console.log(' ')
        console.log('confirmation: ' + localStorage['access'])
        console.log(' ')
    }
    
    // listener on btn-toggle
    nuit.addEventListener('click', function(){
        if(localStorage['access'] == 'day'){
            console.log('ifDayBefore: ' + localStorage['access'])
            localStorage.removeItem('access', 'day');
            localStorage.setItem('access', 'night');
            console.log('ifDayAfter: ' + localStorage['access'])
            darkness();
        }
        else if(localStorage['access'] == 'night'){
            console.log('night')
            console.log('ifNigthBefore: ' + localStorage['access'])
            localStorage.removeItem('access', 'night');
            localStorage.setItem('access', 'day');
            console.log('ifNightAfter: ' + localStorage['access'])
            brightness();
        }
        console.log('end: ' + localStorage['access'])
        
    })

    // MODAL
    // Get the modal
    /*
    var modal = document.getElementById("myModal");
    var connexion = document.getElementById('connexion');
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the link, open the modal 
    connexion.addEventListener('click', function(){
        modal.style.display = "block";
    })

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    */
});