<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Item;
use \App\Models\ItemCategory;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $categories = ItemCategory::with(['items' => function ($query) {
            $query->whereDoesntHave('avatars', function ($query) {
                $query->where('avatars.user_id', Auth::id());
            });
        }])->get();

        $avatar = Auth::user()->avatar;
        $ownedItems = $avatar ? $avatar->items : collect();

        return view('shop.shop', compact('ownedItems', 'categories'));
    }

    public function buyItem(Request $request)
    {
        $itemId = $request->input('item_id');
        $user = auth()->user();

        $item = Item::find($itemId);

        if (!$item) {
            return redirect::back()->withErrors(['msg' => 'Item not found']);
            // return response()->json(['success' => false, 'message' => 'Item not found']);
        }
        
        if ($user->avatar->items->contains($item)) {
            return $this->equipOrUnequipItem($request);
        }

        if ($user->points < $item->points) {
            return redirect::back()->withErrors(['msg' => 'Insufficient funds']);
            // return response()->json(['success' => false, 'message' => 'Insufficient funds']);
        }
        
        $user->points -= $item->points;
        $user->save();
        
        $user->avatar->items()->attach($item);
        
        return redirect()->route('shop')->with('success', 'Item purchased successfully!');
        // return response()->json(['success' => true, 'message' => 'Item purchased successfully']);
    }

    public function equipOrUnequipItem(Request $request)
    {
        $user = Auth::user();
        $item = Item::find($request->item_id);
    
        if (!$user->avatar->items->contains($item)) {
            return redirect()->back()->with('error', 'You do not own this item.');
        }
    
        $pivot = $user->avatar->items()->where('item_id', $item->id)->first()->pivot;
    
        if ($pivot->active) {
            $pivot->active = 0;
            $pivot->save();
    
            return redirect()->back()->with('success', 'Item has been taken off.');
        } else {
            $categoryId = $item->category_id;
            $activeItem = $user->avatar->items()
                ->where('category_id', $categoryId)
                ->wherePivot('active', 1)
                ->first();
    
            if ($activeItem) {
                $activeItem->pivot->active = 0;
                $activeItem->pivot->save();
            }
    
            $pivot->active = 1;
            $pivot->save();
    
            return redirect()->back()->with('success', 'Item has been equipped.');


            return response()->json($response->json());
        }
    }
    
}
