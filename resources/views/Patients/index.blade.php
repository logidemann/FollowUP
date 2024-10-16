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

        h1::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background-color: #007bff;
            margin: 10px auto;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            max-width: 1000px;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
            cursor: pointer;
        }

        table td {
            font-size: 16px;
            color: #333;
        }

        /* Boutons */
        .btn-edit {
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

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
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

        .success-message {
            text-align: center;
            color: green;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table th, table td {
                padding: 10px;
                font-size: 14px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>

    <h1>Liste des patients</h1>

    <!-- Message de succès avec timer -->
    @if(session('success'))
        <div id="success-message" class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <table id="patient_table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Actions</th> <!-- Nouvelle colonne pour les actions -->
        </tr>
        </thead>
        <tbody>
        @forelse($patients as $patient)
            <tr data-id="{{$patient->id}}">
                <td>{{$patient->nom}}</td>
                <td>{{$patient->prenom}}</td>
                <td>{{$patient->dateNaissance}}</td>
                <td>
                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn-edit">Modifier</a>
                    <form action="{{ route('patients.delete', $patient->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce patient ?');">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="no-data">Aucun patient disponible</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <script>
        document.querySelectorAll('#patient_table tbody tr[data-id]').forEach(row => {
            row.addEventListener('dblclick', function() {
                const id = this.getAttribute('data-id');
                if (id) {
                    window.location.href = `/patients_details/${id}`;
                }
            });
        });

        // Timer pour masquer le message de succès après 10 secondes
        document.addEventListener('DOMContentLoaded', function () {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.display = 'none';
                }, 10000); // 10 secondes
            }
        });
    </script>
@stop
