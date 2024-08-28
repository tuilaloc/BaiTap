<?php

namespace App\GraphQL\Mutations;

use App\Models\ShippingMethod;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class ShippingMethodMutator
{
    public function createShippingMethod($_, array $args)
    {
        return ShippingMethod::create($args);
    }

    public function updateShippingMethod($_, array $args)
    {
        try {
            $ShippingMethod = ShippingMethod::findOrFail($args['id']);
            
            $ShippingMethod->update($args);

            return $ShippingMethod;

        } catch (ModelNotFoundException $e) {
            throw new \Exception('ShippingMethod not found.');
        } catch (\Exception $e) {
            throw new \Exception('An error occurred while updating the ShippingMethod.');
        }
    }

    public function deleteShippingMethod($_, array $args)
    {
        try {
            $ShippingMethod = ShippingMethod::findOrFail($args['id']);

            $deletedShippingMethod = $ShippingMethod->toArray();

            $ShippingMethod->delete();

            return $deletedShippingMethod;

        } catch (ModelNotFoundException $e) {
            Log::error('ShippingMethod not found', ['id' => $args['id'], 'error' => $e->getMessage()]);
            throw new \Exception('ShippingMethod not found.');
        } catch (Exception $e) {
            Log::error('An error occurred while deleting the ShippingMethod', ['id' => $args['id'], 'error' => $e->getMessage()]);
            throw new \Exception('An error occurred while deleting the ShippingMethod.');
        }
    }

    public function getShippingMethod($_, array $args)
    {
        $ShippingMethod = ShippingMethod::where('id', $args['id'])->first();

        if (!$ShippingMethod) {
            throw new ModelNotFoundException('ShippingMethod not found.');
        }

        return $ShippingMethod;
    }
}
