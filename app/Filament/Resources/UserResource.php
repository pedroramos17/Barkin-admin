<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use COM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserResource extends Resource
{
  protected static ?string $model = User::class;

  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Avatar')
          ->icon('heroicon-o-user-circle')
          ->description('Change the user\'s avatar.')
          ->aside()
          ->schema([
            Forms\Components\FileUpload::make('avatar')
              ->helperText('The file must be an image.')
              ->image()
              ->directory('avatars')
              ->storeFileNamesIn('original_filename'),
          ]),
        Forms\Components\Section::make('User Information')
          ->icon('heroicon-o-user')
          ->description('Basic information about the user.')
          ->aside()
          ->schema([
            Forms\Components\TextInput::make('name')
              ->required()
              ->maxLength(255)
              ->autofocus()
              ->placeholder('Your name')
              ->autocomplete(false)
              ->markAsRequired(fn (string $operation): bool => $operation === 'create'),
            Forms\Components\TextInput::make('email')
              ->email()
              ->required()
              ->maxLength(255)
              ->placeholder('Your email')
              ->autocomplete(false)
              ->markAsRequired(fn (string $operation): bool => $operation === 'create'),
            Forms\Components\Toggle::make('is_admin')
              ->label('Admin'),
          ]),
        Forms\Components\Section::make('Password')
          ->icon('heroicon-o-key')
          ->description('Change the user\'s password.')
          ->aside()
          ->schema([
            Forms\Components\TextInput::make('password')
              ->password()
              ->confirmed()
              ->minLength(8)
              ->maxLength(255)
              ->placeholder('Your password')
              ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
              ->dehydrated(fn (?string $state): bool => filled($state))
              ->required(fn (string $operation): bool => $operation === 'create'),
            Forms\Components\TextInput::make('password_confirmation')
              ->password()
              ->dehydrated(false)
              ->label("Confirm password")
              ->placeholder('Confirm your password'),
          ]),

        Forms\Components\Hidden::make('last_authors')
          ->default(json_encode([
            "id" => auth()->id(),
            "name" => auth()->user()->name,
            "datetime" => \Carbon\Carbon::now()
              ->tz(Session::put('timezone', 'America/Sao_Paulo'))
              ->format('Y-m-d H:i:s'),
          ])),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->striped()
      ->columns([
        Tables\Columns\ImageColumn::make('avatar')->circular(),
        Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
        Tables\Columns\TextColumn::make('email')->searchable()->sortable(),
        Tables\Columns\IconColumn::make('is_admin')->boolean()->label('Admin')->sortable(),
        Tables\Columns\ViewColumn::make('author')
          ->label('Author')
          ->searchable()
          ->view('tables.columns.author'),
      ])
      ->filters([
        Tables\Filters\SelectFilter::make('is_admin')
          ->options([
            true => 'Is admin',
            false => 'Is not admin',
          ])
          ->label('Admin'),
      ])
      ->actions([
        Tables\Actions\EditAction::make()

      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
        ]),
      ]);
  }

  public static function getRelations(): array
  {
    return [
      //
    ];
  }

  public static function getPages(): array
  {
    return [
      'index' => Pages\ListUsers::route('/'),
      'create' => Pages\CreateUser::route('/create'),
      'edit' => Pages\EditUser::route('/{record}/edit'),
    ];
  }
}
