<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sections') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                {{ Html::linkRoute('companies.sections.index', '一覧に戻る') }}

                {{ Html::linkRoute('companies.sections.edit', '編集', compact('company', 'section')) }}

                <dl>
                    <dt>ID</dt>
                    <dd>{{ $section->id }}</dd>
                    <dt>Name</dt>
                    <dd>{{ $section->name }}</dd>
                    <dt>Created at</dt>
                    <dd>{{ $section->created_at }}</dd>
                    <dt>Updated at</dt>
                    <dd>{{ $section->updated_at }}</dd>
                </dl>

                <h2>Users</h2>

                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($section->users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                {{ Form::open(['url' => route('companies.sections.users.destroy', compact('company', 'section', 'user')), 'method' => 'DELETE']) }}
                                <button type="submit">解除する</button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
