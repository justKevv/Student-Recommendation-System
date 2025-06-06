<div class="pl-10">
  @props(['responsibilities' => []])

<div class="overflow-hidden relative p-0 bg-white rounded-xl shadow-md">
      <div class="absolute left-0 inset-y-4 w-2 mb-65 bg-redgoon"></div>

      <div class="p-6 ml-2">
          <h2 class="mb-4 text-xl font-semibold text-main">Key Responsibilities</h2>
          <div class="space-y-4 text-neutral-700">
              @foreach($responsibilities as $index => $responsibility)
                  <div>
                      <h3 class="mb-1 text-lg font-semibold">{{ $index + 1 }}. {{ $responsibility['title'] }}:</h3>
                      <ul class="ml-4 space-y-1 text-base list-disc list-inside">
                          @foreach($responsibility['items'] as $item)
                              <li>{{ $item }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endforeach
          </div>
      </div>
  </div>
</div>
