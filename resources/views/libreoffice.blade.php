@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Libre Office') }}</div>

                <div class="card-body">
                    <div class="alert alert-info">
                        {{ __('Disini kita membutuhkan aplikasi libreoffice untuk mengconvert doc menjadi pdf, setelah itu pdf diconvert menjadi image menggunakan package dari spatie yaitu pdf-to-image') }}
                    </div>

                    <form enctype="multipart/form-data" method="POST" action="{{ route('libreoffice') }}">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="file" accept=".docx" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Convert</button>
                    </form>

                    <div class="row mt-3">
                        @if(isset($images))
                            @foreach ($images as $index => $image)
                            <div class="col-md-4">
                                <a href="{{ $image }}" target="_blank">
                                <img src="{{ $image }}" alt="{{ $index }}" class="img-thumbnail">
                                </a>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
