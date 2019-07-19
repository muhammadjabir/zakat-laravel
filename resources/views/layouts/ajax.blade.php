<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>



</head>
<body>
<form action="{{route('data')}}" method="POST" enctype="multipart/form-data"class="shadow-sm p-3 bg-white">
			@csrf
			<label for="title">Title</label> <br>
			<input type="text" class="form-control" name="title" placeholder="Book title">
			<br>
			<label for="cover">Cover</label>
			<input type="file" class="form-control" name="cover">
			<br>
			<label for="description">Description</label><br>
			<textarea name="description" id="description" class="form-control" placeholder="Give a description about this book"></textarea>
			<br>
			<label for="categories">Categori</label><br>
			<select name="categories[]" multiple id="categories" class="form-control"></select><br><br>
			<label for="stock">Stock</label><br>
			<input type="number" class="form-control" id="stock" name="stock" min=0 value=0>
			<br>
			<label for="author">Author</label><br>
			<input type="text" class="form-control" name="author" id="author" placeholder="Book author">
			<br>
			<label for="publisher">Publisher</label> <br>
			<input type="text" class="form-control" id="publisher" name="publisher" placeholder="Book publisher">
			<br>
			<label for="Price">Price</label> <br>
			<input type="number" class="form-control" name="price" id="price" placeholder="Book price">
			<br>
			<button class="btn btn-primary" name="save_action" value="PUBLISH">Publish</button>
			<button class="btn btn-secondary" name="save_action" value="DRAFT">Save as draft</button>
		</form>
<script
src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.mi
n.js" integrity="sha384-
cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
crossorigin="anonymous"></script>
<script
src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.j
s" integrity="sha384-
uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
crossorigin="anonymous"></script>
</body>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-
rc.0/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-
rc.0/js/select2.min.js"></script>

<script>
	$('#categories').select2({
		ajax: {
			url: 'http://localhost/zakat/search', processResults: function(data){
				return { results: data.map(function(item){return {id: item.id, text: item.name} })
			}
		}
	}
});
</script>
</html>