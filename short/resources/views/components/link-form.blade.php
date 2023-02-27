<form action="{{ url('/') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <input type="text" name="url" class="form-control" required>
        </div>
    
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Kısa Link Oluştur</button>
        </div>
    </div>
</form>

