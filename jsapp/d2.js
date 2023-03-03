var imgD2 = document.getElementById('d2UserIMG');
var imgD2e = document.getElementById('d2EditIMG');
var imgD2d = document.getElementById('d2DeleteIMG');
var screenD2 = document.getElementById('d2AddUser');
var screenD2e = document.getElementById('d2EditUsers');
var screenD2d = document.getElementById('d2DeleteUsers');
var d2Counter0 = 0;
var d2Counter1 = 0;
var d2Counter2 = 0;

function toggleUserAdd () {
    if(d2Counter0 == 1) {
        screenD2.classList.remove('div_Away'); screenD2.classList.add('div_Show')
        imgD2.src = "icons/closeBtn.png";
        d2Counter0--;
    } else if (d2Counter0 == 0)  {
        screenD2.classList.remove('div_Show'); screenD2.classList.add('div_Away')
        imgD2.src = "icons/addUser.png";
        d2Counter0++;
    }
}

function toggleUserEdit () {
    if(d2Counter1 == 1) {
        screenD2e.classList.remove('div_Away'); screenD2e.classList.add('div_Show')
        imgD2e.src = "icons/closeBtn.png";
        d2Counter1--;
    } else if (d2Counter1 == 0)  {
        screenD2e.classList.remove('div_Show'); screenD2e.classList.add('div_Away')
        imgD2e.src = "icons/editUser.png";
        d2Counter1++;
    }
}

function toggleUserDel () {
    if(d2Counter2 == 1) {
        screenD2d.classList.remove('div_Away'); screenD2d.classList.add('div_Show')
        imgD2d.src = "icons/closeBtn.png";
        d2Counter2--;
    } else if (d2Counter2 == 0)  {
        screenD2d.classList.remove('div_Show'); screenD2d.classList.add('div_Away')
        imgD2d.src = "icons/deleteUser.png";
        d2Counter2++;
    }
}