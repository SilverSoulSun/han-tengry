<div class="cropper">

	<div class="navbar">
		<select class="cropper-type-select">
			<option selected="selected" disabled="disabled">Select type</option>
			<option value="animals" data-path="/uploads/animals/photos/">Animal Cover</option>

			<option value="properties" data-path="/uploads/catalog/covers/">Property Cover</option>
			<option value="taxonomies" data-path="/uploads/catalog/covers/">Taxonomy Cover</option>
			<option value="categories" data-path="/uploads/catalog/covers/">Category Cover</option>
		</select>

		<select class="cropper-items chosen">
			<option selected="selected" disabled="disabled">Select item</option>
		</select>

		<form class="cropper-form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<input type="hidden" class="image-path" name="path">
			<input type="hidden" class="image-name" name="name">
			<input type="hidden" class="image-ratio" name="ratio" value="1x1">

			<div class="ratio-btns">
				<div class="btn-cropper-ratio active" data-ratio="1" data-min-w="600" data-min-h="600">1x1</div>
				<div class="btn-cropper-ratio" data-ratio="2" data-min-w="1600" data-min-h="800" >2x1</div>
				<div class="btn-cropper-ratio" data-ratio="1.25" data-min-w="750" data-min-h="600" >1.25x1</div>
				<!-- <div class="btn-cropper-ratio" data-ratio="3 / 1">3x1</div> -->
			</div>

			<div class="crop-data">
				<input readonly class="crop-data-x" name="x">
				<input readonly class="crop-data-y" name="y">
				<input readonly class="crop-data-width" name="width">
				<input readonly class="crop-data-height" name="height">
			</div>

			<input type="submit" value="Crop" class="btn-crop-submit">
		</form>
	</div>

	<div class="image"></div>

</div>