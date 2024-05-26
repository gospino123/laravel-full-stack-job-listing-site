<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <h2>Current Job Listings</h2>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <strong>{{$job['title']}}</strong>: Pays ${{$job['salary']}} per year.
            </li>
        @endforeach
    </ul>
</x-layout>