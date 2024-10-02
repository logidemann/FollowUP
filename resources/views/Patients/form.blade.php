@extends("layouts.app")

@section("content")
    <form action='{{ route('patients.store') }}' method='POST'>
        @csrf
        <label for="name">Nom:</label>
        <input type="text" name="name" required>
        <label for="firstname">Prénom:</label>
        <input type="text" name="firstname" required>
        <label for="birthdate">Date de Naissance:</label>
        <input type="date" name="birthdate" required>
        <button type="submit">Ajouter Patient</button>
    </form>
@stop
