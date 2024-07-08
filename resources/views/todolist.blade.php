<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todolist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    
    <div class ="container vh-100">
        <div class="row h-100 ">
            <div class="col-11 col-md-8 col-lg-6 mx-auto my-auto shadow-lg p-3">
                <h1 class="text-center">todo list</h1>

                <form action="/todo/add" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="todo" type="text" class="form-control" placeholder="what do you want to do?" >
                        <button class="btn btn-primary" type="submit" >save</button>
                      </div>
                </form>

                <ul class="list-group list-group-flush overflow-auto" style="max-height: 350px;">

                    @foreach ($todos as $todo)

                        <li class="list-group-item d-flex justify-content-between {{($todo->status)? 'list-group-item-success' : ''}}">
                            <a class="btn btn-light" href="/todo/delete/{{ $todo->id }}">
                                <i class="bi bi-x-lg"></i>
                            </a>

                            @if ($todo->status)
                                <del>{{ $todo->todo }}</del>
                                
                            @else
                                {{ $todo->todo}}
                            @endif
                            
                            <a class="btn btn-light" href="/todo/update/{{ $todo->id }}">
                                <i class="bi-{{ ($todo->status)? 'arrow-counterclockwise' : 'check-lg'}}"></i>
                            </a>
                        </li>   
                        
                    @endforeach

                </ul>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>