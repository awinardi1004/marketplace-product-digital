<section id="Tool" class="mb-[102px] flex flex-col gap-8">
    <div class="container max-w-[1130px] mx-auto flex justify-between items-center">
        <h2 class="font-semibold text-[32px]">Browse Tools</h2>
    </div>
    <div class="tools-logos w-full overflow-hidden flex flex-col gap-5">
        <div class="group/slider flex flex-nowrap w-max items-center">
            <div
                class="logo-container animate-[slide_50s_linear_infinite] group-hover/slider:pause-animate flex gap-5 pl-5 items-center flex-nowrap">
                @foreach ($tools as $tool)
                    <a href=""
                        class="group tool-card w-fit h-fit p-[1px] rounded-full bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
                        <div
                            class="w-[300px] h-[100px] rounded-full p-[18px_24px] bg-img-black-gradient group-hover:[background-image:linear-gradient(#181818,#181818)] group-active:bg-img-black transition-all duration-300 flex gap-4 items-center shrink-0">
                            <div class="w-16 h-16 overflow-hidden flex shrink-0">
                                <img src="{{Storage::url( $tool->icon_path)}}" class="w-full h-full object-contain"
                                    alt="logo">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <p class="font-bold text-lg">{{ $tool->name }}</p>
                                <p class="font-semibold text-xs leading-[170%] text-belibang-grey">{{ $tool->role }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div
                class="logo-container animate-[slide_50s_linear_infinite] group-hover/slider:pause-animate flex gap-5 pl-5 items-center flex-nowrap ">
                @foreach ($tools as $tool)
                    <a href=""
                        class="group tool-card w-fit h-fit p-[1px] rounded-full bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
                        <div
                            class="w-[300px] h-[100px] rounded-full p-[18px_24px] bg-img-black-gradient group-hover:[background-image:linear-gradient(#181818,#181818)] group-active:bg-img-black transition-all duration-300 flex gap-4 items-center shrink-0">
                            <div class="w-16 h-16 overflow-hidden flex shrink-0">
                                <img src="{{Storage::url( $tool->icon_path)}}" class="w-full h-full object-contain"
                                    alt="logo">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <p class="font-bold text-lg">{{ $tool->name }}</p>
                                <p class="font-semibold text-xs leading-[170%] text-belibang-grey">{{ $tool->role }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="group/slider flex flex-nowrap w-max items-center">
            <div
                class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-5 pl-5 items-center flex-nowrap">
                @foreach ($tools as $tool)
                    <a href=""
                        class="group tool-card w-fit h-fit p-[1px] rounded-full bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
                        <div
                            class="w-[300px] h-[100px] rounded-full p-[18px_24px] bg-img-black-gradient group-hover:[background-image:linear-gradient(#181818,#181818)] group-active:bg-img-black transition-all duration-300 flex gap-4 items-center shrink-0">
                            <div class="w-16 h-16 overflow-hidden flex shrink-0">
                                <img src="{{Storage::url( $tool->icon_path)}}" class="w-full h-full object-contain"
                                    alt="logo">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <p class="font-bold text-lg">{{ $tool->name }}</p>
                                <p class="font-semibold text-xs leading-[170%] text-belibang-grey">{{ $tool->role }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div
                class="logo-container animate-[slideToR_50s_linear_infinite] group-hover/slider:pause-animate flex gap-5 pl-5 items-center flex-nowrap ">
                @foreach ($tools as $tool)
                    <a href=""
                        class="group tool-card w-fit h-fit p-[1px] rounded-full bg-img-transparent hover:bg-img-purple-to-orange transition-all duration-300">
                        <div
                            class="w-[300px] h-[100px] rounded-full p-[18px_24px] bg-img-black-gradient group-hover:[background-image:linear-gradient(#181818,#181818)] group-active:bg-img-black transition-all duration-300 flex gap-4 items-center shrink-0">
                            <div class="w-16 h-16 overflow-hidden flex shrink-0">
                                <img src="{{Storage::url( $tool->icon_path)}}" class="w-full h-full object-contain"
                                    alt="logo">
                            </div>
                            <div class="flex flex-col justify-center gap-1">
                                <p class="font-bold text-lg">{{ $tool->name }}</p>
                                <p class="font-semibold text-xs leading-[170%] text-belibang-grey">{{ $tool->role }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>