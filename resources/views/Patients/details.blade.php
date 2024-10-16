@extends("layouts.app")

@section("content")
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 30px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        h2 {
            font-size: 24px;
            color: #007bff;
            margin-top: 30px;
            text-align: center;
        }

        .patient-info {
            background-color: #ffffff;
            padding: 30px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .patient-info p {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px auto;
            max-width: 1000px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #f2f2f2;
        }

        table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #e9f5ff;
        }

        table td {
            font-size: 16px;
            color: #333;
        }

        .btn-edit, .btn-delete {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            margin-right: 5px;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #999;
            font-size: 18px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table th, table td {
                padding: 10px;
                font-size: 14px;
            }

            h1 {
                font-size: 26px;
            }

            h2 {
                font-size: 20px;
            }

            .patient-info {
                padding: 20px;
            }
        }
    </style>

    <!-- Informations sur le patient -->
    <div class="patient-info">
        <h1>Détails du patient</h1>
        <p><strong>Nom :</strong> {{$patient->nom}}</p>
        <p><strong>Prénom :</strong> {{$patient->prenom}}</p>
        <p><strong>Date de Naissance :</strong> {{$patient->dateNaissance}}</p>
    </div>

    <!-- Tableau des incidents liés au patient -->
    <h2>Incidents concernant ce patient</h2>
    <table>
        <thead>
        <tr>
            <th>Description</th>
            <th>Niveau de Gravité</th>
            <th>Date de l'incident</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($incidents as $incident)
            <tr>
                <td>{{ $incident->description }}</td>
                <td>
                    @if($incident->niveau_gravite == 1)
                        Faible
                    @elseif($incident->niveau_gravite == 2)
                        Moyen
                    @else
                        Élevé
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($incident->date)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('incidents.edit', $incident->id) }}" class="btn-edit">Modifier</a>
                    <form action="{{ route('incidents.delete', $incident->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet incident ?');">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="no-data">Aucun incident enregistré pour ce patient.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@stop
