<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <h1>Lembretes</h1>
   
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Lembrete</th>
                <th scope="col">Descrição</th>
                <th scope="col">Capa</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($reminders as $reminder)
                <tr>
                <th scope="row">{{$reminder->id}}</th>
                <td>{{$reminder->name}}</td>
                <td>{{$reminder->descReminder}}</td>
                <td><img src="{{ asset('storage/'. $reminder->cover) }}" width="50" class="img-thumbnail" alt=""></td>
                </tr>
               
                @endforeach
            </tbody>
        </table>
        
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>