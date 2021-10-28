<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--BOOSTRAP CSS AND CKEDITOR-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <!--END BOSTTSTRAP AND CKEDITOR-->
  <!--CSS KITA SENDIRI-->
  <link rel="stylesheet" href="css/universitas.css">
  <!--end css kita sendiri-->
  <title>Cari Universitas</title>
</head>
  <body class="bg-image" style="background-image: url('img/finderimg.jpg'); ">
    <div class="bg-image" style="background-image: url('img/finderimg.jpg');  height: 50vh;">
    <!-- <div> -->
      <!-- <img src="img/univfinderimg.jpg" class="bg-image finderbgimg"> -->
      <div class="p-5 h-100 text-center mb-5">
        <p class="display-4 text-light">Search for universities around the world!</p>
        <form>
          <div class="row my-5">
            <div class="col-sm-8">
              <input type="text" class="form-control" name="univcari" placeholder="Enter the name of a country">
            </div>
            <div class="col-sm-4">
              <button type="submit" class="btn btn-secondary form-control">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="px-5 py-3 bg-dark" >
      TEST
      <div class="m-4 p-5 bg-warning">
        <table class="table table-bordered table-light">
          <thead>
            <tr>
              <td>No.</td>
              <td>Nama Universitas</td>
              <td>Lokasi Universitas</td>
              <td>Akreditasi</td>
              <td>Action</td>
            </tr>
          </thead>
          <tb>
            <tr>
              <td>1</td>
              <td>Universitas Test</td>
              <td>Jonggol</td>
              <td>Zs</td>
              <td>
                <form action="#">
                  <input type="text" value="" hidden>
                  <button class="btn btn-info"><img src="img/settingicon.png" style="height:20px; width:20px; margin-top:-5px"> Detail</button>
                </form></td>
            </tr>
          </tb>
        </table>
      </div>
    </div>
  </body>
</html>
