@extends("layouts.app")

@section("content")
    <style>
        h1 {
            font-size: 30px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Arial', sans-serif;
            text-transform: uppercase;
        }

        h1::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: #007bff;
            margin: 10px auto;
            border-radius: 5px;
        }

        form {
            background-color: white;
            padding: 30px;
            margin: 30px auto;
            max-width: 500px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        form:hover {
            box-shadow: 0 8px 24px rgba(0, 123, 255, 0.3);
        }

        form label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        form input[type="text"],
        form input[type="date"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        form input[type="text"]:focus,
        form input[type="date"]:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Button */
        form button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            width: 100%;
            cursor: pointer;
            text-transform: uppercase;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        form button:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 12px rgba(0, 86, 179, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 20px;
            }

            form input {
                font-size: 15px;
            }

            h1 {
                font-size: 26px;
            }
        }
    </style>

    <h1>Ajouter un Patient</h1>

    <form action='{{ route('patients.create') }}' method='POST'>
        @csrf

        <!-- Nom du patient -->
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" placeholder="Entrez le nom du patient" required>

        <!-- Prénom du patient -->
        <label for="prenom">Prénom:</label>
        <input type="text" name="prenom" id="prenom" placeholder="Entrez le prénom du patient" required>

        <!-- Date de naissance du patient -->
        <label for="dateNaissance">Date de Naissance:</label>
        <input type="date" name="dateNaissance" id="dateNaissance" required>

        <!-- Bouton de soumission -->
        <button type="submit">Ajouter Patient</button>
    </form>
@stop
