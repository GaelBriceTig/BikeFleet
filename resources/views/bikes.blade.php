<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/sl-1.5.0/datatables.min.css"/>
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <table id="myTable" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th>Numero de série</th>
                    <th>Date de manufacture</th>
                    <th>Nom du model</th>
                    <th>Matériel</th>
                    <th>Catégorie</th>
                    <th>Marque</th>
                    <th>Status</th>
                </tr>
                <tbody>
                    @foreach ($bikes as $bike)
                        <tr>
                            <td>{{$bike->serial_number}}</td>
                            <td>{{$bike->manufacture_date}}</td>
                            <td>{{$bike->getBikeModel()->name}}</td>
                            <td>{{$bike->getBikeModel()->getMaterial()->name}}</td>
                            <td>{{$bike->getBikeModel()->getCategory()->name}}</td>
                            <td>{{$bike->getBikeModel()->getTrademark()->name}}</td>
                            <td>{{$bike->status_id}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/sl-1.5.0/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                select: true
            });
        } );
    </script>
</body>
</html>

 
