function init() {
    sel1 = document.querySelector('.company_select');
    sel2 = document.querySelector('.contact_select');
    options2 = sel2.querySelectorAll('option');
}

function giveSelection(selValue) {
    sel2.innerHTML = '';
    console.log(selValue);

    for (var i = 0; i < options2.length; i++) {
        if (options2[i].dataset.id === selValue) {
            sel2.appendChild(options2[i]);
        }
    }
}


