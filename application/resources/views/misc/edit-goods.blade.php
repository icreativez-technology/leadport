<table class="table" id="table">
        <thead>
                <tr>
                    <th>Qty</th>
                    <th>Units</th>
                    <th>Kg calc</th>
                    <th>LDM</th>
                    <th>Value</th>
                    <th>Description</th>
                    <th>Volume(m3)</th>
                    <th>Length(cm)</th>
                    <th>Width(cm)</th>
                    <th>Height</th>
                    <th>Action</th>
                </tr>
        </thead>
        @if($task->goods)
        <tbody id="goodsTable">
        @foreach($task->goods as $good) 
            <tr id="{{$good->id}}">
                <td width="15%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][qty]" value="{{ $good->qty}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][units]" value="{{ $good->units}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][kg_calc]" value="{{ $good->kg_calc}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][ldm]" value="{{ $good->ldm}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][value]" value="{{ $good->value}}"></td>
                <td width="30%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][description]" value="{{ $good->description}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][volume]" value="{{ $good->volume}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][length]" value="{{ $good->length}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][width]" value="{{ $good->width}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][height]" value="{{ $good->height}}"></td>
                <td width="20%"><button type="button" class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm"  onclick="removeIndex(this)"><i class="sl-icon-trash"></i></button></td>
            </tr>
            @endforeach
         </tbody>
        @endif
    </table> 