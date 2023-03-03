var appS0 = document.getElementById('appS0');
var appS1 = document.getElementById('appS1');
var appB0 = document.getElementById('appB0');
var appB1 = document.getElementById('appB1');
var appB2 = document.getElementById('appB2');
var appD0 = document.getElementById('appD0');
var appD1 = document.getElementById('appD1');
var appD2 = document.getElementById('appD2');

var ls0 = document.getElementById('appLS0');
var ls1 = document.getElementById('appLS1');

var lb0 = document.getElementById('appLB0');
var lb1 = document.getElementById('appLB1');
var lb2 = document.getElementById('appLB2');

var ld0 = document.getElementById('appLD0');
var ld1 = document.getElementById('appLD1');
var ld2 = document.getElementById('appLD2');

function toAppS0 () {
    appS0.classList.add('div_Show');
    appS0.classList.remove('div_Away');
    appS1.classList.remove('div_Show');
    appS1.classList.add('div_Away');
    ls1.classList.remove('active');
    ls0.classList.add('active');
}

function toAppS1 () {
    appS1.classList.add('div_Show');
    appS1.classList.remove('div_Away');
    appS0.classList.remove('div_Show');
    appS0.classList.add('div_Away');
    ls0.classList.remove('active');
    ls1.classList.add('active');
}

function toAppB0 () {
    appB0.classList.add('div_Show');
    appB0.classList.remove('div_Away');
    appB1.classList.remove('div_Show');
    appB2.classList.remove('div_Show');
    appB1.classList.add('div_Away');
    appB2.classList.add('div_Away');
    lb1.classList.remove('active');
    lb2.classList.remove('active');
    lb0.classList.add('active');
}

function toAppB1 () {
    appB1.classList.add('div_Show');
    appB1.classList.remove('div_Away');
    appB0.classList.remove('div_Show');
    appB2.classList.remove('div_Show');
    appB0.classList.add('div_Away');
    appB2.classList.add('div_Away');
    lb0.classList.remove('active');
    lb2.classList.remove('active');
    lb1.classList.add('active');
}

function toAppB2 () {
    appB2.classList.add('div_Show');
    appB2.classList.remove('div_Away');
    appB0.classList.remove('div_Show');
    appB1.classList.remove('div_Show');
    appB0.classList.add('div_Away');
    appB1.classList.add('div_Away');
    lb0.classList.remove('active');
    lb1.classList.remove('active');
    lb2.classList.add('active');
}

function toAppD0 () {
    appD0.classList.add('div_Show');
    appD0.classList.remove('div_Away');
    appD1.classList.remove('div_Show');
    appD2.classList.remove('div_Show');
    appD1.classList.add('div_Away');
    appD2.classList.add('div_Away');
    ld1.classList.remove('active');
    ld2.classList.remove('active');
    ld0.classList.add('active');
}

function toAppD1 () {
    appD1.classList.add('div_Show');
    appD1.classList.remove('div_Away');
    appD0.classList.remove('div_Show');
    appD2.classList.remove('div_Show');
    appD0.classList.add('div_Away');
    appD2.classList.add('div_Away');
    ld0.classList.remove('active');
    ld2.classList.remove('active');
    ld1.classList.add('active');
}

function toAppD2 () {
    appD2.classList.add('div_Show');
    appD2.classList.remove('div_Away');
    appD0.classList.remove('div_Show');
    appD1.classList.remove('div_Show');
    appD0.classList.add('div_Away');
    appD1.classList.add('div_Away');
    ld0.classList.remove('active');
    ld1.classList.remove('active');
    ld2.classList.add('active');
}