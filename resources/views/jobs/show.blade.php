<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>
        This job pays {{ $job['salary'] }} per year.
    </p>
    <p class="mt-6">
        <x-cta-link href="/jobs/{{ $job->id }}/edit" :isCTA="true">Edit</x-cta-link>
    </p>
</x-layout>