<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Batalha Pokemons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body class="d-flex flex-column justify-content-center align-items-center" >
    <h1 class="text-center">Batalha de pokemons</h1>
    <br>
    <form method="post" action="{{ route('pokemons.battle') }}" class="d-flex flex-column justify-content-center border border-primary rounded p-4 w-50">
        @csrf
        <div class="d-flex justify-content-center">
            <div class="form-group p-2">
                <label for="pokemon_1">Pokemon 1</label>
                <input type="text" class="form-control" name="pokemon_1" required id="pokemon_1" >
            </div>
            <div class="form-group p-2">
                <label for="pokemon_2">Pokemon 2</label>
                <input type="text" class="form-control" name="pokemon_2" required id="pokemon_2" >
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Batalhar!</button>
    </form>

    @isset($error)
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "{{$error}}",
            });
        </script>
    @endisset

    @isset($empate)
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire("Empatou!");
        </script>
    @endisset

    @isset($winner)
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: "Vencedor!",
                text: "{{ $winner['name'] }} venceu esse confronto!",
                imageUrl: "{{ $winner['sprites']['back_default'] }}",
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: "Pokemon image"
            });
        </script>
    @endisset

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>