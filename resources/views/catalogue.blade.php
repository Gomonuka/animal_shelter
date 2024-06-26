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

    <!-- Search Form -->
    <form method="GET" action="{{ route('pets.search') }}">
        <div>
            <label for="PetName">Search by Name:</label>
            <input type="text" id="PetName" name="PetName" value="{{ request('PetName') }}">
        </div>
        <div>
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->CategoryName }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="Age">Age:</label>
            <input type="number" id="Age" name="Age" value="{{ request('Age') }}">
        </div>
        <div>
            <label for="Breed">Breed:</label>
            <select id="Breed" name="Breed">
                <option value="">All Breeds</option>
                @foreach ($breeds as $breed)
                    <option value="{{ $breed }}" {{ request('Breed') == $breed ? 'selected' : '' }}>{{ $breed }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Search</button>
        </div>
    </form>

    <!-- Display Pets -->
    @foreach ($pets as $pet)
        <h2><a href="{{ route('pets.show', $pet->id) }}">{{ $pet->PetName }}</a></h2>
        <p>Category: {{ $categories[$pet->category_id-1]->CategoryName }}</p>
        <p>Age: {{ $pet->Age }}</p>
        <p>Breed: {{ $pet->Breed }}</p>
        <p>Description: {{ $pet->Description }}</p>
    @endforeach
</body>
</html>
