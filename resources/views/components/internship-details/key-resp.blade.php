{{-- resources/views/components/interman/key-resp.blade.php --}}
<div class="pl-10">
  <div class="relative bg-white p-0 rounded-xl shadow-md overflow-hidden "> {{-- Kontainer utama: relative, p-0, overflow-hidden --}}
      {{-- Strip merah di sisi kiri (full height) --}}
      <div class="absolute mb-65 inset-y-4 left-0 w-2 bg-redgoon"></div>

      {{-- Konten Key Responsibilities, digeser ke kanan dengan ml-2 --}}
      <div class="p-6 ml-2"> {{-- Padding normal pada konten, ditambah margin kiri --}}
          <h2 class="text-xl font-semibold text-gray-800 mb-4">Key Responsibilities</h2>
          <div class="space-y-4 text-gray-700">
              <div>
                  <h3 class="font-semibold text-lg mb-1">1. UI/UX Design:</h3>
                  <ul class="list-disc list-inside ml-4 space-y-1 text-base">
                      <li>Create visually appealing and intuitive user interfaces.</li>
                      <li>Collaborate with stakeholders and product managers to gather requirements and develop high-fidelity mockups.</li>
                      <li>Conduct research and usability testing to refine designs.</li>
                  </ul>
              </div>
              <div>
                  <h3 class="font-semibold text-lg mb-1">2. Frontend Development (Optional):</h3>
                  <ul class="list-disc list-inside ml-4 space-y-1 text-base">
                      <li>Develop and maintain the frontend of web applications using Vue.js and Vuefity.</li>
                      <li>Work closely with backend developers to integrate APIs and backend services.</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>