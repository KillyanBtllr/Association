$(document).ready(function () {
    var menuWrapper = $('.menu');
    var menuButton = $('.menu .menubutton');
    var menuItems = $('.menu ul li a');
    var listItem = $('.menu ul li');

    var tekstSpeed = 350;
    var sizeSpeed = 300;

    // Fonction pour activer ou désactiver tout le menu
    toggleAll = function () {
        if (!menuWrapper.hasClass('toggled')) {
            // Trouve la largeur maximale parmi tous les éléments du menu
            var width = 0;
            menuItems.each(function () {
                var thisWidth = $(this).width();
                if (thisWidth > width) {
                    width = thisWidth;
                }
            });
            width = width + 100;
        } else {
            var width = 100;
        }
        menuWrapper.animate({ width: width }, sizeSpeed);

        // Active ou désactive tous les éléments du menu
        menuItems.animate({ opacity: 'toggle' }, tekstSpeed);
        menuWrapper.toggleClass('toggled');
        menuItems.removeClass('clicktoggled');
        listItem.removeClass('listActive');
    }

    // Activation du menu lors du clic sur le bouton du menu
    menuButton.click(function (event) {
        event.stopPropagation(); // Empêche la propagation du clic aux autres éléments
        toggleAll();
    });

    // Activation du menu lors du clic sur n'importe quel élément du menu
    listItem.click(function (event) {
        var clickedElement = $(event.target);
        if (clickedElement.is('a') && !clickedElement.hasClass('menutekst')) {
            // Si le clic est sur un lien et n'est pas la classe 'menutekst', alors redirige
            window.location.href = clickedElement.attr('href');
            return;
        }
        toggleAll();
    });

    // Activation du menu lors de la pression de la touche "Escape"
    $(document).keyup(function (e) {
        if (e.keyCode == 27) { // La touche "Escape" correspond au code de touche `27`
            if (menuWrapper.hasClass('toggled')) {
                toggleAll();
            }
        }
    });

    // Activation du menu lors du clic en dehors du menu
    $('body').click(function (event) {
        if (menuWrapper.hasClass('toggled') && !$(event.target).closest('.menu').length) {
            toggleAll();
        }
    });

});
