<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pet;
use App\Models\Shelter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class AnimalController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        $categories = Category::all();
        $breeds = Pet::distinct()->pluck('Breed');
        return view('pets.index', compact('pets', 'categories', 'breeds'));
    }

    public function search(Request $request)
    {
        $query = Pet::query();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('age')) {
            $query->where('Age', $request->age);
        }

        if ($request->filled('breed')) {
            $query->where('Breed', 'like', '%' . $request->breed . '%');
        }

        if ($request->filled('name')) {
            $query->where('PetName', 'like', '%' . $request->name . '%');
        }

        $pets = $query->with('category')->get();

        return response()->json($pets);
    }
    public function show(string $id)
    {
        $pet = Pet::find($id);  
        $categories = Category::all();   
        $catImages = [
            'https://img.freepik.com/free-photo/red-white-cat-i-white-studio_155003-13189.jpg?w=1060&t=st=1719410225~exp=1719410825~hmac=e8aee4de6fd91649a2631727a92bf95daf42d256185b45c49ab685b232e5b717',
            'https://img.freepik.com/free-photo/cute-cat-relaxing-studio_23-2150692717.jpg?w=1060&t=st=1719410270~exp=1719410870~hmac=84da8b15b1113d4d4bf45e98a2df9594e5d7ce9e293a2e4fca031821f9efd533',
            'https://img.freepik.com/free-photo/selective-focus-shot-gray-cat-with-angry-cat-face_181624-13282.jpg?t=st=1719410376~exp=1719413976~hmac=3da6a6bda5aa9fc8d2d37d828dc5a78bea33bbe6f62e3c6855f6a7e2f1157367&w=2000',
            'https://img.freepik.com/free-photo/selective-focus-closeup-shot-gray-furry-tabby-cat-sitting-wooden-chair_181624-8432.jpg?t=st=1719410418~exp=1719414018~hmac=c651f5ee8a4cf9ffee7145c0b05ce060b1860349cfd4d2bea80c08d2a60e6f8b&w=2000'
        ];
        $dogImages = [
            'https://img.freepik.com/free-photo/dog-sticking-out-his-tongue-looking-photographer_23-2148366946.jpg?w=1060&t=st=1719410308~exp=1719410908~hmac=8e23cdf89977fa64bf6d8c322f5fadc164f90b136386e5cc1f84e7aa2220215a',
            'https://img.freepik.com/free-photo/adorable-brown-white-basenji-dog-smiling-giving-high-five-isolated-white_346278-1657.jpg?t=st=1719410447~exp=1719414047~hmac=53862e2379945428f9f08b92ca43376f5406928617ca1b26dd1c18dc36a4480d&w=2000',
            'https://img.freepik.com/free-photo/closeup-shot-cute-sitting-golden-retriever-puppy-isolated-white-surface_181624-40949.jpg?t=st=1719410465~exp=1719414065~hmac=6ca273671329ba81b5f248def74278b12ee3bb860512282d6c3dfb336d468265&w=1800',
            'https://img.freepik.com/free-photo/front-view-cute-dog-sitting_23-2148423632.jpg?t=st=1719410482~exp=1719414082~hmac=53b912d8a5c498ad13715cf309b92213ceec2157d04db3a0a80ab848626a81dd&w=1800'
        ]; 
        if ($categories[$pet->category_id - 1]->CategoryName == 'Cats') {
            $randomImage = Arr::random($catImages);
        } else {
            $randomImage = Arr::random($dogImages);
        }
            return view('pets.show', compact('pet', 'categories', 'randomImage'));
    }
    public function create()
    {
        $categories = Category::all();
        $shelters = Shelter::all();
        return view('pets.create', compact('categories'), compact('shelters'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'PetName' => 'required|string|max:255',
            'shelter_id' => 'required|exists:shelters,id',
            'category_id' => 'required|exists:categories,id',
            'Age' => 'required|integer',
            'Description' => 'required|string',
            'Breed' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pets.create')
                ->withErrors($validator)
                ->withInput();
        }

        $pet = new Pet();
        $pet->PetName = $request->PetName;
        $pet->shelter_id = $request->shelter_id;
        $pet->category_id = $request->category_id;
        $pet->Age = $request->Age;
        $pet->Description = $request->Description;
        $pet->Breed = $request->Breed;
        $pet->save();

        return redirect()->route('pets.show', $pet->id);
    }
    public function edit(string $id)
    {
        $pet = Pet::findOrFail($id);
        $shelters = Shelter::all();
        $categories = Category::all();
    
        return view('pets.edit', compact('pet', 'shelters', 'categories'));
    }
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'PetName' => 'required|string|max:255',
            'shelter_id' => 'required|exists:shelters,id',
            'category_id' => 'required|exists:categories,id',
            'Age' => 'required|integer',
            'Description' => 'required|string',
            'Breed' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pets.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
        $pet = Pet::findOrFail($id);
        $pet->PetName = $request->PetName;
        $pet->shelter_id = $request->shelter_id;
        $pet->category_id = $request->category_id;
        $pet->Age = $request->Age;
        $pet->Description = $request->Description;
        $pet->Breed = $request->Breed;
        $pet->update();

        return redirect()->route('pets.show', $pet->id);
    }
    public function destroy(string $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();

        return redirect()->route('pets.index');
    }
}
