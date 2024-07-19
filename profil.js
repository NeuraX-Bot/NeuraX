document.addEventListener('DOMContentLoaded', () => {
    // Vérifier si l'utilisateur est connecté
    if (!localStorage.getItem('loggedIn')) {
        window.location.href = 'login.html';
    }

    // Charger les données du profil
    const loadProfile = () => {
        const profile = JSON.parse(localStorage.getItem('userProfile')) || {
            name: 'Nom de l\'utilisateur',
            email: 'example@example.com',
            phone: '+33 6 12 34 56 78',
            pic: 'https://via.placeholder.com/120'
        };

        document.getElementById('profile-name').textContent = profile.name;
        document.getElementById('profile-email').textContent = `Email : ${profile.email}`;
        document.getElementById('profile-phone').textContent = `Téléphone : ${profile.phone}`;
        document.getElementById('profile-pic').src = profile.pic;
    };

    loadProfile();

    // Afficher le formulaire de modification
    document.getElementById('edit-button').addEventListener('click', () => {
        document.getElementById('edit-form').style.display = 'block';
    });

    // Masquer le formulaire de modification
    document.getElementById('cancel-button').addEventListener('click', () => {
        document.getElementById('edit-form').style.display = 'none';
    });

    // Sauvegarder les modifications du profil
    document.getElementById('profile-form').addEventListener('submit', (event) => {
        event.preventDefault();

        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const pic = document.getElementById('pic').value;

        const updatedProfile = { name, email, phone, pic };
        localStorage.setItem('userProfile', JSON.stringify(updatedProfile));

        loadProfile();
        document.getElementById('edit-form').style.display = 'none';
    });

    // Déconnexion
    document.getElementById('logout-button').addEventListener('click', () => {
        localStorage.removeItem('loggedIn');
        localStorage.removeItem('userProfile');
        window.location.href = 'login.html';
    });
});
