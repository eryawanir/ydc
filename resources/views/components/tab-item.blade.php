@props(['active', 'route'])

@php
  $classes = $active ? 'inline-block p-4 text-black  bg-gray-200 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500' : 'inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300';
@endphp




<li class="me-2">
  <a href="{{ $route }}" class="{{ $classes }}">{{ $slot }}</a>
</li>
