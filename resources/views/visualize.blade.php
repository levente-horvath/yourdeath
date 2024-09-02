<x-guest-layout>


<div class="container mx-auto">
    <h1 class="p-2 sm:p-10 text-xl font-bold text-center text-black">Statistics</h1>
    <div class="mt-4 mb-12 px-4 pt-4 pb-12 justify-between bg-white dark:bg-gray-600 shadow-sm rounded-lg">
        <div class="justify-center">
            <div class="text-base text-xl text-center clear-both">Life expectancy in {{{session('nationality')}}}:   {{ session('data')}} years</div>

            <br>
            <br>


            <div class="text-base text-xl text-center clear-both">You have {{session('data') - (session('currentYear') - session('birthyear')) }} years left to live</adiv>

            <br>
            <br>

            <div>
                <div class="float-left bg-red-900 pl-4" style="width: {{ session('percentage') }}%;">
                    {{ session('percentage') }}%
                </div>
                <div class="float-left w-1/5 bg-blue-100 pl-4" style="width: {{ 100 - session('percentage') }}%;">
                    {{ 100 - session('percentage') }}%
                </div>
            </div>

            <br>
            <br>
            <!--
            <x-rectangle-table :boxNumber="session('intPercentage')" deadBoxColor="#B01818" basicBoxColor="#CCFFFF" :tableHeight="10" :tableWidth="10" width="12px" height="12px">
            </x-rectangle-table>
        -->

            <x-rectangle-table :boxNumber="session('age')*52+session('birthmonth')*4+session('birthday')" deadBoxColor="#B01818" basicBoxColor="#CCFFFF" :tableHeight="session('data')" :tableWidth="52" width="5px" height="5px">
            </x-rectangle-table>


            <div>

        </div>
</div>

</div>

</div>



</x-guest-layout>
