<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pet;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $pets = Pet::all();
        $categories = Category::all();
        $breeds = Pet::distinct()->pluck('Breed');
        return view('catalogue', compact('pets', 'categories', 'breeds'));
    }

    public function search(Request $request)
    {
        $query = Pet::query();

        if ($request->filled('PetName')) {
            $query->where('PetName', 'like', '%' . $request->PetName . '%');
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('Age')) {
            $query->where('Age', $request->Age);
        }
        if ($request->filled('Breed')) {
            $query->where('Breed', $request->Breed);
        }

        $pets = $query->get();
        $categories = Category::all();
        $breeds = Pet::distinct()->pluck('Breed');

        return view('catalogue', compact('pets', 'categories', 'breeds'));
    }
    public function show(string $id)
    {
        $pet = Pet::find($id);      
        return view('pets.show', compact('pet'));
    }
}
