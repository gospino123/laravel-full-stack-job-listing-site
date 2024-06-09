<x-layout>
  <x-slot:heading>
    Actions
  </x-slot:heading>
  <h2 class="font-bold text-lg">List of Actions to Take</h2>
  <ul class="divide-y">
      @foreach ($actions as $action)
          <li class="py-2">
            <h3>{{$action['name']}}
            <ol>
              <li>Description: {{$action['description']}}</li>
              <li>Attempts: {{$action['count']}}</li>
            </ol>  
          </li>
      @endforeach
  </ul>
</x-layout>