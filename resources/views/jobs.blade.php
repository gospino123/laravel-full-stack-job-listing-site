<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <h2 class="font-bold text-lg">Current Job Listings</h2>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a class="text-lime-300 hover:underline" href="/jobs/{{ $job['id'] }}"
                <strong>{{$job['title']}}</strong>: Pays {{$job['salary']}} per year.
            </li>
        @endforeach
    </ul>
</x-layout>