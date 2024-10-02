@extends("layouts.app")

@section("content")
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        h1 {
            color: #333;
            font-family: Arial, sans-serif;
        }

        td {
            font-family: Arial, sans-serif;
        }
    </style>
    <h1>Liste des patients</h1>
    <table>
        <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Date de naissance</td>
        </tr>
        @forelse($patients as $patient)
            <tr>
                <td>{{$patient->nom}}</td>
                <td>{{$patient->prenom}}</td>
                <td>{{$patient->dateNaissance}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Aucun patient</td>
            </tr>
        @endforelse
    </table>
@stop
