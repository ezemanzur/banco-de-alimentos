//Switch de panel
function panelSwitch(n) {
    var menuItems = document.getElementsByClassName('menuItem');
    var subItems = document.getElementsByClassName('subItem');
    
    for(var i = 0; i < subItems.length; i++) {
        subItems[i].style.display = 'none';
        menuItems[i].classList.remove("menuItemActive");
    }
    menuItems[n].classList.add("menuItemActive");
    subItems[n].style.display = 'block';
}

//Esconder titulo
function hideProductAdd() {
    var title = document.getElementsByClassName("add-product");
    title[0].style.display = "none";
    document.getElementById("collapseProduct").style.display = "block";
}

//Mostrar resumen
function showResumeDonation(n,id) {
    var cards = document.getElementsByClassName(id);
    for(var i = 0; i < cards.length; i++) {
        cards[i].style.display = 'none';
    }
    cards[n].style.display = 'block';
}

function hideResumeDonation(id) {
    var cards = document.getElementsByClassName(id);
    for(var i = 0; i < cards.length; i++) {
        cards[i].style.display = 'none';
    }
}

function showModifyAmount(n) {
    var form = document.getElementById(n);
    var forms = document.getElementsByClassName('modifyAmountForm');
    for(var i = 0; i < forms.length; i++) {
        forms[i].style.display = 'none';
    }
    if (form.style.display == "block") {
        form.style.display = "none"
    }
    else {
        form.style.display = "block"
    }
}