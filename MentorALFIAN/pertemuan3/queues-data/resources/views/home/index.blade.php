<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
    <title>Document</title>
</head>
<body>
    <div class="    ">
        <div class="card card-header card-head  ">
            <div class="d-flex justify-content-between align-items-center">
                <p class="display-5 fw-bolder">Data Bisnis</p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Import
                </button>
                <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="file" id="" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Import</button>
        </div>
    </form>
      </div>
    </div>
  </div>

                {{-- <button class="btn btn-primary " style="margin: 30px 50px">Import</button> --}}
            </div>
        </div>
        <div class="table-container kartuu card-info   card-outlined">
            <table class="table table-bordered outline-table text-truncate">
                <thead class="">
                    <tr>
                        <th scope="col">#</th>

                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach ($databisnis as $key => $dtbs)
                        <tr>
                            <th scope="row">{{ $dtbs->bisnis_id }}</th>
                            <td>{{ $dtbs->series_reference }}</td>
                            <td>{{ $dtbs->period }}</td>
                            <td>{{ $dtbs->data_value }}</td>
                            <td>{{ $dtbs->suppressed }}</td>
                            <td>{{ $dtbs->status }}</td>
                            <td>{{ $dtbs->units }}</td>
                            <td>{{ $dtbs->magnitude }}</td>
                            <td>{{ $dtbs->subject }}</td>
                            <td>{{ $dtbs->group }}</td>
                            <td>{{ $dtbs->series_title_1 }}</td>
                            <td>{{ $dtbs->series_title_2 }}</td>
                            <td>{{ $dtbs->series_title_3 }}</td>
                            <td>{{ $dtbs->series_title_4 }}</td>
                            <td>{{ $dtbs->series_title_5 }}</td>
                        </tr>
                    @endforeach

                </tbody> --}}
            </table>
            <div class="d-flex justify-content-center ">
                {{-- {{ $databisnis->links() }} --}}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
