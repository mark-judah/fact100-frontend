<div>
    <div class="flex flex-row">
        @if ($showDiv)
            <div class="bg-[#B09CD9] h-auto w-1/5 flex flex-col">
                <div class="justify-center">
                    <p class="text-center text-2xl  p-3.5">Dashboard</p>
                </div>


                <div class="mx-auto">
                    <img class="rounded-full w-30 h-20 " src="{{$url.'uploads/avatars/'.session('avatar')}}">
                </div>

                <div class="mx-auto pt-2">
                    @if(@session('name') !== null)
                        <p class="text-xl">{{session('name')}}</p>
                        <h6 class="font-bold ">Author</h6>
                    @endif
                </div>
                <div class="flex flex-col pt-3">

                    <a href="/admin-dashboard">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/monitor-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Dashboard</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-posts">
                        <div class="bg-[#B09CD9] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/blog-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Blogs</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-podcasts">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/mic-microphone-podcast-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Podcasts</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-messages">
                        <div class="bg-[#B09CD9] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/envelope-line.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Messages</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-subscribers">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/reader-following-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Subscribers</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-categories">
                        <div class="bg-[#B09CD9] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/category-svgrepo-com.svg" class="w-7 h-7">
                            </div>
                            <div class="px-3.5">
                                <p>Blog Categories</p>
                            </div>

                        </div>
                    </a>

                    <a href="/blog-comments">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/big-comment-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>Blog Comments</p>
                            </div>

                        </div>
                    </a>

                        <a href="/admin-essay-requests">
                        <div class="bg-[#B09CD9] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/request-changes-svgrepo-com.svg" class="w-6 h-6">

                            </div>
                            <div class="px-3.5">
                                <p>Essay Requests</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-about-us">
                        <div class="bg-[#CAB2FE] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/blog-svgrepo-com.svg" class="w-6 h-6">
                            </div>
                            <div class="px-3.5">
                                <p>About Us</p>
                            </div>

                        </div>
                    </a>

                    <a href="/admin-user-profile">
                        <div class="bg-[#B09CD9] p-4 flex flex-row items-center">
                            <div>
                                <img src="/assets/images/user.svg" class="w-6 h-6">

                            </div>
                            <div class="px-3.5">
                                <p>User Profile</p>
                            </div>

                        </div>
                    </a>
                </div>


            </div>
        @endif

        @if ($showDiv)
            <div class="bg-[#CAB2FE] h-full w-4/5">
                @elseif(!$showDiv)
                    <div class="bg-[#CAB2FE] h-full w-full">
                        @endif

                        <div class="flex justify-between">
                            <div class="w-fit p-3.5">
                                <button type="button"
                                        wire:click="$toggle('showDiv')">
                                    <img class="w-8 h-8" src="/assets/images/hamburger-menu-svgrepo-com.svg">
                                </button>

                            </div>

                            <div>
                                <p class="p-3.5 font-bold text-3xl">About Page Content</p>
                            </div>

                            <div class="flex flex-row justify-end items-center w-fit">
                                @if(@session('name') !== null)
                                    <a href="{{url('/logout')}}" class="p-4"><img class="w-6 h-6 fill-black "
                                                                                  src="/assets/images/logout-svgrepo-com.svg"></a>
                                @endif
                            </div>
                        </div>

                        <div class="p-5">
                            @if (session()->has('error'))
                                <div class="bg-white font-thin rounded-2xl">
                                    <p class="p-5">{{ session('error') }}</p>
                                </div>
                            @endif

                            @if (session()->has('message'))
                                <div class="bg-white font-thin rounded-2xl">
                                    <p class="p-5">{{ session('message') }}</p>
                                </div>
                            @endif


                        </div>
                        <div class="px-10">
                            @if(isset($about))
                                <label for="submit-form" tabindex="0">
                                    <img class="w-10 h-10 fill-white "
                                         src="/assets/images/cloud-done-svgrepo-com.svg">
                                </label>
                                <div class="mb-6">
                                    <label
                                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-gray-300"
                                        for="grid-state">
                                        About Page Content
                                    </label>
                                    <label class="tracking-wide text-gray-700 text-xs font-bold mb-2"
                                           for="grid-state">
                                        (Toggle fullscreen in view menu for a better editing experience)
                                    </label>
                                    <form id="new_podcast" class="w-full max-w-lg" action="/admin-edit-about"
                                          method="post"
                                          enctype="multipart/form-data">

                                        {{ csrf_field() }}
                                        <input type="hidden" class="w-full" name="about_id"
                                               value="{{$about[0]['id']}}">

                                        <textarea class="content w-screen"
                                                  name="about_content">{{$about[0]['content_body']}}</textarea>

                                        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


                                        <script>
                                            var editor_config = {
                                                selector: 'textarea.content',
                                                height: 800,
                                                width: 1100,
                                                paste_data_images: true,

                                                image_class_list: [{
                                                    title: 'img-responsive',
                                                    value: 'img-responsive'
                                                },],
                                                plugins: [
                                                    'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                                                    'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'pagebreak', 'searchreplace', 'visualblocks', 'paste',
                                                    'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'
                                                ],
                                                toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                                                    'alignleft aligncenter alignright alignjustify | ' +
                                                    'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help',
                                                image_prepend_url: 'https://100.fact100.com/',

                                                images_upload_handler: function (blobInfo, success, failure) {
                                                    var xhr, formData;
                                                    xhr = new XMLHttpRequest();
                                                    xhr.withCredentials = false;
                                                    xhr.open('POST', '{{route("admin_about_page_image_upload")}}');
                                                    var token = '{{csrf_token()}}';
                                                    xhr.setRequestHeader("X-CSRF-Token", token);
                                                    xhr.onload = function () {
                                                        var json;
                                                        if (xhr.status < 200 || xhr.status >= 300) {
                                                            failure('HTTP Error: ' + xhr.status);
                                                            return;
                                                        }

                                                        json = JSON.parse(xhr.responseText);

                                                        if (!json || typeof json.location != 'string') {
                                                            failure('Invalid JSON: ' + xhr.responseText);
                                                            return;
                                                        }

                                                        success(json.location);
                                                    };

                                                    formData = new FormData();
                                                    formData.append('file', blobInfo.blob(), blobInfo.fileName);

                                                    xhr.send(formData);
                                                }
                                            };
                                            tinymce.init(editor_config);

                                        </script>


                                        <input type="submit" id="submit-form" class="hidden"/>
                                    </form>
                                    @else
                                        <div class="bg-white font-thin rounded-2xl">
                                            <p class="p-5">There is no content on the about page.</p>
                                        </div>
                                    @endif
                                </div>
                        </div>
                    </div>
            </div>
    </div>

