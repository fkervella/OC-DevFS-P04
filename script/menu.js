document.getElementById('burgerMenu').addEventListener('click', function() {
    
    let menu = document.getElementById('menuContent');

    console.log(menu)

    if (menu.style.display == "" || menu.style.display == "none")
        menu.style.display = 'flex'

    else
        menu.style.display = 'none'
});
