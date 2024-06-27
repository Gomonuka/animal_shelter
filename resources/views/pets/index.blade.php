<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/catalogue.css') }}">
    <title>Pet Catalogue</title>
</head>
<body>
    <h1>{{ __('messages.adoption') }}</h1>
    <div class="filters">
        <label for="category">{{ __('messages.category') }}</label>
        <select id="category">
            <option value="">All</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->CategoryName }}</option>
            @endforeach
        </select>

        <label for="age">{{ __('messages.age') }}</label>
        <input type="number" id="age">

        <label for="breed">{{ __('messages.breed') }}</label>
        <input type="text" id="breed">

        <label for="name">{{ __('messages.name') }}</label>
        <input type="text" id="name">

        <button onclick="filterPets()">{{ __('messages.search') }}</button>
    </div>
    @if (Gate::allows('update-pet', Auth::user()))
    <a class="addPet" href="{{ route('pets.create') }}">{{ __('messages.add') }}</a>
    @endif
    <a class="return" href="{{ route('welcome') }}">{{ __('messages.return') }}</a>
    <div class="pet-grid">
        @foreach ($pets as $pet)
        <div class="pet-card" data-category="{{ $pet->category_id }}" data-age="{{ $pet->Age }}" data-breed="{{ $pet->Breed }}" data-name="{{ $pet->PetName }}">
            <h2><a href="{{ route('pets.show', $pet->id) }}">{{ $pet->PetName }}</a></h2>
            <p>{{ __('messages.category') }} {{ $categories[$pet->category_id-1]->CategoryName }}</p>
            <p>{{ __('messages.age') }} {{ $pet->Age }}</p>
            <p>{{ __('messages.breed') }} {{ $pet->Breed }}</p>
            <p>{{ __('messages.description') }} {{ $pet->Description }}</p>
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
