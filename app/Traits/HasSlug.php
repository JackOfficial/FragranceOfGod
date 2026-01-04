<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    /**
     * Generate a unique slug for a model.
     *
     * @param string $title
     * @param string $modelClass
     * @param int|null $ignoreId
     * @return string
     */
    public function generateUniqueSlug(string $title, string $modelClass, int $ignoreId = null): string
    {
        $slug = Str::slug($title); // initial slug
        $originalSlug = $slug;
        $count = 1;

        while ($modelClass::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
}
