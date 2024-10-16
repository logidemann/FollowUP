<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="../../css/menu.css">
</head>
<body>
<style>
    body {
        font-family: 'Roboto', Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    /* Navbar Styling */
    nav {
        background-color: #007BFF;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px 30px;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    nav ul li {
        margin-right: 30px;
    }

    nav ul li:last-child {
        margin-right: 0;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        font-size: 18px;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    nav ul li a:hover {
        background-color: #0056b3;
        color: #fff;
    }

    .content {
        margin-top: 20px;
        padding: 20px;
    }

    /* Responsive Navbar */
    @media (max-width: 768px) {
        nav ul {
            flex-direction: column;
            text-align: center;
        }

        nav ul li {
            margin-bottom: 15px;
        }

        nav ul li a {
            font-size: 16px;
        }
    }

</style>

<!-- Navbar Section -->
<nav>
    <ul>
        <li><a href="/">Accueil</a></li>
        <li><a href="/patients">Liste de Patients</a></li>
        <li><a href="/patients_form">Ajouter un Patient</a></li>
        <li><a href="/incidents_form">Enregistrer un incident</a></li>
    </ul>
</nav>

</body>
</html>
