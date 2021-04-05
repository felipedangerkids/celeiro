<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">WhatsApp</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($capturas as $cap)
                <tr>
                    <th scope="row">{{ $cap->id }}</th>
                    <td>{{ $cap->name }}</td>
                    <td>{{ $cap->whatsapp }}</td>
                    <td>{{ $cap->email }}</td>
                </tr>
                @empty
                <tr>
                    <th>Nenhum registro</th>
                </tr>
                @endforelse


            </tbody>
        </table>
        {{ $capturas->links() }}
    </div>

</x-app-layout>