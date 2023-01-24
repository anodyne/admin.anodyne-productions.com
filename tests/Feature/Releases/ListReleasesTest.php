<?php

use App\Filament\Resources\ReleaseResource;
use function Pest\Laravel\get;

uses()->group('releases');

it('renders the list of releases for admins', function () {
    signInAsAdmin()
        ->get(ReleaseResource::getUrl())
        ->assertSuccessful();
});

it('renders the list of releases for staff', function () {
    signInAsStaff()
        ->get(ReleaseResource::getUrl())
        ->assertSuccessful();
});

it('does not render the list of releases for users', function () {
    signInAsUser()
        ->get(ReleaseResource::getUrl())
        ->assertForbidden();
});

it('redirects guests who try to view the list of releases', function () {
    get(ReleaseResource::getUrl())
        ->assertRedirect('/login');
});
