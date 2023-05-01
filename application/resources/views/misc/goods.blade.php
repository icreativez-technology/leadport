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
                <td>{{ $good->units}}</td>
                <td>{{ $good->kg_calc}}</td>
                <td>{{ $good->ldm}}</td>
                <td>{{ $good->value}}</td>
                <td>{{ $good->description}}</td>
                <td>{{ $good->volume}}</td>
                <td>{{ $good->length}}</td>
                <td>{{ $good->width}}</td>
                <td>{{ $good->height}}</td>
    </tr>
    @endforeach
</table>