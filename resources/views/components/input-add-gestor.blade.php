<div class='row'>
    <div class='col-3'> 
        <div class="mb-3 p-2">
            <label for="{{$name}}" class="form-label">{{$texto}}</label>
            <input type="{{$type}}" {{ $attributes->merge(['class' => 'pl-2 form-control border rounded block w-full bg-gray-200 text-gray-700  border-gray-500 ']) }}
            id="{{$name}}" name="{{$name}}" value="{{$value}}">
        </div>
    </div>
</div>