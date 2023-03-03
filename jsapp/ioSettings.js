var app = document.getElementById('appUIbody');
var settingsapp = document.getElementById('appSettings');

function appSettings() {
    settingsapp.classList.remove('div_Away'); settingsapp.classList.add('div_Show');
    app.classList.remove('blur_Off'); app.classList.add('blur_On')

}

function closeSettings () {
    app.classList.remove('blur_On'); app.classList.add('blur_Off');
    settingsapp.classList.remove('div_Show'); settingsapp.classList.add('div_Away');
}