<x-guest-layout>


    <div style="width: 50%; margin: 0 auto;">

        <form method="POST" action="/visualize">

            @csrf

            <div class="space-y-12">


              <div>
                <h1 class="block text-m font-medium leading-9 text-black">Your information</h1>
                <p class="mt-1 text-xs leading-6 text-gray-600">for visualizing the passing of time</p>



                <div class="sm:col-span-3">
                    <label for="dob" class="block text-m font-medium leading-9 text-black">Date of Birth</label>
                    <div class="mt-2">
                        <input type="date" id="dob" name="dob" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    </div>
                </div>



                  <div class="sm:col-span-3">
                    <label for="gender" class="block text-m font-medium leading-9 text-black">Gender</label>
                    <div class="mt-2">
                      <select id="gender" name="gender" autocomplete="gender" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                        <option>Female</option>
                        <option>Male</option>
                        <option>Prefer not to say</option>
                      </select>
                    </div>
                  </div>


                  <div class="sm:col-span-3">
                    <label for="country" class="block text-m font-medium leading-9 text-black">Nationality</label>
                    <div class="mt-2">
                      <select id="country" name="country" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">

                        @foreach($categories as $category)
                          <option value="{{ $category->code }}-{{ $category->country }}">{{ $category->country }}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>


            <div class="mt-6 flex items-center ">
              <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Generate</button>
            </div>
          </form>


    </div>



  </x-guest-layout>
