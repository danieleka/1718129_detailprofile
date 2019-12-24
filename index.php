<?php
$data = file_get_contents('mhs.json');
$mhs = json_decode($data, true);
$mhs = $mhs['mahasiswa'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title>Profil Mahasiswa</title>
</head>

<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Web Service Profile</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Data Mahasiswa -->
    <div class="container">
        <div class="row">
            <div class="col" style="padding-top:2%; font-family: verdana">
                <h1>Profil Mahasiswa</h1>
            </div>
        </div>
        <div class="row" style="padding-top:4%">
            <?php foreach ($mhs as $row) : ?>
                <div class="col-md-4" style="padding-bottom: 2%">
                    <div class="card" style="text-align:center">
                        <p><img src="<?php echo $row['foto']; ?>" class="card-img-top" alt="..." style="width:200px"></p>
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $row['nama']; ?></h5>
                            <p class="card-text">Mahasiwa dengan NIM <?php echo $row['nim']; ?> ini berasal dari <?php echo $row['alamat_asal']; ?>.</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoProfil<?= $row['nim'];?>">Lihat Profil</button>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="infoProfil<?= $row['nim'];?>" role="dialog" style="padding-top: 13%;">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5>Detail Profil</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body" style="margin-bottom:5%; margin-top:5%">
                        <div class="row">
                          <div class="col-sm-4">
                            <img src="<?php echo $row['foto']; ?>" class="card-img-top" alt="..." style="width:100px; height: 100px; border-radius:100%; margin-top:5%; margin-left: 10%">
                          </div>
                          <div class="col-sm-8">
                            <table>
                              <tr>
                                <td>NIM</td>
                                <td> : </td>
                                <td><?= $row['nim']; ?></td>
                              </tr>
                              <tr>
                                <td>Nama</td>
                                <td> : </td>
                                <td><?= $row['nama']; ?></td>
                              </tr>
                              <tr>
                                <td>Alamat Asal</td>
                                <td> : </td>
                                <td><?= $row['alamat_asal']; ?></td>
                              </tr>
                              <tr>
                                <td>Alamat Malang</td>
                                <td> : </td>
                                <td><?= $row['alamat_mlg']; ?></td>
                              </tr>
                              <tr>
                                <td>Jenis Kelamin</td>
                                <td> : </td>
                                <td><?= $row['jk']; ?></td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
