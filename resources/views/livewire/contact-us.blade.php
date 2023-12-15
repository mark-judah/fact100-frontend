<div class="p-4 sm:p-10">
    <div class="box-decoration-slice bg-[#D9E2F8] hidden sm:block rounded-2xl">
        <div class="pl-12 pb-5 pt-10 flex justify-center">
            <h1 class="text-3xl font-bold">Contact Us</h1>
        </div>

        <div class="flex justify-center">
        <form class="pl-10 " method="post" action="{{ url('/send-message') }}">
            @csrf
            <div class="pb-5 ">
                <input type="text" name="name"
                       class="p-3 pl-2 text-2xl text-black bg-white font-thin rounded-2xl"
                       placeholder="Name"  size="70" required="">
            </div>

            <div class="pb-5 ">
                <input type="email" name="email"
                       class="p-3 pl-2 text-2xl text-black bg-white font-thin rounded-2xl"
                       placeholder="Email"  size="70" required="">
            </div>

            <div class="pb-5 ">
                <input type="text" name="subject"
                       class="p-3 pl-2 text-2xl text-black bg-white font-thin rounded-2xl"
                       placeholder="Subject"  size="70" required="">
            </div>

            <div class="pb-5 ">
                <textarea type="text" name="message"
                       class="p-3 pl-2 text-2xl text-black bg-white font-thin rounded-2xl"
                          placeholder="Message"  cols="75"  rows="5" required="required"></textarea>
            </div>

            <div class="pb-5 flex justify-center">
                <input type="submit"
                       class="p-2 text-2xl text-white font-thin bg-blue-900 rounded-2xl w-100"
                       value="Submit">
            </div>
        </form>
        </div>

    </div>


    <div class="box-decoration-slice bg-[#D9E2F8] sm:hidden rounded-2xl">
        <div class="pb-5 pt-10 flex justify-center">
            <h1 class="text-3xl font-bold">Contact Us</h1>
        </div>


        <div class="flex justify-center">
            <form class="p-3.5" method="post" action="{{ url('/send-message') }}">
                @csrf
                <div class="pb-5 ">
                    <input type="text" name="name"
                           class="p-3 text-2xl text-black bg-white font-thin rounded-2xl"
                           placeholder="Name"  size="12" required="">
                </div>

                <div class="pb-5 ">
                    <input type="email" name="email"
                           class="p-3 text-2xl text-black bg-white font-thin rounded-2xl"
                           placeholder="Email"  size="12" required="">
                </div>

                <div class="pb-5 ">
                    <input type="text" name="subject"
                           class="p-3 text-2xl text-black bg-white font-thin rounded-2xl"
                           placeholder="Subject"  size="12" required="">
                </div>

                <div class="pb-5 ">
                    <input type="text" name="message"
                           class="p-3 text-2xl text-black bg-white font-thin rounded-2xl"
                           placeholder="Message"  size="12" required="">
                </div>

                <div class="pb-5 flex justify-center">
                    <input type="submit"
                           class="p-5  text-2xl text-white font-thin bg-blue-900 rounded-2xl w-100"
                           value="Submit">
                </div>
            </form>

        </div>
    </div>

</div>
