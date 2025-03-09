<x-guest-layout>


<div class="container mx-auto">
    <h1 class="p-2 sm:p-10 text-2xl font-bold text-center text-white italic"> “Death smiles at us all; all we can do is smile back.” - <span class="not-italic">Marcus Aurelius</span></h1>
    <div class="mt-4 mb-12 px-4 pt-4 pb-12 justify-between bg-white dark:bg-gray-600 shadow-sm rounded-lg">
        <div class="justify-center">

            <br>
            <div class="text-4xl text-center clear-both text-white">
                You have <span class="text-red-500">{{ session('data') - (session('currentYear') - session('birthyear')) }}</span> years left to live
            </div>
            <div class="mt-4 text-1xl text-center text-white clear-both">Life expectancy in {{{session('nationality')}}}:   {{ session('data')}} years</div>


            <br>
            <div class="flex items-center justify-center mt-4">
                <div class="w-1/5 bg-red-900 text-white font-bold text-center py-2 rounded-l">
                    {{ session('percentage') }}%
                </div>
                <div class="w-4/5 bg-blue-100 text-center py-2 rounded-r" style="width: {{ 100 - session('percentage') }}%;">
                    {{ 100 - session('percentage') }}%
                </div>
            </div>

            <br>
            <p1 class="text-1xl text-center clear-both text-white"> Red boxes signifies the weeks you have lived.</p1>
            <br>
            <p1 class="text-1xl text-center clear-both text-white"> White boxes signifies the weeks you have left.</p1>
        
            <!--
            <x-rectangle-table :boxNumber="session('intPercentage')" deadBoxColor="#B01818" basicBoxColor="#CCFFFF" :tableHeight="10" :tableWidth="10" width="12px" height="12px">
            </x-rectangle-table>
        -->
            

            <x-rectangle-table :boxNumber="session('age')*52+session('birthmonth')*4+session('birthday')" deadBoxColor="#B01818" basicBoxColor="#CCFFFF" :tableHeight="session('data')" :tableWidth="85" width="5px" height="5px">
            </x-rectangle-table>

            
</div>

</div>

</div>

</x-guest-layout>
