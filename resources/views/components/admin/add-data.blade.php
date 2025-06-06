@props([
    'data' => 'intership',
])

<div
    class="w-40 h-10 px-6 py-2 bg-white rounded-[20px] outline outline-offset-[-1px] outline-stone-300 inline-flex flex-col justify-center items-center gap-2.5">
    <div class="inline-flex gap-0.5 justify-center items-center size-">
        <div class="justify-center text-gray-500 text-sm font-normal font-['Poppins'] whitespace-nowrap">Add
            {{ Str::ucfirst($data) }}</div>
        <div data-svg-wrapper class="relative">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.9998 20.1598C7.48784 20.1598 3.83984 16.5118 3.83984 11.9998C3.83984 7.48784 7.48784 3.83984 11.9998 3.83984C16.5118 3.83984 20.1598 7.48784 20.1598 11.9998C20.1598 16.5118 16.5118 20.1598 11.9998 20.1598ZM11.9998 4.79984C8.01584 4.79984 4.79984 8.01584 4.79984 11.9998C4.79984 15.9838 8.01584 19.1998 11.9998 19.1998C15.9838 19.1998 19.1998 15.9838 19.1998 11.9998C19.1998 8.01584 15.9838 4.79984 11.9998 4.79984Z"
                    fill="#757575" />
                <path d="M7.67969 11.5195H16.3197V12.4795H7.67969V11.5195Z" fill="#757575" />
                <path d="M11.5195 7.67969H12.4795V16.3197H11.5195V7.67969Z" fill="#757575" />
            </svg>
        </div>
    </div>
</div>
