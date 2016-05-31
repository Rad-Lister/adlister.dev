<?php 
require_once '../models/Ad.php';

function newUserAd()    

{
//To do: sanatize these values. 

	$ad = new Ad;
	$ad->user_id = escape($_SESSION['LOGGED_IN_ID']);
	$ad->date_listed = escape(date("Y-m-d"));
	$ad->title = escape(Input::get('title'));
	$ad->description = escape(Input::get('description'));
	$ad->price = escape(Input::get('price'));
	$ad->img_url = saveUploadedImage('adImg');
	$ad->category = escape(Input::get('category')); 
	$ad->tags = escape(Input::get('tags'));
	$ad->save(); 

	// $newId = $dbc->lastInsertId();

	// header("Location: http://adlister.dev/ads/show?id={$newId}");
}

if(Input::has('title')) {    
	newUserAd();
}

?>

		<form role="form" method="POST" enctype="multipart/form-data">  

			<label>Title</label>
		    <input name="title" class="form-control entry-fields" id="ad_title" placeholder="characters only" required>
		    
		    <label>Price</label>
		    <input name="price" class="form-control entry-fields" id="ad_price" type="number" min="0" placeholder="numbers only" required>
	
		    <label>Select an image to upload</label>
		    <input type="file" class="form-control entry-fields" name="adImg" id="adImg" required>
		    
		    <label>Category</label>
		      <select class="form-control entry-fields" id="category" name="category">
			    <option>Cameras</option>
			    <option>Live stock</option>
			    <option>Vehicles</option>
			  </select>

			<label>Description</label>
		    <input name="description" class="form-control entry-fields" id="ad_description" placeholder="characters only" required>

		    <label>Tags</label>
		    <input name="tags" class="form-control" placeholder="characters only" required>

  			<button type="submit" class="btn btn-default" id="ad_submit" >Create Ad</button>
		</form>