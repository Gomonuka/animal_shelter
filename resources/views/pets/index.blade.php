<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/catalogue.css') }}">
    <title>Pet Catalogue</title>
</head>
<body>
    <h1>Browse all animals available for adoption!</h1>
    <div class="filters">
        <label for="category">Category:</label>
        <select id="category">
            <option value="">All</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->CategoryName }}</option>
            @endforeach
        </select>

        <label for="age">Age:</label>
        <input type="number" id="age">

        <label for="breed">Breed:</label>
        <input type="text" id="breed">

        <label for="name">Name:</label>
        <input type="text" id="name">

        <button onclick="filterPets()">Search</button>
    </div>
    <a class="return" href="{{ route('welcome') }}">Return to Welcome Page</a>
    <div class="pet-grid">
        @foreach ($pets as $pet)
        <div class="pet-card" data-category="{{ $pet->category_id }}" data-age="{{ $pet->Age }}" data-breed="{{ $pet->Breed }}" data-name="{{ $pet->PetName }}">
            <h2><a href="{{ route('pets.show', $pet->id) }}">{{ $pet->PetName }}</a></h2>
            <p>Category: {{ $categories[$pet->category_id-1]->CategoryName }}</p>
            <p>Age: {{ $pet->Age }}</p>
            <p>Breed: {{ $pet->Breed }}</p>
            <p>Description: {{ $pet->Description }}</p>
        </div>
        @endforeach
    </div><br><br>
    <script>
        function filterPets() {
            const category = document.getElementById('category').value;
            const age = document.getElementById('age').value;
            const breed = document.getElementById('breed').value.toLowerCase();
            const name = document.getElementById('name').value.toLowerCase();

            const petCards = document.querySelectorAll('.pet-card');

            petCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                const cardAge = card.getAttribute('data-age');
                const cardBreed = card.getAttribute('data-breed').toLowerCase();
                const cardName = card.getAttribute('data-name').toLowerCase();

                let isVisible = true;

                if (category && cardCategory !== category) {
                    isVisible = false;
                }

                if (age && cardAge !== age) {
                    isVisible = false;
                }

                if (breed && !cardBreed.includes(breed)) {
                    isVisible = false;
                }

                if (name && !cardName.includes(name)) {
                    isVisible = false;
                }

                card.style.display = isVisible ? 'block' : 'none';
            });
        }
    </script>
</body>
</html>
