@props(['boxNumber', 'deadBoxColor' => 'red', 'basicBoxColor' => 'white', 'tableHeight', 'tableWidth', 'width' => '50px', 'height' => '50px'])


<table>
    @for($i = 0; $i < $tableHeight; $i++)
        <tr>
            @for($j = 0; $j < $tableWidth; $j++)

           @php
            $cellNumber = $i * $tableWidth + $j + 1;
            $isBoxDone = $cellNumber > $boxNumber;
            @endphp

            <td>
                <div style="
                    width: {{ $width }};
                    height: {{ $height }};
                    background-color: {{ $isBoxDone ? $basicBoxColor : $deadBoxColor }};
                    border: 1px solid #000;">
            {{ $slot }} </div>
            </td>
            @endfor
        </tr>
    @endfor
</table>
