@if (count($errors) > 0)
    <div class="alert alert-danger">
        <div class="container">
            <div class="row">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
