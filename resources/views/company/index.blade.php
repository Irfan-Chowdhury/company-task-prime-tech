<!-- resources/views/data.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>

    <div class="container p-4">

        <div class="d-flex justify-content-between">
            <div>
                <a href="{{ route('companies.create') }}" class="btn btn-primary">+ Create</a>
            </div>
            <div>
                <h1 class="text-center">Company</h1>
            </div>
            <div></div>
        </div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Others Data</th>
                    <th scope="col">Action</th>
                </tr>
                @foreach ($companies as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            @if (!$item->customizeFields->isEmpty())
                                @foreach ($item->customizeFields as $customizeItem)
                                    <span><b>{{ $customizeItem->label}}</b> : {{ $customizeItem->value }}</span> <br>
                                @endforeach
                            @else
                                <span><i>NONE</i></span>
                            @endif
                         </td>

                        <td>
                            <a href="{{ route('companies.edit', $item->id) }}" class="btn btn-info">Edit</a>
                            <a href="{{ route('companies.destroy', $item->id) }}" onclick="return confirm('Are you sure to delete ?')" class="ml-2 btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </thead>

        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>
