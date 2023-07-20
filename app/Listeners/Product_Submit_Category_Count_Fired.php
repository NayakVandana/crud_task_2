<?php

namespace App\Listeners;

use App\Events\Product_Submit_Category;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\Category;
use Mail;


class Product_Submit_Category_Count_Fired
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Product_Submit_Category $event): void
    {
        $categoryId = $event->category_id;

// Find the category by its ID
$category = Category::find($categoryId);

// Increment the 'count' column by 1
if ($category) {
    $category->increment('count');
}

    }
}
