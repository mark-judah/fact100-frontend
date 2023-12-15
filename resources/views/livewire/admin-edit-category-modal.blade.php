<div>

@if (session()->has('message'))
        <div class="p-4 sm:px-10">
            <div class="bg-[#CAB2FE] text-white font-normal rounded-2xl">
                <p class="p-5">{{ session('message') }}</p>
            </div>
        </div>
    @endif
    <div>
        @if($posts!=null)
            <h1 class="p-2 font-bold">
                The following posts are in the selected category. Move the posts to a different category before deleting the
                category.
            </h1>
        @else
            <h1 class="p-2 font-bold">
               No posts found in this category. You can safely delete the category.
            </h1>
        @endif

        <table class="table-auto  text-gray-400 border-separate space-y-6 text-sm">
            <tbody>
            <?php
            $index = 0;
            ?>
            <tr class=" rounded-3xl">
                <th class="px-4 py-2 ">#</th>
                <th class="px-4 py-2 ">Title</th>
                <th class="px-4 py-2 ">Category</th>
                <th class="px-4 py-2 ">Change Category</th>
                <th class="px-4 py-2 ">Actions</th>
            </tr>
            @foreach($posts as $post)
                <?php $index = $index + 1?>
                <tr class="lg:text-black">
                    <td class="px-4 py-2  font-medium border">{{$index}}</td>
                    <td class="px-4 py-2  font-medium border">{{$post['title']}}</td>
                    <td class="px-4 py-2  font-medium border">{{$post['category']}}</td>

                    <td>
                        <div class="relative">

                                <select wire:model="selected_category"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    name="blog_category" required="">
                                    <option selected hidden>{{$post['category']}}</option>
                                    @if(isset($categories))
                                        @foreach($categories as $category)
                                            <option>{{$category}}</option>
                                        @endforeach
                                    @endif

                                </select>

                        </div>
                    </td>
                    <td class="px-4 py-2  font-medium border">
                        <div class="flex flex-row justify-evenly">
                            <div>
                                <button class="bg-[#CAB2FE] text-white font-bold py-2 px-4 rounded" wire:click="changeCategory('{{ $post['id'] }}')">
                                    <p>Save</p>
                                </button>
                            </div>

                        </div>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>

        <div
            class="sm:box-decoration-slice bg-white sm:p-5 rounded-2xl justify-between flex grid-cols-2">
            <div>
                <p class=" font-thin"></p>
            </div>
            <div>

                <button class="bg-[#CAB2FE] text-white font-bold py-2 px-4 rounded" onclick='Livewire.emit("openModal", "admin-about-category-modal",{{ json_encode(["category" => $current_category]) }})'>
                    <p><i class="bi bi-pencil-fill"></i> Category Description</p>
                </button>

                <button class="bg-[#CAB2FE] text-white font-bold py-2 px-4 rounded" wire:click="deleteCategory()">
                    <p><i class="bi bi-archive-fill"></i> Delete Category</p>
                </button>
            </div>

        </div>
    </div>
        <label class="tracking-wide text-gray-700 text-xs font-bold p-2"
               for="grid-state">
            (Press esc to close)
        </label>
</div>
