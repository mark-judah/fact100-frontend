<div>

    <div class="flex justify-center">
        <form method="post" action="{{ url('/admin-new-category') }}">
            @csrf
            <div class="relative py-3">
                    <input type="text" name="category"
                           class="p-2 text-3xl"
                           placeholder="New Category"  size="25">

                        <button type="submit" class="bg-[#CAB2FE]  text-white font-bold py-2 px-4 rounded">
                            Add Category
                        </button>

            </div>
        </form>
    </div>
    <label class="tracking-wide text-gray-700 text-xs font-bold p-2"
           for="grid-state">
        (Press esc to close)
    </label>
</div>
