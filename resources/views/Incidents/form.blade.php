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
        form textarea,
        form input[type="date"],
        form select {
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
        form textarea:focus,
        form input[type="date"]:focus,
        form select:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Dropdown list of patients */
        .patient-list {
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            display: none; /* Hide by default */
            background-color: white;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .patient-list li {
            padding: 10px;
            cursor: pointer;
            list-style: none;
            border-bottom: 1px solid #f0f0f0;
        }

        .patient-list li:hover {
            background-color: #f7f7f7;
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

    </style>

    <h1>Enregistrer un Incident</h1>

    <form action='{{ route('incidents.add') }}' method='POST'>
        @csrf

        <!-- Search bar for patient selection -->
        <label for="patient_search">Rechercher un patient</label>
        <input type="text" id="patient_search" placeholder="Tapez le nom du patient..." autocomplete="off">
        <input type="hidden" name="id_patient" id="id_patient"> <!-- Hidden input to store selected patient ID -->

        <!-- Dynamic patient list -->
        <ul id="patient_list" class="patient-list"></ul>

        <!-- Description de l'incident -->
        <label for="description">Description de l'incident</label>
        <textarea name="description" id="description" rows="5" required placeholder="Décrivez l'incident en détails..."></textarea>

        <!-- Niveau de gravité -->
        <label for="niveau_gravite">Niveau de gravité</label>
        <select name="niveau_gravite" id="niveau_gravite" required>
            <option value="" disabled selected>Sélectionner le niveau de gravité</option>
            <option value="1">Faible</option>
            <option value="2">Moyen</option>
            <option value="3">Élevé</option>
        </select>

        <!-- Date de l'incident -->
        <label for="date">Date de l'incident</label>
        <input type="date" name="date" id="date" required>

        <!-- Bouton de soumission -->
        <button type="submit">Enregistrer l'incident</button>
    </form>

    <script>
        const patients = @json($patients); // Convert PHP patient list to JavaScript object
        const searchInput = document.getElementById('patient_search');
        const patientList = document.getElementById('patient_list');
        const idInput = document.getElementById('id_patient');

        // Function to display filtered patients
        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();
            patientList.innerHTML = ''; // Clear previous list
            patientList.style.display = 'none';

            if (query.length > 1) {
                const filteredPatients = patients.filter(patient =>
                    patient.nom.toLowerCase().includes(query) ||
                    patient.prenom.toLowerCase().includes(query)
                );

                if (filteredPatients.length > 0) {
                    patientList.style.display = 'block';
                    filteredPatients.forEach(patient => {
                        const li = document.createElement('li');
                        li.textContent = `${patient.nom} ${patient.prenom}`;
                        li.addEventListener('click', function() {
                            searchInput.value = `${patient.nom} ${patient.prenom}`;
                            idInput.value = patient.id; // Set the hidden input to selected patient ID
                            patientList.innerHTML = ''; // Clear the list
                            patientList.style.display = 'none';
                        });
                        patientList.appendChild(li);
                    });
                }
            }
        });

        // Hide the list when clicking outside
        document.addEventListener('click', function(event) {
            if (!patientList.contains(event.target) && event.target !== searchInput) {
                patientList.style.display = 'none';
            }
        });
    </script>
@stop
