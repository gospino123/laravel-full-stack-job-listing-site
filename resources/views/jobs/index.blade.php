<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <h2 class="font-bold text-lg mb-4">Current Job Listings</h2>
    <div class="space-y-6">
        @foreach ($jobs as $job)
            <a class="block px-4 py-6 border border-gray-200 rounded-lg hover:bg-gray-800 hover:text-white" href="/jobs/{{ $job['id'] }}">
                <div class="color-gray-800 italic">
                    {{$job->employer->name}}
                </div>
                <div>
                    <strong>{{$job['title']}}</strong>: Pays {{$job['salary']}} per year.
                </div>
            </a>
        @endforeach
        <div>
            {{$jobs->links()}}
        </div>
    </div>
</x-layout>