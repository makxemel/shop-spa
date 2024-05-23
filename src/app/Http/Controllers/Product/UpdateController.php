<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();

            if (isset($data['tags'])) {
                $tagsIds = $data['tags'];
                unset($data['tags']);
            } else {
               $tagsIds = [];
            }
            if (isset($data['colors'])) {
                $colorIds = $data['colors'];
                unset($data['colors']);
            } else {
                $colorIds = [];
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            $product->update($data);

            if (isset($tagsIds)) {
                $product->tags()->sync($tagsIds);
            }

            if (isset($colorIds)) {
                $product->colors()->sync($colorIds);
            }

            DB::commit();
        } catch (\Exception $exception) {
            echo $exception->getMessage();
            DB::rollBack();
            abort(500);
        }

        return view('product.show', compact('product'));
    }
}
