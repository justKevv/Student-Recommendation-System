{{-- resources/views/components/interman/role-desc.blade.php --}}
<div class="py-8 pl-10">
  <div class="relative bg-white p-0 rounded-xl shadow-md overflow-hidden"> {{-- Tambahkan relative, p-0, dan overflow-hidden --}}
      {{-- Strip merah di sisi kiri --}}
      <div class="absolute mb-25 inset-y-4 left-0 w-2 bg-redgoon"></div>

      {{-- Konten deskripsi peran, tambahkan ml-2 untuk menggeser ke kanan --}}
      <div class="p-6 ml-2"> {{-- Sesuaikan padding dan tambahkan ml-2 --}}
          <h2 class="text-xl font-semibold text-gray-800 mb-4">Role Description</h2>
          <p class="text-gray-700 leading-relaxed text-base">
              The image contains a job posting for a full-time UI/UX Designer role. It highlights that strong design skills are required, and having frontend development skills is a plus. The responsibilities include designing user interfaces and improving user experiences. The position is primarily based in Tokyo but offers some remote work flexibility.
          </p>
      </div>
  </div>
</div>