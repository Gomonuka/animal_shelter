<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pet->PetName }}</title>
    <link href="{{ asset('css/pet.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img src="{{ $randomImage }}" alt="{{ $pet->PetName }} image">
        <h2>{{ $pet->PetName }}</h2>
        <p>Age: {{ $pet->Age }}</p>
        <p>Category: {{ $categories[$pet->category_id-1]->CategoryName }}</p>
        <p>Breed: {{ $pet->Breed }}</p>
        <p>Description: {{ $pet->Description }}</p>
        <a href="{{ route('pets.index') }}">Return to the Catalogue</a>
    </div>
</body>
</html>
