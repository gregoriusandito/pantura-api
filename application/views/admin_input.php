<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-xs-12">
		    <div class="container">
                        <h2> Input Kota dan isinys</h2>
                    </div>
		</div>
		<div class="col-md-12 col-xs-12">
			<form>
				<div class="form-group">
					<label for="kota">Nama Kota:</label>
					<input type="text" class="form-control" id="kota">
				</div>
				<div class="form-group">
					<label for="desk">Deskripsi:</label>
					<input type="textarea" class="form-control" id="desk">
				</div>
				<div class="form-group">
                                        <label for="file">Gambar:</label>
					<input type="file" name="berkas" />
				</div>
				 <button type="submit" class="btn btn-default">Simpan</button>
			</form>
		</div>
</div>
</body>
</html>