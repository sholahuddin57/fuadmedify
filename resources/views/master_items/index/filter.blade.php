<form action="{{ route('master-items.index') }}" method="GET">
    <div class="form-row">
        <div class="col-2">
            <div class="form-group">
                <label for="harga_min">Harga Min</label>
                <input type="number" class="form-control" id="harga_min" name="harga_min" value="{{ request()->harga_min }}">
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label for="harga_max">Harga Max</label>
                <input type="number" class="form-control" id="harga_max" name="harga_max" value="{{ request()->harga_max }}">
            </div>
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary mt-4">Filter</button>
        </div>
    </div>
</form>
