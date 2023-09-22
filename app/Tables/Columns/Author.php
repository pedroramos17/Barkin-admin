<?php

namespace App\Tables\Columns;

use Filament\Tables\Columns\Column;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class Author extends Column
{
  protected string $view = 'tables.columns.author';

  protected function getAuthors(): Collection
  {
    $authors = DB::table('users')
      ->select('last_authors')
      ->get();

    return $authors;
  }
}
