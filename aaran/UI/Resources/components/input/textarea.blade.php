@props([
    'label' => '',
    'height' => '40'
])

<div class="w-full space-y-5 ">
    <div class="relative">
    <textarea id="hs-floating-textarea" class="peer p-4 block w-full h-{{$height}} border-2
     border-gray-300 rounded-lg text-sm
    placeholder:text-transparent focus:border-none focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
    dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-neutral-600
    focus:pt-8
    focus:pb-2
    [&:not(:placeholder-shown)]:pt-8
    [&:not(:placeholder-shown)]:pb-2
    autofill:pt-6
    autofill:pb-2
    overflow-y-auto" placeholder="This is a textarea placeholder" {{$attributes}}></textarea>
        <label for="hs-floating-textarea" class="absolute top-0 start-0 p-4 mb-10 h-full text-sm truncate
        pointer-events-none transition ease-in-out duration-100 border border-transparent origin-[0_0]  text-gray-500
        dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none
      peer-focus:text-xs
      peer-focus:-translate-y-1.5
      peer-focus:text-blue-600 dark:peer-focus:text-neutral-500
      peer-[:not(:placeholder-shown)]:text-xs
      peer-[:not(:placeholder-shown)]:-translate-y-1.5
      peer-[:not(:placeholder-shown)]:text-gray-500 dark:peer-[:not(:placeholder-shown)]:text-neutral-500">{{$label}}</label>
    </div>

</div>
