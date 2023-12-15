<div>
    @if($description[0]['description'])
        <h1 class="p-2 font-bold">
            Edit the categories description.
        </h1>

        <div>
            <h3>
                {{$description[0]['description']}}
            </h3>
        </div>

        <div class="relative py-3">
             <textarea wire:model="textarea_content"
                 class="form-control block w-full px-3 py-1.5 text-base  font-normal  text-gray-700  bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition  ease-in-out  m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                 rows="3">
            </textarea>
        </div>

       <div>
           <button type="submit" class="bg-[#CAB2FE]  text-white font-bold py-2 px-4 rounded" wire:click="editDescription()">
               Edit Description
           </button>
       </div>

    @else
        <h1 class="p-2 font-bold">
            Add a new description.
        </h1>

        <div class="relative py-3">
                    <textarea wire:model="textarea_content"
                              class="form-control block w-full px-3 py-1.5 text-base  font-normal  text-gray-700  bg-white bg-clip-padding border border-solid border-gray-300
                                rounded transition  ease-in-out  m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                              rows="3">
                    </textarea>
        </div>

        <div>
            <button type="submit" class="bg-[#CAB2FE]  text-white font-bold py-2 px-4 rounded" wire:click="editDescription()">
                Save New Description
            </button>
        </div>
    @endif
    <label class="tracking-wide text-gray-700 text-xs font-bold p-2"
           for="grid-state">
        (Press esc to close)
    </label>
</div>
