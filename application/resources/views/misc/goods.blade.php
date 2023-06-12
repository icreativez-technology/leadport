<table class="table" id="goodsTable">
    <tr>
        <th>Qty</th>
        <th>Units</th>
        <th>Kg Calc</th>
        <th>LDM</th>
        <th>Value</th>
        <th>Description</th>
        <th>Volume(m3)</th>
        <th>Length(cm)</th>
        <th>Width(cm)</th>
        <th>Height(cm)</th>
    </tr>
    @foreach($task->goods as $good) 
    <tr>
                <td>{{ $good->qty}}</td>
                <td>{{ $good->unitid}}</td>
                <td>{{ $good->kgcalc}}</td>
                <td>{{ $good->ldm}}</td>
                <td>{{ $good->value}}</td>
                <td>{{ $good->description}}</td>
                <td>{{ $good->volumem3}}</td>
                <td>{{ $good->lengthcm}}</td>
                <td>{{ $good->widthcm}}</td>
                <td>{{ $good->heightcm}}</td>
    </tr>
    @endforeach
</table>