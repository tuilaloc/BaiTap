<?php

namespace App\GraphQL\Mutations;

use App\Models\Product;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class ProductMutator
{
    public function createProduct($_, array $args)
    {
        return Product::create($args);
    }

    public function updateProduct($_, array $args)
    {
        try {
            $product = Product::findOrFail($args['id']);
            
            $product->update($args);

            return $product;

        } catch (ModelNotFoundException $e) {
            throw new \Exception('Product not found.');
        } catch (\Exception $e) {
            throw new \Exception('An error occurred while updating the product.');
        }
    }

    public function deleteProduct($_, array $args)
    {
        try {
            $product = Product::findOrFail($args['id']);

            $deletedProduct = $product->toArray();

            $product->delete();

            return $deletedProduct;

        } catch (ModelNotFoundException $e) {
            Log::error('Product not found', ['id' => $args['id'], 'error' => $e->getMessage()]);
            throw new \Exception('Product not found.');
        } catch (Exception $e) {
            Log::error('An error occurred while deleting the product', ['id' => $args['id'], 'error' => $e->getMessage()]);
            throw new \Exception('An error occurred while deleting the product.');
        }
    }

    public function getProduct($_, array $args)
    {
        $product = Product::where('id', $args['id'])->first();

        if (!$product) {
            throw new ModelNotFoundException('Product not found.');
        }

        return $product;
    }
}
