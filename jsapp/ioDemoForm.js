function ioDemoFormNextChild0() {
    var s0 = document.getElementById('ioDemoForm0');
    var s1 = document.getElementById('ioDemoForm1');
    var b0 = document.getElementById('ioDemoFormBtnRight0');
    var b1 = document.getElementById('ioDemoFormBtnRight1');
    var b3 = document.getElementById('ioDemoFormLeftBtn');

    if ( s0.classList.contains('div_Show')) {
        s0.classList.remove('div_Show');
        s1.classList.add('div_Show');
        s0.classList.add('div_Away');
        s1.classList.remove('div_Away');
        b0.classList.remove('div_Show');
        b0.classList.add('div_Away');
        b1.classList.remove('div_Away');
        b1.classList.add('div_Show')
        b3.classList.remove('div_Away');
        b3.classList.add('div_Show');
    }
}

function ioDemoFormBack(){
    var s0 = document.getElementById('ioDemoForm0');
    var s1 = document.getElementById('ioDemoForm1');
    var b0 = document.getElementById('ioDemoFormBtnRight0');
    var b1 = document.getElementById('ioDemoFormBtnRight1');
    var b3 = document.getElementById('ioDemoFormLeftBtn');

    if ( s0.classList.contains('div_Away')) {
        s0.classList.remove('div_Away');
        s1.classList.add('div_Away');
        s0.classList.add('div_Show');
        s1.classList.remove('div_Show');
        b0.classList.remove('div_Away');
        b0.classList.add('div_Show');
        b1.classList.remove('div_Show');
        b1.classList.add('div_Away')
        b3.classList.remove('div_Show');
        b3.classList.add('div_Away');
    }
}

function ioSkipDemo () {
    var demo = document.getElementById('ioDemoApp');
    var app = document.getElementById('appUIbody');

    demo.classList.remove('div_Show');
    demo.classList.add('div_Away');
    app.classList.remove('div_Away');
    app.classList.add('div_Show');
}