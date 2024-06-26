<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/edit.css') }}" rel="stylesheet">
    <title>Edit Pet</title>
</head>
<body>
<div class="container">
    <h1>Edit Pet</h1>
    <form action="{{ route('pets.update', ['id' => $pet->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="PetName">Pet Name</label>
            <input type="text" class="form-control" id="PetName" name="PetName" value="{{ old('PetName', $pet->PetName) }}" required>
        </div>
        <div class="form-group">
            <label for="shelter_id">Shelter</label>
            <select class="form-control" id="shelter_id" name="shelter_id" required>
                @foreach($shelters as $shelter)
                    <option value="{{ $shelter->id }}" {{ $pet->shelter_id == $shelter->id ? 'selected' : '' }}>{{ $shelter->ShelterName }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $pet->category_id == $category->id ? 'selected' : '' }}>{{ $category->CategoryName }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Age">Age</label>
            <input type="number" class="form-control" id="Age" name="Age" value="{{ old('Age', $pet->Age) }}" required>
        </div>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" id="Description" name="Description" required>{{ old('Description', $pet->Description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="Breed">Breed</label>
            <input type="text" class="form-control" id="Breed" name="Breed" value="{{ old('Breed', $pet->Breed) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Pet</button>
    </form>
</div>
</body>
</html>