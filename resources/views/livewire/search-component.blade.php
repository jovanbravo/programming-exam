<div>
    <form method="GET" action="{{ route('home') }}">
        <div class="flex items-center justify-center ">
            <div class="flex border-2 border-gray-200 rounded">
                <input type="text" wire.model="search" name="search" class="px-4 py-2 mx-2 w-80" placeholder="Search...">
                <select wire.model="type" name="type" class="px-4 py-2  w-80">
                    <option>Choose ...</option>
                    <option value="frontend_development">Frontend Development</option>
                    <option value="backend_development">Backend Development</option>
                </select>
                <button wire.prevent.click="search" class="px-4 text-white bg-blue-600 border-l ">
                    Search
                </button>
            </div>
        </div>
    </form>
    <div>

    </div>
</div>
