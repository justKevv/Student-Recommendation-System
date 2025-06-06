@props([
    'items' => [
        'AWS experience (S3 & Lambda).',
        'Animations experience (react-springs)',
        'A designer background / styled-components.',
        'Python experience.',
        'The experience of headless CMS such as Sanity.',
        'Shopify experience.'
    ]
])

<div class="pl-0">
  <div class="overflow-hidden relative p-0 bg-white rounded-xl shadow-md">
      <div class="absolute left-0 inset-y-4 mb-52 w-2 bg-yellowgoon"></div>

      <div class="p-6 ml-2">
          <h2 class="mb-4 text-xl font-semibold text-gray-800">Nice to have</h2>
          <ul class="space-y-2 text-base list-disc list-inside text-gray-700">
              @foreach($items as $item)
                  <li>{{ $item }}</li>
              @endforeach
          </ul>
      </div>
  </div>
</div>
