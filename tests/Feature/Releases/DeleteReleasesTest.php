<?php

use App\Filament\Resources\ReleaseResource\Pages\ListReleases;
use App\Models\Release;
use Filament\Tables\Actions\DeleteAction;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Livewire\livewire;

uses()->group('releases');

beforeEach(fn () => $this->release = Release::factory()->create());

test('an admin can delete a release', function () {
    signInAsAdmin();

    livewire(ListReleases::class)
        ->callTableAction(DeleteAction::class, $this->release)
        ->assertNotified();

    assertDatabaseMissing(Release::class, [
        'id' => $this->release->id,
    ]);
});

test('staff cannot delete a release', function () {
    signInAsStaff();

    livewire(ListReleases::class)
        ->assertTableActionDoesNotExist(DeleteAction::class);
});
