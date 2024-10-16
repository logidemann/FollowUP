@extends("layouts.app")

@section("content")
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f8f9fa;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            margin: 40px auto;
            max-width: 600px;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease;
        }

        .form-container input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        .form-container button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .form-container .btn-cancel {
            background-color: #6c757d;
            margin-top: 10px;
            display: block;
            text-align: center;
            padding: 12px 20px;
            font-size: 16px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .form-container .btn-cancel:hover {
            background-color: #5a6268;
        }

    </style>

    <h1>Modifier les informations du patient</h1>

    <div class="form-container">
        <form action="{{ route('patients.update', $patient->id) }}" method="POST">
            @csrf
            @method('POST')

            <label for="nom">Nom</label>
            <input type="text" name="nom" value="{{ $patient->nom }}" required>

            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" value="{{ $patient->prenom }}" required>

            <label for="dateNaissance">Date de Naissance</label>
            <input type="date" name="dateNaissance" value="{{ $patient->dateNaissance }}" required>

            <button type="submit">Sauvegarder</button>
        </form>

        <a href="{{ url('/patients') }}" class="btn-cancel">Annuler</a>
    </div>
@stop
