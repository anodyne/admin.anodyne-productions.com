<?php

use App\Filament\Resources\ReleaseResource;
use App\Filament\Resources\ReleaseResource\Pages\CreateRelease;
use App\Models\Release;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('releases');

beforeEach(fn () => $this->release = Release::factory()->create());

it('renders the create release page for admins', function () {
    signInAsAdmin();

    get(ReleaseResource::getUrl('create'))->assertSuccessful();
});

it('allows admins to create a new release', function () {
    $releaseData = Release::factory()->make();

    signInAsAdmin();

    livewire(CreateRelease::class)
        ->fillForm([
            'version' => $releaseData->version,
            'severity' => $releaseData->severity,
        ])
        ->call('create')
        ->assertHasNoFormErrors()
        ->assertNotified();

    assertDatabaseHas(Release::class, [
        'version' => $releaseData->version,
        'severity' => $releaseData->severity,
    ]);
});

it('does not render the create release page for staff', function () {
    signInAsStaff();

    get(ReleaseResource::getUrl('create'))->assertForbidden();
});

it('does not allow staff to create a new release', function () {
    $releaseData = Release::factory()->make();

    signInAsStaff();

    livewire(CreateRelease::class)->assertForbidden();

    assertDatabaseMissing(Release::class, [
        'version' => $releaseData->version,
        'severity' => $releaseData->severity,
    ]);
});

it('does not render the create release page for users', function () {
    signInAsUser();

    get(ReleaseResource::getUrl('create'))->assertForbidden();
});

it('does not allow users to create a new release', function () {
    $releaseData = Release::factory()->make();

    signInAsUser();

    livewire(CreateRelease::class)->assertForbidden();

    assertDatabaseMissing(Release::class, [
        'version' => $releaseData->version,
        'severity' => $releaseData->severity,
    ]);
});

it('redirects guests who try to view the create release page', function () {
    get(ReleaseResource::getUrl('create'))
        ->assertRedirect('/login');
});

it('does not allow guests to create a new release', function () {
    $releaseData = Release::factory()->make();

    livewire(CreateRelease::class)->assertForbidden();

    assertDatabaseMissing(Release::class, [
        'version' => $releaseData->version,
        'severity' => $releaseData->severity,
    ]);
});
