<!--  20 - settings -->
<li class="flex align-center flex-col cursor-pointer" >

    <div
        @click="selected !== 20 ? selected = 20 : selected = null"
        class="relative flex flex-row justify-between items-center h-11 focus:outline-none hover:bg-gray-700
                                text-gray-500 hover:text-gray-200 border-l-4 border-transparent hover:border-blue-500 px-4 group">

                        <span class="inline-flex justify-center items-center space-x-3">
           <x-Ui::icons.icon-fill iconfill="settings" class="w-4 h-auto block fill-gray-500 group-hover:fill-blue-500"/>

                            <span
                                class="flex font-semibold text-sm tracking-wide truncate my-4 font-sans uppercase">
                                Settings
                            </span>

{{--                        </span>--}}

{{--        <span class="inline-flex justify-center items-center">--}}
{{--                        <svg fill="currentColor" viewBox="0 0 20 20"--}}
{{--                             :class="{'rotate-0': selected ==null, 'rotate-180': selected === 6}"--}}
{{--                             class="inline w-6 h-6 float-right transition-transform duration-500 transform md:-mt-1">--}}
{{--                            <path fill-rule="evenodd"--}}
{{--                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"--}}
{{--                                  clip-rule="evenodd"></path>--}}
{{--                        </svg>--}}
</span>


    </div>

{{--    <div x-show="selected === 6" class="p-1 flex flex-col">--}}

{{--        <ul class="grid-cols-1 grid bg-gray-800">--}}

{{--            @include('Ui::components.menu.app.items.common-menu')--}}
{{--            <li class="bg-gray-900 mt-0.5"></li>--}}
{{--        </ul>--}}

{{--    </div>--}}
</li>
