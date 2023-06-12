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
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][unitid]" value="{{ $good->unitid }}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][kgcalc]" value="{{ $good->kgcalc}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][ldm]" value="{{ $good->ldm}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][value]" value="{{ $good->value}}"></td>
                <td width="30%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][description]" value="{{ $good->description}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][volumem3]" value="{{ $good->volumem3}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][lengthcm]" value="{{ $good->lengthcm }}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][widthcm]" value="{{ $good->widthcm}}"></td>
                <td width="20%"><input type="text" class="form-control"  id="{{$good->id}}" name="goods[{{$good->id}}][heightcm]" value="{{ $good->heightcm }}"></td>
                <td width="20%"><button type="button" class="data-toggle-action-tooltip btn btn-outline-danger btn-circle btn-sm"  onclick="removeIndex(this)"><i class="sl-icon-trash"></i></button></td>
            </tr>
            @endforeach
         </tbody>
        @endif
    </table> 