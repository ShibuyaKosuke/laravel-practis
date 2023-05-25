<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionUserRequest;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;

class SectionUserController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSectionUserRequest $request, Section $section)
    {
        $section->users()->attach($request->user_id);

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
