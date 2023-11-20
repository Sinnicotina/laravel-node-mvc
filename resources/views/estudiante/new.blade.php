<!doctype html>
<html lang="en">

<head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Agregar Estudiante</title>
</head>

<body>
    <div class="container">
        <h1>añadir Estudiante</h1>

        <form method="POST" action="{{ route('estudiantes.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Codigo</label>
                <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id"
                    disabled="disable">
                <div id="idHelp" class="form-text">Estudiante codigo</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Estudiante</label>
                <input type="text" required class="form-control" id="name" aria-describedby="nameHelp"
                    name="name" placeholder="Estudiante nombre.">
            </div>
            <label for="carrera">carrera</label>
            <select class="form-select" id="carrera" name="code" required>
                <option selected disable value="">CHoose one...</option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->carre_codi }}">{{ $carrera->carre_nomb }}</option>
                @endforeach
            </select>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('estudiantes.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>