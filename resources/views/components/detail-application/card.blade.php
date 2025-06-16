@props([
    'location' => 'Default Location',
    'title' => 'Default Title',
    'company' => 'Default Company',
    'profile' => 'https://placehold.co/65x65',
    'applied' => 0,
    'due' => '0 days',
    'href' => '#',
    'students' => collect()
])

@php
    // Group students by study program and count them
    $studyProgramCounts = $students->groupBy('study_program')->map(function($group) {
        return $group->count();
    });

    // Get the first study program as default
    $defaultProgram = $studyProgramCounts->keys()->first() ?? 'Informatics Engineering';
    $defaultCount = $studyProgramCounts->get($defaultProgram, 0);
@endphp

<div class="w-[990px] h-[260px] px-5 py-5 bg-white rounded-[20px] inline-flex flex-col justify-start items-start gap-5">
    <x-internship.location location="{{ $location }}" />
    <x-internship.role title="{{ $title }}" company="{{ $company }}" profile="{{ $profile }}" />
    <x-internship.details applied="{{ $applied }}" due="{{ $due }}" />

    <div class="relative">
      <div id="departmentDropdown" class="size- px-2.5 py-2 bg-zinc-800 rounded-[20px] inline-flex justify-center items-center gap-2 cursor-pointer hover:bg-zinc-700 transition-colors">
        <div class="flex items-center justify-center gap-2 size-">
          <div class="size- flex justify-center items-center gap-[3px]">
            <div data-svg-wrapper class="relative">
              <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.557 8.67471C12.0632 7.96742 12.3354 7.11947 12.3354 6.24971C12.3354 5.37994 12.0632 4.53199 11.557 3.82471C12.031 3.50181 12.5918 3.33037 13.1654 3.33304C13.9389 3.33304 14.6808 3.64033 15.2278 4.18731C15.7747 4.73429 16.082 5.47616 16.082 6.24971C16.082 7.02325 15.7747 7.76512 15.2278 8.3121C14.6808 8.85908 13.9389 9.16637 13.1654 9.16637C12.5918 9.16904 12.031 8.9976 11.557 8.67471ZM5.2487 6.24971C5.2487 5.67284 5.41976 5.10894 5.74024 4.62929C6.06073 4.14965 6.51625 3.77581 7.0492 3.55506C7.58216 3.3343 8.1686 3.27654 8.73438 3.38908C9.30016 3.50162 9.81986 3.77941 10.2278 4.18731C10.6357 4.59521 10.9134 5.11491 11.026 5.68069C11.1385 6.24647 11.0808 6.83291 10.86 7.36587C10.6393 7.89882 10.2654 8.35434 9.78578 8.67483C9.30614 8.99531 8.74223 9.16637 8.16536 9.16637C7.39182 9.16637 6.64995 8.85908 6.10297 8.3121C5.55599 7.76512 5.2487 7.02325 5.2487 6.24971ZM6.91536 6.24971C6.91536 6.49693 6.98868 6.73861 7.12603 6.94417C7.26338 7.14973 7.4586 7.30995 7.68701 7.40455C7.91542 7.49916 8.16675 7.52392 8.40923 7.47569C8.6517 7.42746 8.87443 7.3084 9.04925 7.13359C9.22406 6.95877 9.34312 6.73604 9.39135 6.49357C9.43958 6.25109 9.41482 5.99976 9.32021 5.77135C9.22561 5.54294 9.06539 5.34772 8.85983 5.21037C8.65427 5.07302 8.41259 4.99971 8.16536 4.99971C7.83384 4.99971 7.5159 5.1314 7.28148 5.36582C7.04706 5.60024 6.91536 5.91818 6.91536 6.24971ZM13.9987 14.1664V15.833H2.33203V14.1664C2.33203 14.1664 2.33203 10.833 8.16536 10.833C13.9987 10.833 13.9987 14.1664 13.9987 14.1664ZM12.332 14.1664C12.2154 13.5164 11.2237 12.4997 8.16536 12.4997C5.10703 12.4997 4.05703 13.5914 3.9987 14.1664M13.957 10.833C14.4678 11.2303 14.8854 11.7346 15.1805 12.3104C15.4756 12.8863 15.6411 13.5198 15.6654 14.1664V15.833H18.9987V14.1664C18.9987 14.1664 18.9987 11.1414 13.9487 10.833H13.957Z" fill="white"/>
              </svg>
            </div>
            <div class="flex items-center justify-center gap-1">
              <span id="registerCount" class="text-white text-xs font-normal font-['Poppins']">{{ $defaultCount }}</span>
              <span class="text-white text-xs font-normal font-['Poppins']">Register</span>
            </div>
          </div>
          <div data-svg-wrapper>
            <svg width="2" height="21" viewBox="0 0 2 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.666016 0.5L0.666017 20.5" stroke="white" stroke-opacity="0.5" stroke-linecap="round"/>
            </svg>
          </div>
          <div id="departmentName" class="w-44 text-center justify-center text-white text-xs font-normal font-['Poppins']">D-IV {{ $defaultProgram }}</div>
        </div>
        <div id="dropdownArrow" data-svg-wrapper class="transition-transform duration-200">
          <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0.666015 8.5C0.666015 6.91775 1.13521 5.37103 2.01426 4.05544C2.89331 2.73985 4.14274 1.71447 5.60455 1.10897C7.06636 0.503467 8.67489 0.34504 10.2267 0.653722C11.7786 0.962404 13.204 1.72433 14.3229 2.84315C15.4417 3.96197 16.2036 5.38743 16.5123 6.93928C16.821 8.49113 16.6625 10.0997 16.057 11.5615C15.4515 13.0233 14.4262 14.2727 13.1106 15.1518C11.795 16.0308 10.2483 16.5 8.66601 16.5C6.54497 16.4978 4.51144 15.6542 3.01163 14.1544C1.51183 12.6546 0.668255 10.621 0.666015 8.5ZM9.1014 10.7815L12.1783 7.70462C12.2355 7.64744 12.2808 7.57957 12.3118 7.50486C12.3427 7.43016 12.3587 7.35009 12.3587 7.26923C12.3587 7.18838 12.3427 7.10831 12.3118 7.0336C12.2808 6.9589 12.2355 6.89102 12.1783 6.83385C12.1211 6.77667 12.0533 6.73132 11.9786 6.70038C11.9039 6.66943 11.8238 6.65351 11.7429 6.65351C11.6621 6.65351 11.582 6.66943 11.5073 6.70038C11.4326 6.73132 11.3647 6.77667 11.3076 6.83385L8.66601 9.47616L6.02448 6.83385C5.90901 6.71838 5.75239 6.65351 5.58909 6.65351C5.42579 6.65351 5.26918 6.71838 5.15371 6.83385C5.03823 6.94932 4.97336 7.10593 4.97336 7.26923C4.97336 7.43253 5.03823 7.58915 5.15371 7.70462L8.23063 10.7815C8.28778 10.8388 8.35565 10.8841 8.43036 10.9151C8.50506 10.9461 8.58514 10.962 8.66601 10.962C8.74688 10.962 8.82696 10.9461 8.90167 10.9151C8.97638 10.8841 9.04425 10.8388 9.1014 10.7815Z" fill="white"/>
          </svg>
        </div>
      </div>

      <!-- Dropdown Menu -->
      <div id="dropdownMenu" class="absolute top-full left-0 mt-2 w-full bg-main rounded-[10px] shadow-lg border border-neutral-200 z-10 hidden">
        <div class="py-2">
          @forelse($studyProgramCounts as $program => $count)
            <div class="flex items-center justify-between px-4 py-2 cursor-pointer dropdown-item hover:bg-neutral-700" data-count="{{ $count }}" data-department="{{ $program }}">
              <span class="text-white text-xs font-normal font-['Poppins']">{{ $program }}</span>
              <span class="text-white text-xs font-normal font-['Poppins']">{{ $count }} Register</span>
            </div>
          @empty
            <div class="flex items-center justify-between px-4 py-2 cursor-pointer dropdown-item hover:bg-neutral-700" data-count="0" data-department="No Applications">
              <span class="text-white text-xs font-normal font-['Poppins']">No Applications</span>
              <span class="text-white text-xs font-normal font-['Poppins']">0 Register</span>
            </div>
          @endforelse
        </div>
      </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.getElementById('departmentDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownArrow = document.getElementById('dropdownArrow');
        const departmentName = document.getElementById('departmentName');
        const registerCount = document.getElementById('registerCount');
        const dropdownItems = document.querySelectorAll('.dropdown-item');

        // Toggle dropdown
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            const isHidden = dropdownMenu.classList.contains('hidden');

            if (isHidden) {
                dropdownMenu.classList.remove('hidden');
                dropdownArrow.style.transform = 'rotate(180deg)';
            } else {
                dropdownMenu.classList.add('hidden');
                dropdownArrow.style.transform = 'rotate(0deg)';
            }
        });

        // Handle dropdown item selection
        dropdownItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.stopPropagation();

                const count = this.getAttribute('data-count');
                const department = this.getAttribute('data-department');

                // Update the display
                registerCount.textContent = count;
                departmentName.textContent = department;

                // Close dropdown
                dropdownMenu.classList.add('hidden');
                dropdownArrow.style.transform = 'rotate(0deg)';
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function() {
            dropdownMenu.classList.add('hidden');
            dropdownArrow.style.transform = 'rotate(0deg)';
        });
    });
    </script>
</div>
