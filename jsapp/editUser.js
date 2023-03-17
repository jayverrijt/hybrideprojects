function ioEditUserSwitch () {
    var sel = document.getElementById('editUserSel');
    var edit = document.getElementById('editUser');

    if (sel.classList.contains('div_Show')) {
        sel.classList.remove('div_Show')
        sel.classList.add('div_Away')
        edit.classList.remove('div_Away')
        edit.classList.add('div_Show')
    }
}