@extends("layouts.app")

@section("content")
    <style>
        .form-container {
            background-color: white;
            padding: 30px;
            margin: 30px auto;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
        }

        .form-container .btn-cancel:hover {
            background-color: #5a6268;
        }
    </style>

    <h1>Modifier l'incident</h1>

    <div class="form-container">
        <form action="{{ route('incidents.update', $incident->id) }}" method="POST">
            @csrf
            @method('POST')

            <label for="description">Description de l'incident</label>
            <input type="text" name="description" value="{{ $incident->description }}" required>

            <label for="niveau_gravite">Niveau de gravité</label>
            <select name="niveau_gravite" required>
                <option value="1" {{ $incident->niveau_gravite == 1 ? 'selected' : '' }}>Faible</option>
                <option value="2" {{ $incident->niveau_gravite == 2 ? 'selected' : '' }}>Moyen</option>
                <option value="3" {{ $incident->niveau_gravite == 3 ? 'selected' : '' }}>Élevé</option>
            </select>

            <label for="date">Date de l'incident</label>
            <input type="date" name="date" value="{{ $incident->date }}" required>

            <button type="submit">Sauvegarder</button>
        </form>

        <a href="{{ url('/patients_details/' . $incident->id_patient) }}" class="btn-cancel">Annuler</a>
    </div>
@stop
