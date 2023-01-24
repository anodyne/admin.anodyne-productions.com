<?php

use App\Filament\Resources\ReleaseResource;
use App\Filament\Resources\ReleaseResource\Pages\EditRelease;
use App\Models\Release;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('releases');

beforeEach(fn () => $this->release = Release::factory()->create());

it('renders the edit release page for admins', function () {
    signInAsAdmin()
        ->get(ReleaseResource::getUrl('edit', $this->release))
        ->assertSuccessful();
});

it('allows admins to edit a release', function () {
    $releaseData = Release::factory()->make();

    signInAsAdmin();

    livewire(EditRelease::class, [
        'record' => $this->release->getKey(),
    ])
        ->fillForm([
            'version' => $releaseData->version,
        ])
        ->call('save')
        ->assertHasNoFormErrors()
        ->assertNotified();

    assertDatabaseHas(Release::class, [
        'version' => $releaseData->version,
        'severity' => $this->release->severity,
    ]);
});

it('does not render the edit release page for staff', function () {
    signInAsStaff()
        ->get(ReleaseResource::getUrl('edit', $this->release))
        ->assertForbidden();
});

it('does not allow staff to edit a release', function () {
    $releaseData = Release::factory()->make();

    signInAsStaff();

    livewire(EditRelease::class, [
        'record' => $this->release->getKey(),
    ])
        ->assertForbidden();

    assertDatabaseMissing(Release::class, [
        'version' => $releaseData->version,
        'severity' => $this->release->severity,
    ]);
});

it('does not render the edit release page for users', function () {
    signInAsUser()
        ->get(ReleaseResource::getUrl('edit', $this->release))
        ->assertForbidden();
});

it('does not allow users to edit a release', function () {
    $releaseData = Release::factory()->make();

    signInAsUser();

    livewire(EditRelease::class, [
        'record' => $this->release->getKey(),
    ])
        ->assertForbidden();

    assertDatabaseMissing(Release::class, [
        'version' => $releaseData->version,
        'severity' => $this->release->severity,
    ]);
});

it('redirects guests who try to view the edit release page', function () {
    get(ReleaseResource::getUrl('edit', $this->release))
        ->assertRedirect('/login');
});

it('does not allow guests to edit a release', function () {
    $releaseData = Release::factory()->make();

    livewire(EditRelease::class, [
        'record' => $this->release->getKey(),
    ])
        ->assertForbidden();

    assertDatabaseMissing(Release::class, [
        'version' => $releaseData->version,
        'severity' => $this->release->severity,
    ]);
});
