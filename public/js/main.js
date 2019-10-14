function panelSwitch(n) {
    var menuItems = document.getElementsByClassName('menuItem');
    var subItems = document.getElementsByClassName('subItem');
    var panelTitle = document.getElementById('panel-title');
    
    for(var i = 0; i < subItems.length; i++) {
        subItems[i].style.display = 'none';
    }
    for(var j = 0; j < menuItems.length; j++) {
        menuItems[j].classList.remove("menuItemActive");
    }
    menuItems[n].classList.add("menuItemActive");
    panelTitle.innerHTML = ": " + menuItems[n].childNodes[1].innerHTML;
    subItems[n].style.display = 'block';
}