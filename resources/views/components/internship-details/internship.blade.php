@props([
    'img' => 'https://placehold.co/80x80/E0E7FF/4F46E5?text=JA',
    'title' => 'UI/UX Design Internship',
    'company' => 'Jasa Ayah Corp',
    'location' => 'Malang',
    'update' => 'May 15, 2025',
    'days' => 9,
    'format' => 'hours'
])

<div class="overflow-hidden relative p-0 bg-white rounded-xl">
    <div class="absolute inset-y-0 left-0 w-2 bg-redgoon"></div>

    <div class="relative p-6 pb-8 ml-2 shadow-">
        <div class="flex flex-col items-start space-y-7">
            <img src="{{ $img }}" alt="Jasa Ayah Corp Logo" class="w-24 h-24 rounded-full">
            <h1 class="text-2xl font-semibold leading-tight text-main">{{ $title }}</h1>
        </div>

        <div class="mt-4">
            <div class="flex items-center mt-1 text-base text-main">
                <div class="inline-flex gap-1.5 justify-center items-center size-">
                    <div data-svg-wrapper class="relative">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M3 21.002V8.00195L16 3.00195V12.002H17C17 11.452 17.1958 10.9811 17.5875 10.5895C17.9792 10.1978 18.45 10.002 19 10.002C19.55 10.002 20.0208 10.1978 20.4125 10.5895C20.8042 10.9811 21 11.452 21 12.002V21.002H3ZM5 19.002H9V12.002H14V5.90195L5 9.37695V19.002ZM11 19.002H14V16.002H16V19.002H19V14.002H11V19.002Z" fill="#393939"/>
                      </svg>
                    </div>
                    <div class="justify-start text-main text-base font-normal font-['Poppins']">{{ $company }}</div>
                  </div>
            </div>
            <div class="flex items-center mt-1 text-base text-main">
                <div class="inline-flex gap-1.5 justify-center items-center size-">
                    <div data-svg-wrapper class="relative">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M12 12.002C12.55 12.002 13.0208 11.8061 13.4125 11.4145C13.8042 11.0228 14 10.552 14 10.002C14 9.45195 13.8042 8.98112 13.4125 8.58945C13.0208 8.19779 12.55 8.00195 12 8.00195C11.45 8.00195 10.9792 8.19779 10.5875 8.58945C10.1958 8.98112 10 9.45195 10 10.002C10 10.552 10.1958 11.0228 10.5875 11.4145C10.9792 11.8061 11.45 12.002 12 12.002ZM12 19.352C14.0333 17.4853 15.5417 15.7895 16.525 14.2645C17.5083 12.7395 18 11.3853 18 10.202C18 8.38529 17.4208 6.89779 16.2625 5.73945C15.1042 4.58112 13.6833 4.00195 12 4.00195C10.3167 4.00195 8.89583 4.58112 7.7375 5.73945C6.57917 6.89779 6 8.38529 6 10.202C6 11.3853 6.49167 12.7395 7.475 14.2645C8.45833 15.7895 9.96667 17.4853 12 19.352ZM12 22.002C9.31667 19.7186 7.3125 17.5978 5.9875 15.6395C4.6625 13.6811 4 11.8686 4 10.202C4 7.70195 4.80417 5.71029 6.4125 4.22695C8.02083 2.74362 9.88333 2.00195 12 2.00195C14.1167 2.00195 15.9792 2.74362 17.5875 4.22695C19.1958 5.71029 20 7.70195 20 10.202C20 11.8686 19.3375 13.6811 18.0125 15.6395C16.6875 17.5978 14.6833 19.7186 12 22.002Z" fill="#393939"/>
                      </svg>
                    </div>
                    <div class="justify-start text-main text-base font-normal font-['Poppins']">{{ $location }}</div>
                  </div>
            </div>
            <div class="flex items-center mt-1 text-sm text-main">
                <div class="inline-flex gap-1.5 justify-center items-center self-stretch">
                    <div data-svg-wrapper class="relative">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19 4H17V3C17 2.73478 16.8946 2.48043 16.7071 2.29289C16.5196 2.10536 16.2652 2 16 2C15.7348 2 15.4804 2.10536 15.2929 2.29289C15.1054 2.48043 15 2.73478 15 3V4H9V3C9 2.73478 8.89464 2.48043 8.70711 2.29289C8.51957 2.10536 8.26522 2 8 2C7.73478 2 7.48043 2.10536 7.29289 2.29289C7.10536 2.48043 7 2.73478 7 3V4H5C4.20435 4 3.44129 4.31607 2.87868 4.87868C2.31607 5.44129 2 6.20435 2 7V19C2 19.7956 2.31607 20.5587 2.87868 21.1213C3.44129 21.6839 4.20435 22 5 22H19C19.7956 22 20.5587 21.6839 21.1213 21.1213C21.6839 20.5587 22 19.7956 22 19V7C22 6.20435 21.6839 5.44129 21.1213 4.87868C20.5587 4.31607 19.7956 4 19 4ZM20 19C20 19.2652 19.8946 19.5196 19.7071 19.7071C19.5196 19.8946 19.2652 20 19 20H5C4.73478 20 4.48043 19.8946 4.29289 19.7071C4.10536 19.5196 4 19.2652 4 19V12H20V19ZM20 10H4V7C4 6.73478 4.10536 6.48043 4.29289 6.29289C4.48043 6.10536 4.73478 6 5 6H7V7C7 7.26522 7.10536 7.51957 7.29289 7.70711C7.48043 7.89464 7.73478 8 8 8C8.26522 8 8.51957 7.89464 8.70711 7.70711C8.89464 7.51957 9 7.26522 9 7V6H15V7C15 7.26522 15.1054 7.51957 15.2929 7.70711C15.4804 7.89464 15.7348 8 16 8C16.2652 8 16.5196 7.89464 16.7071 7.70711C16.8946 7.51957 17 7.26522 17 7V6H19C19.2652 6 19.5196 6.10536 19.7071 6.29289C19.8946 6.48043 20 6.73478 20 7V10Z" fill="#393939"/>
                      </svg>
                    </div>
                    <div class="justify-start text-neutral-700 text-base font-normal font-['Poppins']">Update On: {{ $update }}</div>
                  </div>
            </div>
        </div>

        <div class="absolute top-4 right-4">
            <x-internship-details.days :days='$days' :format='$format'/>
        </div>
    </div>
</div>
