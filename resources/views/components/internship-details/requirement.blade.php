{{-- resources/views/components/interman/requirement.blade.php --}}
<div class="pl-10">
  <div class="relative bg-white p-0 rounded-xl shadow-md overflow-hidden"> {{-- Kontainer utama: relative, p-0, overflow-hidden --}}
      {{-- Strip merah di sisi kiri (full height) --}}
      <div class="absolute mb-52 inset-y-4 left-0 w-2 bg-redgoon"></div> {{-- Menggunakan w-2 untuk lebar, dan bg-red-600 (memperbaiki typo 'redgoon') --}}

      {{-- Konten persyaratan, digeser ke kanan dengan ml-2 --}}
      <div class="p-6 ml-2"> {{-- Padding normal pada konten, ditambah margin kiri --}}
          <h2 class="text-xl font-semibold text-gray-800 mb-4">Requirement</h2>
          <ul class="list-disc list-inside text-gray-700 space-y-2 text-base">
              <li>Strong design skills are required.</li>
              <li>Having frontend development skills is a plus.</li>
              <li>Proficiency in design tools (e.g., Figma, Sketch, Adobe XD).</li>
              <li>Basic understanding of HTML, CSS, and JavaScript.</li>
              <li>Good communication and teamwork skills.</li>
              <li>Ability to work independently and manage time effectively.</li>
          </ul>
      </div>
  </div>
</div>