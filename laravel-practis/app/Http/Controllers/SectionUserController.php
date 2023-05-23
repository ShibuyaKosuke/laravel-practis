<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\User;

class SectionUserController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Section $section, User $user)
    {
        $section->users()->attach($user->id);

        $company = $section->company;

        return redirect()->route('companies.sections.show', compact('company', 'section'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Section $section, User $user)
    {
        $section->users()->detach($user->id);

        $company = $section->company;

        return redirect()->route('companies.sections.show', compact('company', 'section'));
    }
}
