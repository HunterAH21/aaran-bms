@props([
'label'=>'',
])

<div class="relative ">
    <select id="floating_outlined"
            {{ $attributes->merge([ 'class' => 'block dark:bg-dark dark:text-dark-9 px-4 py-2 w-full text-gray-900 bg-white rounded-lg
             border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer'])}}
            placeholder=" ">
        {{$slot}}
    </select>

    <label for="floating_outlined"
           class="absolute text-xs text-gray-500  duration-300 transform -translate-y-4
           scale-75 top-2 z-10 origin-[0] dark:bg-dark dark:text-dark-9
           bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600
           peer-placeholder-shown:scale-100
           peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2
           peer-focus:scale-75 peer-focus:-translate-y-4
           rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">{{ Str::replace('_',' ',Str::ucfirst($label))}}</label>
</div>
