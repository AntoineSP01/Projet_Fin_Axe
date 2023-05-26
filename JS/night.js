document.addEventListener('DOMContentLoaded', function () {
    var isDarkMode = localStorage.getItem('darkMode') === 'true';

    // Définir le mode sombre initial basé sur ce qui est stocké dans localStorage
    if (isDarkMode) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }

    document.getElementById('dark-mode-toggle').addEventListener('click', function(e) {
        e.preventDefault(); 

        // Bascule le mode sombre
        document.body.classList.toggle('dark');

        // Mettre à jour le localStorage avec le nouvel état
        isDarkMode = !isDarkMode;
        localStorage.setItem('darkMode', isDarkMode.toString());
    });

    document.getElementById('dark-mode-toggle1').addEventListener('click', function(e) {
        e.preventDefault(); 

        // Bascule le mode sombre
        document.body.classList.toggle('dark');

        // Mettre à jour le localStorage avec le nouvel état
        isDarkMode = !isDarkMode;
        localStorage.setItem('darkMode', isDarkMode.toString());
    });

    document.getElementById('dark-mode-toggle2').addEventListener('click', function(e) {
        e.preventDefault(); 

        // Bascule le mode sombre
        document.body.classList.toggle('dark');

        // Mettre à jour le localStorage avec le nouvel état
        isDarkMode = !isDarkMode;
        localStorage.setItem('darkMode', isDarkMode.toString());
    });
});
