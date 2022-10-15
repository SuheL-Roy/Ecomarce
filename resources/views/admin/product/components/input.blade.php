<div class="">
    @if ($type == 'text' || $type == 'date' || $type == 'number')
        <input type="{{$type}}" name="{{$name}}" class="form-control" id="input-21" placeholder="{{$name}}" />
    @endif

    @if ($type == 'file')
        <div class="input_file_body" data-toggle="modal" data-target="#fileManagerModal" >
            <div class="overlay"></div>
            <img src="" style="height: 50px;margin: 5px;" alt="preview">
            <input type="text" name="{{ $name }}" value="{{isset($value)?$value:''}}" class="form-control" {{isset($attr)?$attr:''}}  placeholder="Choose File {{ $name }}" />
        </div>
    @endif

    <span class="text-danger {{$name}}"></span>

    <style>
        .price{
            font-size: unset;
        }
    </style>

</div>