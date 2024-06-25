<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>

    @can('edit-job', $job)
    {{-- Only allows being able to see this if user can use gate 'edit-job' for sp. job --}}
        <p class="mt-6">
            <x-cta-link href="/jobs/{{ $job->id }}/edit" :isCTA="true">Edit</x-cta-link>
        </p>
    @endcan
</x-layout>